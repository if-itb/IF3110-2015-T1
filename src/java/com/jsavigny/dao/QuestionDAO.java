/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.jsavigny.dao;
import java.util.ArrayList;
import com.jsavigny.model.Question;
/**
 *
 * @author Julio Savigny
 */
 
 
public interface QuestionDAO {
    public void addQuestion( Question question );
    public void deleteQuestion( int qId );
    public void updateQuestion( Question question  );
    public ArrayList<Question> getAllQuestion();
    public Question getQuestionById( int qId );
    public int getAnswerNumber(int qId);
}
