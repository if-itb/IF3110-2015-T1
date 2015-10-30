/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DBHandler;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.*;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Asus
 */
public class Answer extends HttpServlet {
  final String DBName = "wbd_stackoverflow";

  final String JDBC_DRIVER="com.mysql.jdbc.Driver";  
  final String DB_URL="jdbc:mysql://localhost:3306/" + DBName + "?zeroDateTimeBehavior=convertToNull";

  //  Database credentials
  final String USER = "root";
  final String PASS = "default";

  public void getAnswerByQID(
    int id,
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
    
    PrintWriter out = response.getWriter();
    
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         String sql;
         sql = "SELECT * FROM answer WHERE id_q = " + id;
         ResultSet rs = stmt.executeQuery(sql);

         // Extract data from result set
         while(rs.next()){
            //Retrieve by column name
            String name = rs.getString("name");
            String email = rs.getString("email");
            String content = rs.getString("content");
            int vote = rs.getInt("vote");
            String date = rs.getString("date_created");
            
            if ( vote >= 0 ) {
              out.println(" <div class='aview'> ");
            } else {
              out.println(" <div class='aview negative'> ");
            }
            
            out.println(" 		<div class='votes'>");	 
            out.println("			<a class='up_vote' onclick=\"voting(" + id + ", 'up', 'answer')\"></a>");	
            out.println("			<div id='vote_count_a_" + id + "' class='vote_count'>" + vote + "</div>");	
            out.println("			<a class='down_vote' onclick=\"voting(" + id + ", 'down', 'answer')\"></a>");	
            out.println("		</div>");	
            out.println(" 		<div class='data'> ");	
            out.println(" 			<div class='content'>" + content + "</div>");	
            out.println(" 			<div class='control'>answered by <span class='name'>" + name + "</span> at " + date + " </div>");	
            out.println(" 		</div> ");	
            out.println(" </div> ");	
          } 

         // Clean-up environment
         rs.close();
         stmt.close();
         conn.close();
      } catch (ClassNotFoundException e1) {
        // JDBC driver class not found, print error message to the console
        System.out.println(e1.toString());
      }
      catch (SQLException e2) {
        // Exception when executing java.sql related commands, print error message to the console
        System.out.println(e2.toString());
      }
      catch (Exception e3) {
        // other unexpected exception, print error message to the console
        System.out.println(e3.toString());
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
    //processRequest(request, response);
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
    //processRequest(request, response);
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
