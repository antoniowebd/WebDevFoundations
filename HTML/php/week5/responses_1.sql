use php_mysql_exercisedb;

CREATE TABLE responses_1(
    id INT auto_increment PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    gender VARCHAR(10) NOT NULL,
    interests VARCHAR(255),
    country VARCHAR(50) NOT NULL,
    comments TEXT
);
