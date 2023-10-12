-- Create life_manager database -- 
DROP DATABASE IF EXISTS life_manager;
CREATE DATABASE life_manager;
USE life_manager;

CREATE TABLE users (
    email varchar (50) NOT NULL,
    password varchar (50) NOT NULL,
    PRIMARY KEY (email)
);

-- Obvious placeholder password.
INSERT INTO users VALUES
('tannerwatmough@gmail.com', 'password');

CREATE TABLE categories (
    categoryId int NOT NULL AUTO_INCREMENT,
    name varchar (50) NOT NULL,
    info varchar (255) NULL,
    PRIMARY KEY (categoryId)
);

INSERT INTO categories VALUES
(1, 'Morning Routine', NULL),
(2, 'Learning Routine', 'Daily Learning'),
(3, 'Health Routine', 'Daily Health'),
(4, 'Cleaning Routine', 'Daily Cleaning'),
(5, 'Night Routine', NULL),
(6, 'Environment', 'Home, cleaning, maintenance'),
(7, 'Health', 'Mental, physical, nutritional, spiritual'),
(8, 'Relationships', 'Social, romantic, family, people, the community'),
(9, 'Life Management', 'Finances, goals, time management, life admin'),
(10, 'Career', 'Entrepreneurship and work'),
(11, 'Growth', 'Learning, skills, experiences, recreation'),
(12, 'Spring Maintenance', 'Spring Cleaning'),
(13, 'Summer Maintenance', NULL),
(14, 'Fall Maintenance', NULL),
(15, 'Winter Maintenance', NULL),
(16, 'Quarterly Tasks', 'Occurs every maintenance cycle.');




CREATE TABLE dailyHabit (
    dailyId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL,
    info varchar (255) NULL,
    currStreak int NOT NULL,
    maxStreak int NOT NULL, 
    startDate datetime NOT NULL,
    lastDate datetime NULL,
    PRIMARY KEY (dailyId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE weeklyTask (
    weeklyId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL,
    currStreak int NOT NULL,
    maxStreak int NOT NULL, 
    startDate datetime NOT NULL,
    lastDate datetime NULL,
    PRIMARY KEY (weeklyId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE monthlyTask (
    monthlyId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL,
    currStreak int NOT NULL,
    maxStreak int NOT NULL, 
    startDate datetime NOT NULL,
    lastDate datetime NULL,
    PRIMARY KEY (monthlyId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE seasonalTask ( 
    seasonalId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL,
    currStreak int NOT NULL,
    maxStreak int NOT NULL, 
    startDate datetime NOT NULL,
    lastDate datetime NULL,
    PRIMARY KEY (seasonalId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE tasks (
    taskId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL,
    priority int NOT NULL,
    dueDate datetime NULL,
    PRIMARY KEY (taskId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE goals (
    goalId int NOT NULL AUTO_INCREMENT,
    email varchar (50) NOT NULL,
    name varchar (50) NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL, 
    priority int NULL,
    dueDate datetime NULL,
    PRIMARY KEY (goalId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

CREATE TABLE books (
    bookId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    author varchar (50) NOT NULL,
    genre varchar (50) NOT NULL,
    platform varchar (50) NOT NULL,
    priority BOOLEAN NOT NULL,
    completedDate datetime NULL,
    summary text NULL,
    PRIMARY KEY (bookId),
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE games (
    gameId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    platform varchar (20) NOT NULL,
    length varchar (20) NOT NULL,
    completedDate datetime NULL,
    url varchar(50) NULL,
    notes varchar(255) NULL,
    PRIMARY KEY (gameId),
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE courses (
    courseId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    area varchar (50) NOT NULL,
    url varchar(50) NULL,
    completedDate datetime NULL,
    -- Intended to be URL to link to page with notes --
    notes varchar(50) NULL,
    PRIMARY KEY (courseId),
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE movies (
    movieId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50),
    year int NOT NULL,
    completedDate datetime NULL,
    rating int NULL,
    summary text NULL,
    PRIMARY KEY (movieId),
    FOREIGN KEY (email) REFERENCES users(email)
);

CREATE TABLE completed (
    completeId int NOT NULL AUTO_INCREMENT,
    email varchar(50) NOT NULL,
    name varchar (50) NOT NULL,
    completedDate datetime NOT NULL,
    category int NOT NULL, 
    info varchar (255) NULL, 
    PRIMARY KEY (completeId),
    FOREIGN KEY (email) REFERENCES users(email),
    FOREIGN KEY (category) REFERENCES categories(categoryId)
);

-- Create program admin var named lm_admin
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO lm_admin@localhost
IDENTIFIED BY 'pa55word';