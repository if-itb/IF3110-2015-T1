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
public class Answer {
    private int aID;
    private int qID;
    private String name;
    private String email;
    private String qtopic;
    private String a_content;
    private int vote;
    public int getAID(){
        return aID;
    }
    public int getQID(){
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
    public String getA_content(){
        return a_content;
    }
    public int getVote(){
        return vote;
    }
    public void setAID(int aID){
        this.aID=aID;
    }
    public void setQID(int qID){
        this.qID=qID;
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
    public void setA_content(String a_content){
        this.a_content=a_content;
    }
    public void setVote(int vote){
        this.vote=vote;
    }
}
