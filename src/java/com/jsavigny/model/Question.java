/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.jsavigny.model;

/**
 *
 * @author Julio Savigny
 */
public class Question {
    private int qID;
    private String name;
    private String email;
    private String qtopic;
    private String content;
    private int vote;
    
    public int getID(){
        return qID;
    }
    public String getName(){
        return name;
    }
    public String getEmail(){
        return email;
    }
    public String getQtopic(){
        return qtopic;
    }
    public String getContent(){
        return content;
    }
    public int getVote(){
        return vote;
    }
    public void setID(int ID){
        qID=ID;
    }
    public void setName(String name){
        this.name=name;
    }
    public void setEmail(String email){
        this.email=email;
    }
    public void setQtopic(String qtopic){
        this.qtopic=qtopic;
    }
    public void setContent(String content){
        this.content=content;
    }
    public void setVote(int vote){
        this.vote=vote;
    }
}
