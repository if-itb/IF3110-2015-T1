CREATE TABLE Question (
     qid int(11) NOT NULL AUTO_INCREMENT,
     AuthorName varchar(255) NOT NULL,
     Email varchar(255) NOT NULL,
     QuestionTopic varchar(255) NOT NULL,
     Content varchar(64511),
     vote int(11) DEFAULT '0',
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY(qid)
);

CREATE TABLE Answer (
     aid int(11) NOT NULL AUTO_INCREMENT,
     qid int(11) NOT NULL REFERENCES Question ON DELETE CASCADE,
     AuthorName varchar(255) NOT NULL,
     Email varchar(255) NOT NULL,
     Content varchar(64511),
     vote int(11) DEFAULT '0',
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY(aid)
);
