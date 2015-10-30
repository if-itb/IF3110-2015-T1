/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DBHandler;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.*;
import java.sql.*;

/**
 *
 * @author Asus
 */
public class Question extends HttpServlet {
  final String DBName = "wbd_stackoverflow";

  final String JDBC_DRIVER="com.mysql.jdbc.Driver";  
  final String DB_URL="jdbc:mysql://localhost:3306/" + DBName + "?zeroDateTimeBehavior=convertToNull";

  //  Database credentials
  final String USER = "root";
  final String PASS = "default";
  
  public void insertQuestion(
    String question[],
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
        
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         PrintWriter out = response.getWriter();
         String sql = "INSERT INTO question (name, email, topic, content, vote, date_created, is_delete) VALUES (?,?,?,?,?,?,?)";
         PreparedStatement dbStatement = conn.prepareStatement(sql);
         dbStatement.setString(1, question[0]);
         dbStatement.setString(2, question[1]);
         dbStatement.setString(3, question[2]);
         dbStatement.setString(4, question[3]);
         dbStatement.setInt(5, Integer.parseInt(question[4]));
         dbStatement.setString(6, question[5]);
         dbStatement.setInt(7, Integer.parseInt(question[6]));
         
         dbStatement.executeUpdate();
         
         // Clean-up environment
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
    
    response.sendRedirect("home");    
  }  
  
  public void editQuestion(
    String question[],
    int id,
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
        
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         PrintWriter out = response.getWriter();
         String sql = "UPDATE question SET name = ?, email = ?, topic = ?, content = ? WHERE id = " + id;
         PreparedStatement dbStatement = conn.prepareStatement(sql);
         dbStatement.setString(1, question[0]);
         dbStatement.setString(2, question[1]);
         dbStatement.setString(3, question[2]);
         dbStatement.setString(4, question[3]);
         
         dbStatement.executeUpdate();
         
         // Clean-up environment
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
    
    response.sendRedirect( response.encodeRedirectURL(request.getContextPath()) + "/");    
  }  
  
  public void deleteQuestion(
    int id,
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
        
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         
         String sql = "UPDATE question SET is_delete = 1 WHERE id = " + id;
         PreparedStatement dbStatement = conn.prepareStatement(sql);         
         dbStatement.executeUpdate();
         
         // Clean-up environment
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
    
    response.sendRedirect( response.encodeRedirectURL(request.getContextPath()) + "/");    
  }  
  
  public void getQuestionList(
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
    
    PrintWriter out = response.getWriter();
    
		out.println("<div class='list'>");
		out.println("<div class='title'>Recently Asked Questions</div>");
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         String sql;
         sql = "SELECT * FROM question WHERE is_delete = 0 ORDER BY id DESC";
         ResultSet rs = stmt.executeQuery(sql);

         // Extract data from result set
         while(rs.next()){
            //Retrieve by column name
            int id = rs.getInt("id");
            String name = rs.getString("name");
            String topic = rs.getString("topic");
            String content = rs.getString("content");
            int vote = rs.getInt("vote");
            
            out.println(" <div class='question'> ");
            out.println(" 		<div class='votes'>" + vote + "<br> <span class='little-text'>Votes</span></div>");
            out.println(" 		<div class='answers'>" + getAnswerCount(id, request, response) + "<br> <span class='little-text'>Answers</span></div>");
            out.println(" 		<div class='data'> ");
            out.println("			<a href='question/" + id + "'>");
            out.println(" 			<div class='topic'>" + topic + "</div>");
            out.println("			</a>");
            out.println(" 			<div class='content'>" + content + "</div>");
            out.println(" 			<div class='control'>asked by <span class='name'>" + name + "</span> | <a class='edit' href='edit/question/" + id + "'> edit </a> | <a class='delete' onclick='deleteQuestion(\"" + response.encodeRedirectURL(request.getContextPath()) + "\"," + id + ")'>delete</a> </div>");
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
      out.println("</div>");
    
  }  
  
  public String[] getQuestionByID(
    int id,
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
    
    PrintWriter out = response.getWriter();
    
    String ret[];
    ret = new String[7];
    
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         String sql;
         sql = "SELECT * FROM question WHERE id = '" + id + "' AND is_delete = 0 ";
         ResultSet rs = stmt.executeQuery(sql);

         // Extract data from result set
         while(rs.next()){
            //Retrieve by column name
            ret[0] = Integer.toString(id);
            String name = rs.getString("name");
            ret[1] = name;
            String email = rs.getString("email");
            ret[2] = email;
            String content = rs.getString("content");
            ret[3] = content;
            String topic = rs.getString("topic");
            ret[4] = topic;
            int vote = rs.getInt("vote");
            ret[5] = Integer.toString(vote);
            String date = rs.getString("date_created");
            ret[6] = date;
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
    
    return ret;
  }
  
  public int getAnswerCount(
    int id,
    HttpServletRequest request,
    HttpServletResponse response) 
    throws ServletException, IOException {
    
    PrintWriter out = response.getWriter();
    int count = 0;
    
    try{
         // Register JDBC driver
         Class.forName("com.mysql.jdbc.Driver");
         // Open a connection
         Connection conn = DriverManager.getConnection(DB_URL, USER, PASS);

         // Execute SQL query
         Statement stmt = conn.createStatement();
         String sql;
         sql = "SELECT COUNT(*) as total FROM answer WHERE id_q = " + id;
         ResultSet rs = stmt.executeQuery(sql);

         // Extract data from result set
         while(rs.next()){
            //Retrieve by column name
            count = rs.getInt("total");
            
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
    return count;
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
    return "Do nothing";
  }// </editor-fold>

}
