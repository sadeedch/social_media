drop table if exists my_table;
CREATE TABLE my_table (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    name VARCHAR(64),
    sqltime TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);







