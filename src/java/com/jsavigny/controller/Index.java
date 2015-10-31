/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.jsavigny.controller;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.*;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import com.jsavigny.dao.*;
import java.util.ArrayList;
import java.util.List;
import com.jsavigny.model.*;
/**
 *
 * @author Julio Savigny
 */
public class Index extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    QuestionDAOImplementation qdao;
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            qdao = new QuestionDAOImplementation();
            ArrayList<Question> lQuestions = qdao.getAllQuestion();
            out.println("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">");
            out.println("<html>");
            out.println("<head>");
                    out.println("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">");
                    out.println("<title>Simple Stack Exchange</title>");
                out.println("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">");
            out.println("</head>");
            out.println("<body>");
                    out.println("<div id=\"wrapper\">");
                    out.println("<div id=\"header\">");
                        out.println("<div id=\"title\">");
                            out.println("<a href=\"\" class=\"center\"><p>Simple StackExchange</p></a>");
                        out.println("</div>");
                        out.println("<div class=\"center\">");
                            out.println("<form id=\"form\" name=\"search\" action=\"\" method=\"GET\">");
                                out.println("<input autofocus type=\"text\" name=\"search\" id=\"search-bar\" placeholder=\"Search question topic or content here...\" >");
                                out.println("<input id =\"search-submit\" type=\"submit\" value=\"Search\">");
                                            out.println("</form>");
                        out.println("</div>");

                    out.println("</div>");
                    out.println("<div id=\"nav\">");
                            out.println("<div id=\"askme\">");
                            out.println("<p class=\"center\">Cannot find what you are looking for? <a href=\"askme.html\" class=\"orange\">Ask Here</a></p>");
                        out.println("</div>");
                    out.println("</div>");
                    out.println("<div class=\"contents\">");
                            out.println("<h2><p>Recently Asked Questions</p></h2>");
                        out.println("<hr>");
                        out.println("<div id=\"questions\">");
                            if(lQuestions.isEmpty()){
                                out.println("<h2>There is no question.. be the first to ask!</h2>");
                            } else {
                                for (Question question : lQuestions){
                                            out.println("<div class=\"questionbox\">");
                                                out.println("<div class=\"voteanswer\">");
                                                    out.println("<div class=\"qvote\">");
                                                        out.println("<div class=\"counter\">");
                                                            out.println(question.getVote());
                                                        out.println("</div>");
                                                        out.println("<div class=\"word\">");
                                                            out.println("Votes");
                                                        out.println("</div>");
                                                    out.println("</div>");
                                                    out.println("<div class=\"avote\">");
                                                        out.println("<div class=\"counter\">");
                                                            out.println(qdao.getAnswerNumber(question.getID()));
                                                        out.println("</div>");
                                                        out.println("<div class=\"word\">");
                                                            out.println("Answers");
                                                        out.println("</div>");
                                                    out.println("</div>");
                                                out.println("</div>");
                                                out.println("<div class=\"qbox\">");
                                                    out.println("<div class=\"qboxtopic\">");
                                                        out.println("<a href=\"\" class=\"qlink\">"+question.getQtopic()+"</a>");
                                                    out.println("</div>");
                                                    out.println("<div class=\"qboxcontent\">");
                                                        out.println(question.getContent());
                                                    out.println("</div>");
                                                    out.println("<div class=\"qmeta\">");
                                                        out.println("Asked by  <span class=\"purple\"></span> | <a href=\"\" class=\"orange\">edit</a> | <a href=\"\" class=\"delete red\">delete</a>"); 
                                                    out.println("</div>");
                                                out.println("</div>");

                                            out.println("</div>");
                                        out.println("<hr>");
                                }
                            }
                            out.println("</div>");
                        out.println("</div>");
                    out.println("</div>");
                out.println("</div>");
                    out.println("<script src=\"js/thescript.js\"></script>");
            out.println("</body>");
            out.println("</html>");
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
