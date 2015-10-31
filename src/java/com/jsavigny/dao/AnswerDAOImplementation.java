package com.jsavigny.dao;
 
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
 
import com.jsavigny.model.Answer;
import com.jsavigny.util.DBConnect;
 
public class AnswerDAOImplementation implements AnswerDAO {
 
    private Connection conn;
 
    public AnswerDAOImplementation() {
        conn = DBConnect.getConnection();
    }
    @Override
    public void addAnswer( Answer answer ) {
        try {
            String query = "insert into answer (name, email, qtopic, a_content,vote,qid) values (?,?,?,?,?)";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setString( 1, answer.getName() );
            preparedStatement.setString( 2, answer.getEmail() );
            preparedStatement.setString( 3, answer.getQtopic());
            preparedStatement.setString( 4, answer.getA_content());
            preparedStatement.setInt( 5, answer.getVote() );
            preparedStatement.setInt( 6, answer.getQID() );
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public void deleteAnswer( int answerId ) {
        try {
            String query = "delete from answer where answerId=?";
            PreparedStatement preparedStatement = conn.prepareStatement(query);
            preparedStatement.setInt(1, answerId);
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public void updateAnswer( Answer answer ) {
        try {
            String query = "update answer set name=?, email=?, qtopic=?, a_content=?, vote=?, qid=? where answerId=?";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setString( 1, answer.getName() );
            preparedStatement.setString( 2, answer.getEmail() );
            preparedStatement.setString( 3, answer.getQtopic());
            preparedStatement.setString( 4, answer.getA_content());
            preparedStatement.setInt( 5, answer.getVote() );
            preparedStatement.setInt( 6, answer.getQID() );
            preparedStatement.executeUpdate();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    @Override
    public List<Answer> getAllAnswer() {
        List<Answer> answers = new ArrayList<Answer>();
        try {
            Statement statement = conn.createStatement();
            ResultSet resultSet = statement.executeQuery( "select * from answer" );
            while( resultSet.next() ) {
                Answer answer = new Answer();
                answer.setQID(resultSet.getInt( "qid" ) );
                answer.setAID(resultSet.getInt("id"));
                answer.setName( resultSet.getString( "name" ) );
                answer.setEmail( resultSet.getString( "email" ) );
                answer.setQtopic( resultSet.getString( "qtopic" ) );
                answer.setA_content( resultSet.getString( "a_content" ) );
                answer.setVote( resultSet.getInt( "vote" ) );
                answers.add(answer);
            }
            resultSet.close();
            statement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return answers;
    }
    @Override
    public Answer getAnswerById(int answerId) {
        Answer answer = new Answer();
        try {
            String query = "select * from answer where answerId=?";
            PreparedStatement preparedStatement = conn.prepareStatement( query );
            preparedStatement.setInt(1, answerId);
            ResultSet resultSet = preparedStatement.executeQuery();
            while( resultSet.next() ) {
                answer.setQID(resultSet.getInt( "qid" ) );
                answer.setAID(resultSet.getInt("id"));
                answer.setName( resultSet.getString( "name" ) );
                answer.setEmail( resultSet.getString( "email" ) );
                answer.setQtopic( resultSet.getString( "qtopic" ) );
                answer.setA_content( resultSet.getString( "a_content" ) );
                answer.setVote( resultSet.getInt( "vote" ) );
            }
            resultSet.close();
            preparedStatement.close();
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return answer;
    }
 
}