drop table if exists post;
create table post (    
    post_id integer not null primary key autoincrement,    
    username varchar(80) not null, 
    title varchar(80) not null, 
    msg text not null, 
    post_date TIMESTAMP DEFAULT (DATE (CURRENT_TIMESTAMP, 'LOCALTIME')) NOT NULL
); 
insert into post (username, title, msg) values ("Sadeed",  "1st post", "This is my first post");
insert into post (username, title, msg) values ("Ahmad",  "2nd post", "This is my first post");
insert into post (username, title, msg) values ("John",  "3rd post", "This is my first post");
insert into post (username, title, msg) values ("John",  "3rd post", "This is my first post", "2018-09-01");

drop table if exists comment;
create table comment (    
    comment_id integer not null primary key autoincrement,    
    comment_username varchar(80) not null,  
    comment_msg text not null,
    post_id integer,
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
    REFERENCES post(post_id)
); 

insert into comment (comment_username, comment_msg, post_id) values ("Sadeed",  "first comment", "2");
insert into comment (comment_username, comment_msg, post_id) values ("alpha",  "2nd comment", "2");
insert into comment (comment_username, comment_msg, post_id) values ("bravo",  "3rd comment", "3");







