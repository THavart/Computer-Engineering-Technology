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
 * Servlet implementation class ServletAddTicket
 */
@WebServlet("/AddTicket")
public class ServletAddTicket extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ServletAddTicket() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RequestDispatcher rd;
		if(request.getSession().getAttribute("User") == null) {
			rd = getServletContext().getRequestDispatcher("/Login.jsp");			
		}
		else {
			request.getSession().removeAttribute("Ticket");
			request.getSession().removeAttribute("Readonly");
			rd = getServletContext().getRequestDispatcher("/WEB-INF/AddTicket.jsp");
		}
		rd.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		Ticket ticket = new Ticket();
		User user = null;
		DataAccess da = new DataAccess();
		
		if(request.getSession().getAttribute("User") == null) {
			RequestDispatcher rd;
			rd = getServletContext().getRequestDispatcher("/Login.jsp");		
			rd.forward(request, response);
		}
		else {
			user = (User)request.getSession().getAttribute("User");
		}
		
		ticket.setUserId(user.getId());
		ticket.setSummary(request.getParameter("summary"));
		ticket.setSubject(request.getParameter("subject"));
		ticket.setDescription(request.getParameter("description"));
		ticket.setUrgentLevel(Integer.parseInt(request.getParameter("urgentLevel")));
		
		if(da.ValidateTicket(ticket, true)) {
			response.sendRedirect("Submit");
		}
		else {
			request.getSession().setAttribute("Ticket", ticket);
			response.sendRedirect("AddTicket");
		}
	}
}
