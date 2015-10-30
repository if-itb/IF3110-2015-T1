/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package View;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import DBHandler.Question;

/**
 *
 * @author Asus
 */
public class Home extends HttpServlet {
  
  /**
   * Processes requests for HTTP <code>GET</code>
   * methods.
   *
   * @param request servlet request
   * @param response servlet response
   * @throws ServletException if a servlet-specific error occurs
   * @throws IOException if an I/O error occurs
   */
  protected void processGetRequest(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");
    try (PrintWriter out = response.getWriter()) {
      /* TODO output your page here. You may use following sample code. */
      request.getRequestDispatcher("/includes/header.jsp").include(request, response);
      out.println("<div id=\"form\">");

      out.println("<div class=\"content\">");
			out.println("<form action=\"\" method=\"POST\">");
			out.println("<input type=\"text\" id=\"search\" name=\"search\" placeholder=\"search here...\">");
			out.println("<button type=\"submit\">Search</button>");
			out.println("</form>");
      out.println("</div>");

      out.println("</div>");

      out.println("<center>Cannot find what are you looking for? <a class='ask' href=\"ask\">Ask here</a></center>");
      out.println("<br>");
      
      Question DB = new Question();
      DB.getQuestionList(request, response);
      
      request.getRequestDispatcher("/includes/footer.jsp").include(request, response);
    }
  }

  /**
   * Processes requests for HTTP <code>GET</code>
   * methods.
   *
   * @param request servlet request
   * @param response servlet response
   * @throws ServletException if a servlet-specific error occurs
   * @throws IOException if an I/O error occurs
   */
  protected void processPostRequest(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");
    try (PrintWriter out = response.getWriter()) {
      /* TODO output your page here. You may use following sample code. */
      request.getRequestDispatcher("/includes/header.jsp").include(request, response);
      request.getRequestDispatcher("/includes/footer.jsp").include(request, response);
    }
  }
  
  // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
  /**
   * Handles the HTTP <code>GET</code> method.
   *
   * @param request servlet request
   * @param response servlet response
   * @throws ServletException if a servlet-specific error occurs
   * @throws IOException if an I/O error occurs
   */
  @Override
  protected void doGet(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    processGetRequest(request, response);
  }

  /**
   * Handles the HTTP <code>POST</code> method.
   *
   * @param request servlet request
   * @param response servlet response
   * @throws ServletException if a servlet-specific error occurs
   * @throws IOException if an I/O error occurs
   */
  @Override
  protected void doPost(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    processPostRequest(request, response);
  }

  /**
   * Returns a short description of the servlet.
   *
   * @return a String containing servlet description
   */
  @Override
  public String getServletInfo() {
    return "Short description";
  }// </editor-fold>

}
