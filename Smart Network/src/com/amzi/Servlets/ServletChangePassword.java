package com.amzi.Servlets;

import java.io.IOException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.tomcat.util.codec.binary.Base64;

import com.amzi.DataAccess.DataAccess;
import com.amzi.Entities.User;

/**
 * Servlet implementation class ServletChangePassword
 */
@WebServlet("/ChangePassword")
public class ServletChangePassword extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public ServletChangePassword() {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RequestDispatcher rd;
		
		if (request.getSession().getAttribute("OneLogin") != null) {
			request.getSession().removeAttribute("OneLogin");
			rd = getServletContext().getRequestDispatcher("/WEB-INF/ChangePassword.jsp");
			rd.forward(request, response);
		} 
		else {
			response.sendRedirect("Login");
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String newPassword = null;
		String confirmNewPassword = null;
		DataAccess changePassword = null;
		User user = null;

		if(request.getSession().getAttribute("User") == null) {
			RequestDispatcher rd;
			rd = getServletContext().getRequestDispatcher("/Login.jsp");
			rd.forward(request, response);
		}
		
		newPassword = HashPassword(request.getParameter("newPassword"));
		confirmNewPassword = HashPassword(request.getParameter("confirmNewPassword"));
		
		if (newPassword.equals(confirmNewPassword) && request.getParameter("terms") != null) {
			changePassword = new DataAccess();
			user = changePassword.UpdatePassword((Integer) request.getSession().getAttribute("UserId"), newPassword);
			if (user != null) {
				request.getSession().removeAttribute("UserId");
				request.getSession().removeAttribute("FailedOnce");
				request.getSession().setAttribute("User", user);
				response.sendRedirect("Home");
			}
		} 
		else {
			if(request.getSession().getAttribute("FailedOnce") == null) {
				// ADD "Invalid password update. Please try once more"
				request.getSession().setAttribute("OneLogin", true);
				request.getSession().setAttribute("FailedOnce", true);
				response.sendRedirect("ChangePassword");
			}else {
				request.getSession().removeAttribute("UserId");
				request.getSession().removeAttribute("FailedOnce");
				response.sendRedirect("Login");
			}
		}
	}

	private String HashPassword(String pass) {
		MessageDigest m = null;
        try 
        {
            m = MessageDigest.getInstance("SHA-512");
        }
        
        catch(NoSuchAlgorithmException e)
        {
        }
        
        return new String(Base64.encodeBase64(m.digest(pass.getBytes()), false));
	}
}