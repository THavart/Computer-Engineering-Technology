package com.amzi.Servlets;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.amzi.DataAccess.DataAccess;
import com.amzi.Entities.Ticket;
import com.amzi.Entities.User;

/**
 * Servlet implementation class ServletDisplayTicket
 */
@WebServlet("/ViewTicket")
public class ServletViewTicket extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ServletViewTicket() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String id = request.getParameter("id");
		DataAccess da = new DataAccess();
		RequestDispatcher rd;
		Ticket ticket;
		
		if(request.getSession().getAttribute("User") == null) {
			rd = getServletContext().getRequestDispatcher("/Login.jsp");		
			rd.forward(request, response);
		}
		else {
			if(id != null) {
				ticket = da.DisplayTicket(id);
				if(ticket != null) {
					request.getSession().setAttribute("Readonly", true);
					request.getSession().setAttribute("Ticket", ticket);
					rd = getServletContext().getRequestDispatcher("/WEB-INF/AddTicket.jsp");
					rd.forward(request, response);
				}
			}
		}		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Ticket ticket = new Ticket();
		DataAccess da = new DataAccess();
		
		if(request.getSession().getAttribute("User") == null) {
			RequestDispatcher rd;
			rd = getServletContext().getRequestDispatcher("/Login.jsp");		
			rd.forward(request, response);
		}
		//admin_remarks = ?, Ticket_Status_id = ? , date_updated = ? WHERE id = ?
		ticket.setId(Integer.parseInt(request.getParameter("id")));
		ticket.setAdminRemark(request.getParameter("adminRemark"));
		ticket.setTicket_status_id(Integer.valueOf(request.getParameter("status")));
		
		if(da.ValidateTicket(ticket, false) && ticket.getTicket_status_id() == 2) {
			response.sendRedirect("Resolved");
		}
		else {
			response.sendRedirect("Submit");
		}
	}

}
