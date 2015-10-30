/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package View;

import java.io.IOException;
import java.io.PrintWriter;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Asus
 */
public class InsertQuestion extends HttpServlet {

  protected void processPostRequest(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");
    try (PrintWriter out = response.getWriter()) {

      String question[];
      question = new String[7];
      
      question[0] = request.getParameter("name");
      question[1] = request.getParameter("email");
      question[2] = request.getParameter("topic");
      question[3] = request.getParameter("content");
      question[4] = "0";
      
      DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd HH:mm:ss");
      Date date = new Date();
      question[5] = dateFormat.format(date);
      question[6] = "0";
      
      DBHandler.Question DB = new DBHandler.Question();
      DB.insertQuestion(question, request, response);      
    }
  }
  
  /**
   * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
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
      request.getRequestDispatcher("/includes/header.jsp").include(request, response);
      out.println("<div id=\"form\">\n" +
                  "\n" +
                  "		<div class=\"title\"> Ask Question </div>\n" +
                  "		<div class=\"content\">\n" +
                  "			<form id=\"ask\" action=\"\" method=\"post\" onsubmit=\"return validateAskForm()\">\n" +
                  "				<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Name\">\n" +
                  "				<br>\n" +
                  "				<input type=\"text\" id=\"email\" name=\"email\" placeholder=\"Email@Email.com\">\n" +
                  "				<br>\n" +
                  "				<input type=\"text\" id=\"topic\" name=\"topic\" placeholder=\"Topic\">\n" +
                  "				<br>\n" +
                  "				<textarea id=\"content\" name=\"content\" placeholder=\"Content\" rows=\"5\" cols=\"40\"></textarea>\n" +
                  "				<button type=\"submit\">Add</button>\n" +
                  "			</form>\n" +
                  "		</div>\n" +
                  "		\n" +
                  "	</div>");
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
