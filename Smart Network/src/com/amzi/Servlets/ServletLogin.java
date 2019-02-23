package com.amzi.Servlets;

import java.io.IOException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.tomcat.util.codec.binary.Base64;

import javax.servlet.RequestDispatcher;

import com.amzi.DataAccess.DataAccess;
import com.amzi.Entities.User;

/**
 * Servlet implementation class ServletLogin
 */
@WebServlet("/Login")
public class ServletLogin extends HttpServlet {
	private static final long serialVersionUID = 1L;
	/**
	 * Default constructor.
	 */
	public ServletLogin() {
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		RequestDispatcher rd;

		if(request.getSession().getAttribute("User") == null) {
			rd = getServletContext().getRequestDispatcher("/Login.jsp");
			rd.forward(request, response);
		}
		else {
			response.sendRedirect("Home");
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse
	 *      response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		DataAccess da = null;
		String user_name = null;
		String password = null;
		User user = null;
		
		da = new DataAccess();
		user_name = request.getParameter("user_name");
		password = HashPassword(request.getParameter("password"));
		user = da.ValidateLogin(user_name, password);

		if (user != null) {
			if (!user.isUser_changed_default_password()) {
				request.getSession().setAttribute("UserId", user.getId());
				request.getSession().setAttribute("OneLogin", true);
				response.sendRedirect("ChangePassword");
			} 
			else {
				request.getSession().setAttribute("User", user);
				response.sendRedirect("Home");
			}
		} 
		else {
			// ADD ERROR MESSAGE INVALID LOGIN
			response.sendRedirect("Login");
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