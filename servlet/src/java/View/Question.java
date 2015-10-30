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

/**
 *
 * @author Asus
 */
public class Question extends HttpServlet {

  /**
   * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
   * methods.
   *
   * @param request servlet request
   * @param response servlet response
   * @throws ServletException if a servlet-specific error occurs
   * @throws IOException if an I/O error occurs
   */
  protected void processRequest(HttpServletRequest request, HttpServletResponse response)
    throws ServletException, IOException {
    response.setContentType("text/html;charset=UTF-8");
    try (PrintWriter out = response.getWriter()) {
      /* TODO output your page here. You may use following sample code. */
      request.getRequestDispatcher("/includes/header.jsp").include(request, response);
            
      String pathInfo = request.getPathInfo();
      String[] pathParts = pathInfo.split("/");
      int parameter1 = Integer.parseInt(pathParts[1]); 

      DBHandler.Question DBQ = new DBHandler.Question();
      String q[] = DBQ.getQuestionByID(parameter1, request, response);
      
      out.println("<div class='title'> " + q[4] + " </div>");

      if ( Integer.parseInt(q[5]) >= 0 ) {
        out.println(" <div class='qview'> ");
      } else {
        out.println(" <div class='qview negative'> ");
      }

      out.println(" 		<div class='votes'>"); 
      out.println("			<a class='up_vote' onclick=\"voting(" + Integer.parseInt(q[0]) + ", 'up', 'question')\"></a>");
      out.println("			<div id='vote_count_q_" + Integer.parseInt(q[0]) + "' class='vote_count'>" + Integer.parseInt(q[5]) + "</div>");
      out.println("			<a class='down_vote' onclick=\"voting(" + Integer.parseInt(q[0]) + ", 'down', 'question')\"></a>");
      out.println("		</div>");
      out.println(" 		<div class='data'> ");
      out.println(" 			<div class='content'>" + q[3] + "</div>");
      out.println(" 			<div class='control'>asked by <span class='name'>" + q[1] + "</span> at " + q[6] + " | <a class='edit' href='edit/question/" + Integer.parseInt(q[0]) + "'> edit </a> | <a class='delete' onclick='deleteQuestion(\"" + response.encodeRedirectURL(request.getContextPath()) + "\"," + Integer.parseInt(q[0]) + ")'>delete</a> </div>");
      out.println(" 		</div> ");
      out.println(" </div> ");	
      
      out.println("<div class='title'>" + DBQ.getAnswerCount(parameter1, request, response) + " Answer(s)</div>");
      
      DBHandler.Answer DBA = new DBHandler.Answer();
      DBA.getAnswerByQID(parameter1, request, response);
      
      out.println("	<div id=\"form\">\n" +
                  "\n" +
                  "		<div class=\"title\"> Your Answer </div>\n" +
                  "		<div class=\"content\">\n" +
                  "			<form id=\"answer\" action=\"\" method=\"post\" onsubmit=\"return validateAnswerForm()\">\n" +
                  "				<input type=\"hidden\" id=\"id\" name=\"id\" value=\"<?php echo $id; ?>\">\n" +
                  "				<input type=\"text\" id=\"name\" name=\"name\" placeholder=\"Name\">\n" +
                  "				<br>\n" +
                  "				<input type=\"text\" id=\"email\" name=\"email\" placeholder=\"Email@Email.com\">\n" +
                  "				<br>\n" +
                  "				<textarea id=\"content\" name=\"content\" placeholder=\"Content\" rows=\"5\" cols=\"40\"></textarea>\n" +
                  "				<button type=\"submit\">Answer</button>\n" +
                  "			</form>\n" +
                  "		</div>\n" +
                  "		\n" +
                  "	</div>");
      out.println("</div>");
      
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
    processRequest(request, response);
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
    processRequest(request, response);
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
