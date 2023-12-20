create database awsQuiz;
use awsQuiz;

create table question
(
    questionID   int auto_increment primary key,
    questionText text
);
CREATE TABLE answer
(
    answerID     INT AUTO_INCREMENT PRIMARY KEY,
    answerText   TEXT,
    answerStatus INT,
    questionFK   INT,
    CONSTRAINT question_FK
        FOREIGN KEY (questionFK) REFERENCES question (questionID)
);

alter table question
add column questionDesc text;