package com.amzi.Servlets;

import java.io.IOException;
import java.util.ArrayList;

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
 * Servlet implementation class ServletEditTicket
 */
@WebServlet("/Submit")
public class ServletSubmit extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ServletSubmit() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RequestDispatcher rd;
		User user = null;
		DataAccess da = new DataAccess();
		
		ArrayList<Ticket> tickets = new ArrayList<Ticket>();
		if(request.getSession().getAttribute("User") == null) {
			rd = getServletContext().getRequestDispatcher("/Login.jsp");			
		}
		else {
			user = (User)request.getSession().getAttribute("User");
		}		
		
		tickets = da.getTicketList(user, false);
		request.getSession().setAttribute("Tickets", tickets);
		request.getSession().setAttribute("ViewEdit", "Submitted Tickets");
		rd = getServletContext().getRequestDispatcher("/WEB-INF/View.jsp");
		rd.forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}