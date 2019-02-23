package com.amzi.DataAccess;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import com.amzi.Entities.Ticket;
import com.amzi.Entities.User;

public class DataAccess {
	private Connection conn = null;
	private ResultSet rs = null;

	public User ValidateLogin(String user_name, String password) {
		User user = null;

		try {
			conn = DBUtil.getDataSource().getConnection();
			rs = Query(conn, "SELECT * FROM users WHERE user_name=? and password=?",
					new String[] { user_name, password });
			if (rs.next()) {
				user = new User();
				user.setId(rs.getInt("id"));
				user.setUser_name((rs.getString("user_name")));
				user.setUser_email(rs.getString("user_email"));
				user.setFirst_name((rs.getString("first_name")));
				user.setLast_name((rs.getString("last_name")));
				user.setDate_created(rs.getDate("date_created"));
				user.setDate_updated(rs.getDate("date_updated"));
				user.setUser_type_id(rs.getInt("user_type_id"));
				user.setUser_changed_default_password(rs.getBoolean("user_changed_default_password"));
			}
			rs.close();
			conn.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return user;
	}

	public User UpdatePassword(Integer id, String newPassword) {
		User user = null;

		try {
			conn = DBUtil.getDataSource().getConnection();
			if (Update(conn, "UPDATE users SET password=?, user_changed_default_password=?, date_updated=? WHERE id=?",
					new String[] { newPassword, "1", DateFormatter(), id.toString() }) > 0) {
				rs = Query(conn, "SELECT * FROM users WHERE id=?", new String[] { id.toString() });
				if (rs.next()) {
					user = new User();
					user.setId(rs.getInt("id"));
					user.setUser_name((rs.getString("user_name")));
					user.setUser_email(rs.getString("user_email"));
					user.setFirst_name((rs.getString("first_name")));
					user.setLast_name((rs.getString("last_name")));
					user.setDate_created(rs.getDate("date_created"));
					user.setDate_updated(rs.getDate("date_updated"));
					user.setUser_type_id(rs.getInt("user_type_id"));
					user.setUser_changed_default_password(rs.getBoolean("user_changed_default_password"));
				}
			}
			rs.close();
			conn.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return user;
	}

	public boolean ValidateTicket(Ticket ticket, boolean insert) {
		try {
			String query;
			String[] params;
			conn = DBUtil.getDataSource().getConnection();
			if (insert) {
				query = "INSERT into tickets (User_id, summary, subject, description, date_created, Ticket_Status_id, urgent_level) VALUES(?, ?, ?, ?, ?, 1, ?)";
				params = new String[] { Integer.toString(ticket.getUserId()), ticket.getSummary(), ticket.getSubject(),
						ticket.getDescription(), DateFormatter(), Integer.toString(ticket.getUrgentLevel()) };
			} else {
				query = "UPDATE tickets SET admin_remarks = ?, Ticket_Status_id = ? , date_updated = ? WHERE id = ?";
				params = new String[] { ticket.getAdminRemark(), String.valueOf(ticket.getTicket_status_id()), DateFormatter(), Integer.toString(ticket.getId()) };
			}
			if (Update(conn, query, params) < 0) {
				return false;
			}
			conn.close();
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return true;
	}

	public ArrayList<Ticket> getTicketList(User user, boolean isResolved) {
		ArrayList<Ticket> tickets = new ArrayList<Ticket>();
		Ticket ticket;
		String query;
		String[] params = null;

		try {
			conn = DBUtil.getDataSource().getConnection();
			if (user.getUser_type_id() == 1) {
				params = new String[] { Integer.toString(user.getId()) };
				if (isResolved) {
					query = "SELECT * FROM tickets WHERE User_id = ? AND Ticket_Status_id = 2";
				} else {
					query = "SELECT * FROM tickets WHERE User_id = ? AND Ticket_Status_id = 1";
				}
			} else {
				if (isResolved) {
					query = "SELECT * FROM tickets WHERE Ticket_Status_id = 2";
				} else {
					query = "SELECT * FROM tickets WHERE Ticket_Status_id = 1";
				}
			}
			rs = Query(conn, query, params);

			while (rs.next()) {
				ticket = new Ticket();
				ticket.setId(rs.getInt("id"));
				ticket.setSubject(rs.getString("subject"));
				ticket.setDescription(rs.getString("description"));
				ticket.setDate_created(rs.getDate("date_created"));
				ticket.setDate_updated(rs.getDate("date_updated"));
				ticket.setTicket_status_id(rs.getInt("Ticket_Status_id"));

				tickets.add(ticket);
			}
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return tickets;
	}

	public Ticket DisplayTicket(String stringId) {
		Ticket ticket = null;
		Integer id = Integer.valueOf(stringId);

		if (id != null) {
			try {
				conn = DBUtil.getDataSource().getConnection();
				rs = Query(conn, "SELECT * FROM tickets WHERE id = ?", new String[] { stringId });

				if (rs.next()) {
					ticket = new Ticket();
					ticket.setId(rs.getInt("id"));
					ticket.setSummary(rs.getString("summary"));
					ticket.setSubject(rs.getString("subject"));
					ticket.setDescription(rs.getString("description"));
					ticket.setUrgentLevel(rs.getInt("urgent_level"));
					ticket.setTicket_status_id(rs.getInt("Ticket_Status_id"));
					ticket.setAdminRemark(rs.getString("admin_remarks"));
				}
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}

		return ticket;
	}

	private ResultSet Query(Connection conn, String query, String[] param) {
		PreparedStatement ps = null;
		ResultSet rs = null;

		try {
			ps = conn.prepareStatement(query);
			if (param != null) {
				for (int i = 1; i <= param.length; i++) {
					ps.setString(i, param[i - 1]);
				}
			}
			rs = ps.executeQuery();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return rs;
	}

	private int Update(Connection conn, String query, String[] param) {
		PreparedStatement ps = null;
		int update = -1;

		try {
			ps = conn.prepareStatement(query);
			for (int i = 1; i <= param.length; i++) {
				if (param[i - 1] == null || param[i - 1].isEmpty()) {
					return -1;
				}
				ps.setString(i, param[i - 1]);
			}
			update = ps.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}

		return update;
	}

	private String DateFormatter() {
		SimpleDateFormat ft = new SimpleDateFormat("yyyy-MM-dd hh:mm:ss");
		return ft.format(new Date()).toString();
	}
}