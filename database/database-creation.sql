drop table if exists High_Score;
drop table if exists Answer;
drop table if exists Question;
drop table if exists Quiz;

create table Quiz
	(id					INT,
	 quiz_creator		varchar(45),
	 primary key (id)
	);

create table Question
	(id						varchar(45), 
	 question_string		varchar(45), 
	 quiz_id			    INT,
	 primary key (id),
	 foreign key (quiz_id) references Quiz (id)
		on delete set null
	);
create table Answer 
        (id                 varchar(45),
        answer_string       varchar(45),
        isAnswer            boolean not null,
        question_id         varchar(45),
        quiz_id             INT,
        primary key (id),
        foreign key (question_id) references Question (id)
            on delete set null, 
        foreign key (quiz_id) references Quiz (id)
            on delete set null
    );

create table High_Score
	(usrname    varchar(45),
	 score		INT,
	 quiz_id	INT,
	 primary key (usrname),
     foreign key (quiz_id) references Quiz (id)
        on delete set null
	);

insert into Quiz values (1, 'Jenna');
insert into Quiz values (2, 'Andrew');

insert into High_Score values ('Bryce', 0, 1);
insert into High_Score values ('Alex', 3, 2);

insert into Question values ('quiz1qstn1', 'Which of the following are true?', 1);
insert into Question values ('quiz1qstn2', 'What is 0x10 in decimal?', 1);
insert into Question values ('quiz2qstn1', 'What is the capital of Zimbabwe?', 2);
insert into Question values ('quiz2qstn2', 'Select the vowels:', 2);

insert into Answer values ('quiz1qstn1a1', '9 > 9', false, 'quiz1qstn1', 1);
insert into Answer values ('quiz1qstn1a2', '6 || 5 == 6', true, 'quiz1qstn1', 1);
insert into Answer values ('quiz1qstn1a3', '9 <= 9', true, 'quiz1qstn1', 1);
insert into Answer values ('quiz1qstn1a4', '|5 - 6| == 1', true, 'quiz1qstn1', 1);

insert into Answer values ('quiz1qstn2a1', '10', false, 'quiz1qstn2', 1);
insert into Answer values ('quiz1qstn2a2', '20', false, 'quiz1qstn2', 1);
insert into Answer values ('quiz1qstn2a3', '17', false, 'quiz1qstn2', 1);
insert into Answer values ('quiz1qstn2a4', '16', true, 'quiz1qstn2', 1);

insert into Answer values ('quiz2qstn1a1', 'Nairobi', false, 'quiz2qstn1', 2);
insert into Answer values ('quiz2qstn1a2', 'Harare', true, 'quiz2qstn1', 2);
insert into Answer values ('quiz2qstn1a3', 'Gravy', false, 'quiz2qstn1', 2);
insert into Answer values ('quiz2qstn1a4', 'Bulawayo', false, 'quiz2qstn1', 2);

insert into Answer values ('quiz2qstn2a1', 'o', true, 'quiz2qstn2', 2);
insert into Answer values ('quiz2qstn2a2', 'u', true, 'quiz2qstn2', 2);
insert into Answer values ('quiz2qstn2a3', 'c', false, 'quiz2qstn2', 2);
insert into Answer values ('quiz2qstn2a4', 'h', false, 'quiz2qstn2', 2);
