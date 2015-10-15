-- @author : Ignatius Alriana H.M / 13513051
-- host : localhost
-- password : ""

CREATE DATABASE StackExchange;

USE StackExchange;

DROP TABLE IF EXISTS Question;
CREATE TABLE Question (
     id_q int(10) NOT NULL AUTO_INCREMENT,
     Name varchar(255) NOT NULL,
     Email varchar(255) NOT NULL,
     Topic varchar(255) NOT NULL,
     Content text NOT NULL,
     nvote int(11) DEFAULT '0',
     nAns int(11) DEFAULT '0',
     created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY(id_q)
);

DROP TABLE IF EXISTS 'Answer';
CREATE TABLE Answer (
     id_a int(11) NOT NULL AUTO_INCREMENT,
     id_q int(11) NOT NULL REFERENCES Question ON DELETE CASCADE,
     Name varchar(255) NOT NULL,
     Email varchar(255) NOT NULL,
     Content text NOT NULL,
     nvote int(11) DEFAULT '0',
     created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY(id_a)
     -- FOREIGN KEY (id_q) REFERENCES Question(id_q)
);
