CREATE TABLE Questions (
	qid INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	qName VARCHAR(255) NOT NULL,
	qEmail VARCHAR(255) NOT NULL,
	qTopic VARCHAR(255) NOT NULL,
	qContent VARCHAR(50000) NOT NULL,
	qVote INT(6) DEFAULT '0',
	qDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) 

CREATE TABLE Answers(
	aid INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	qid INT(6) NOT NULL REFERENCES Questions ON DELETE CASCADE,
	aName VARCHAR(255) NOT NULL,
	aEmail  VARCHAR(255) NOT NULL,
	aContent VARCHAR(50000) NOT NULL,
	aVote INT(6) DEFAULT '0',
	aDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)