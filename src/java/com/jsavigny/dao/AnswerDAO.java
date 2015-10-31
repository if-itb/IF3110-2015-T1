/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.jsavigny.dao;
import java.util.List;
import com.jsavigny.model.Answer;
/**
 *
 * @author Julio Savigny
 */
 
 
public interface AnswerDAO {
    public void addAnswer( Answer answer );
    public void deleteAnswer( int aId );
    public void updateAnswer( Answer answer );
    public List<Answer> getAllAnswer();
    public Answer getAnswerById( int aId );
}
