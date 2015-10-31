package com.jsavigny.dao;
 
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
 
import com.jsavigny.model.Question;
import com.jsavigny.util.DBConnect;
 
public class QuestionDAOImplementation implements QuestionDAO {
 
    public Connection conn;
 
    public QuestionDAOImplementation() {
        conn = DBConnect.getConnection();
    }
    @Override
    public void addQuestion( Question question ) {
        try {
            String query = "insert into question (name, email, qtopic, content,vote) values (?,?,?,?,?)";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setString( 1, question.getName() );
            preparedStatement.setString( 2, question.getEmail() );
            preparedStatement.setString( 3, question.getQtopic());
            preparedStatement.setString( 4, question.getContent());
            preparedStatement.setInt( 5, question.getVote() );
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public void deleteQuestion( int questionId ) {
        try {
            String query = "delete from question where questionId=?";
            PreparedStatement preparedStatement = conn.prepareStatement(query);
            preparedStatement.setInt(1, questionId);
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public void updateQuestion( Question question ) {
        try {
            String query = "update question set name=?, email=?, qtopic=?, content=?, vote=? where questionId=?";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setString( 1, question.getName() );
            preparedStatement.setString( 2, question.getEmail() );
            preparedStatement.setString( 3, question.getQtopic());
            preparedStatement.setString( 4, question.getContent());
            preparedStatement.setInt( 5, question.getVote() );
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public ArrayList<Question> getAllQuestion() {
        ArrayList<Question> questions = new ArrayList<Question>();
        try {
            Statement statement = conn.createStatement();
            ResultSet resultSet = statement.executeQuery( "select * from question" );
            while( resultSet.next() ) {
                Question question = new Question();
                question.setID(resultSet.getInt( "id" ) );
                question.setName( resultSet.getString( "name" ) );
                question.setEmail( resultSet.getString( "email" ) );
                question.setQtopic( resultSet.getString( "qtopic" ) );
                question.setContent( resultSet.getString( "content" ) );
                question.setVote( resultSet.getInt( "vote" ) );
                questions.add(question);
            }
            resultSet.close();
            statement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return questions;
    }
    @Override
    public Question getQuestionById(int questionId) {
        Question question = new Question();
        try {
            String query = "select * from question where questionId=?";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setInt(1, questionId);
            ResultSet resultSet = preparedStatement.executeQuery();
            while( resultSet.next() ) {
                question.setID(resultSet.getInt( "id" ) );
                question.setName( resultSet.getString( "name" ) );
                question.setEmail( resultSet.getString( "email" ) );
                question.setQtopic( resultSet.getString( "qtopic" ) );
                question.setContent( resultSet.getString( "content" ) );
                question.setVote( resultSet.getInt( "vote" ) );
            }
            resultSet.close();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return question;
    }
    public int getAnswerNumber(int questionId){
        int numberOfAnswer=0;
        try {
            String query = "select count(answers.qid) as number_of_answer from question left join answers on (question.id=answers.qid) where questionId=?";
            PreparedStatement preparedStatement = conn.prepareStatement(query);
            preparedStatement.setInt(1, questionId);
            ResultSet resultSet = preparedStatement.executeQuery();
            while (resultSet.next()){
                numberOfAnswer=(resultSet.getInt("number_of_answer"));
            }
            resultSet.close();
            preparedStatement.close();
        } catch (SQLException e){
            e.printStackTrace();
        }
        return numberOfAnswer;
    }
 
}