/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.jsavigny.controller;

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import com.jsavigny.model.*;
import com.jsavigny.dao.*;
/**
 *
 * @author Julio Savigny
 */
@WebServlet(name = "DBController", urlPatterns = {"/DBController"})
public class DBController extends HttpServlet {
    private QuestionDAO qdao;
    private AnswerDAO adao;
    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    public DBController(){
        qdao = new QuestionDAOImplementation();
        adao = new AnswerDAOImplementation();
    }
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet DBController</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet DBController at " + request.getContextPath() + "</h1>");
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
        String action=request.getParameter("action");
        if (action.equalsIgnoreCase("insert")){
            doPost(request,response);
        }
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
        String type=request.getParameter("type");
        if (type.equalsIgnoreCase("question")){
            Question question = new Question();
            question.setEmail(request.getParameter("email"));
            question.setName(request.getParameter("name"));
            question.setContent(request.getParameter("content"));
            question.setQtopic(request.getParameter("qtopic"));
            String qID=(request.getParameter("id"));
            
            if (qID==null||qID.isEmpty()){
                qdao.addQuestion(question);
            } else {
                question.setID(Integer.parseInt(qID));
                qdao.updateQuestion(question);
            }
        }
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
