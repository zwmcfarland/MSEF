CREATE DATABASE MSEF;
USE MSEF;


CREATE TABLE forms ( 
  Id INT NOT NULL AUTO_INCREMENT, 
  Name VARCHAR(250) NOT NULL, 
  FormPath VARCHAR(1000) NOT NULL, 
  PRIMARY KEY(Id)
);

CREATE TABLE statuses ( 
  Id INT NOT NULL AUTO_INCREMENT, 
  Name VARCHAR(100) NOT NULL, 
  Description VARCHAR(250), 
  PRIMARY KEY(Id)
);

CREATE TABLE projects (
  Id INT NOT NULL AUTO_INCREMENT, 
  status_id INT NOT NULL, 
  Name VARCHAR(250) NOT NULL, 
  Electrical BOOL NOT NULL DEFAULT FALSE,
  Description VARCHAR(1000) NOT NULL, 
  Abstract VARCHAR(1000) NOT NULL, 
  PRIMARY KEY(Id), 
  FOREIGN KEY (status_id) REFERENCES statuses(Id),
  FULLTEXT INDEX (Name, Description, Abstract)
) ENGINE=MyISAM;

CREATE TABLE categories (
  Id INT NOT NULL AUTO_INCREMENT, 
  Name VARCHAR(250) NOT NULL, 
  Description VARCHAR(250) NOT NULL, 
  MaxCapacity INT NULL, 
  PRIMARY KEY (Id)
);


CREATE TABLE projectCatagories (
   project_id INT NOT NULL,
   category_id INT NOT NULL,
   FOREIGN KEY (project_id) REFERENCES projects(Id),
   FOREIGN KEY (project_id) REFERENCES categories(Id)
)ENGINE=MyISAM;

CREATE TABLE awards (
  Id INT NOT NULL AUTO_INCREMENT, 
  Name VARCHAR(250) NOT NULL, 
  Description VARCHAR(1000) NOT NULL, 
  Reward VARCHAR(1000) NULL, 
  PRIMARY KEY(Id)
);

CREATE TABLE keywords ( 
  Id INT NOT NULL AUTO_INCREMENT,
  Keyword VARCHAR(250) NOT NULL,
  PRIMARY KEY(Id)
);

CREATE TABLE formKeywords (
    form_id INT NOT NULL,
    keyword_id INT NOT NULL,
    FOREIGN KEY (form_id) REFERENCES forms(Id),
    FOREIGN KEY (keyword_id) REFERENCES keywords(Id)
); 

CREATE TABLE awardKeywords (
    award_id INT NOT NULL,
    keyword_id INT NOT NULL,
    FOREIGN KEY (award_id) REFERENCES awards(Id),
    FOREIGN KEY (keyword_id) REFERENCES keywords(Id)
);  

CREATE TABLE categoryKeywords (
    category_id INT NOT NULL,
    keyword_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(Id),
    FOREIGN KEY (keyword_id) REFERENCES keywords(Id)
);

CREATE TABLE schools (
      Id INT NOT NULL AUTO_INCREMENT, 
      Name VARCHAR(255) NOT NULL, 
      City VARCHAR(255) NOT NULL, 
      State VARCHAR(255) NOT NULL, 
      Address1 VARCHAR(255) NOT NULL, 
      Address2 VARCHAR(255) NOT NULL, 
      Zip VARCHAR(10) NOT NULL, 
      PRIMARY KEY(Id)
);

CREATE TABLE events(
  Id INT NOT NULL AUTO_INCREMENT,
  Name VARCHAR(255) NOT NULL,
  StartDate DATETIME NOT NULL, 
  EndDate DATETIME NOT NULL, 
  Description VARCHAR(1000) NOT NULL, 
  Location VARCHAR(1000) NULL, 
  PRIMARY KEY(Id)
);

CREATE TABLE security_types  (
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(255) NOT NULL,
    Description VARCHAR(1000) NULL,
    PRIMARY KEY(Id)
);

CREATE TABLE users (
    Id INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(11) NOT NULL,
    school_id INT NULL,
    Grade VARCHAR(200) NULL,
    ParentFirstName VARCHAR(255) NULL,
    ParentLastName VARCHAR(255) NULL,
    ParentPhoneNumber VARCHAR(255) NULL,
    ParentEmail VARCHAR(500) NULL,
    security_type_id INT NULL,
    Email VARCHAR(500) NOT NULL,
    Password VARCHAR(100) NOT NULL,
    AltPhoneNumber VARCHAR(11) NULL,
    Position VARCHAR(255) NULL,
    City VARCHAR(255) NULL,
    State VARCHAR(255) NULL,
    Address1 VARCHAR(255) NULL,
    Address2 VARCHAR(255) NULL,
    Zip VARCHAR(11) NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (school_id) REFERENCES schools(Id),
    FOREIGN KEY (security_type_id) REFERENCES security_types(Id)
);

CREATE TABLE studentForms (
    student_id INT NOT NULL,
    form_id INT NOT NULL,
    status_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(Id),
    FOREIGN KEY (form_id) REFERENCES forms(Id),
    FOREIGN KEY (status_id) REFERENCES status(Id)
);

CREATE TABLE studentProjects (
    student_id INT NOT NULL,
    project_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(Id),
    FOREIGN KEY (project_id) REFERENCES projects(Id)
);

CREATE TABLE sponsorStudents (
    student_id INT NOT NULL,
    teacher_id INT NOT NULL,
    FOREIGN KEY (student_id) REFERENCES users(Id),
    FOREIGN KEY (teacher_id) REFERENCES users(Id) 
);

CREATE USER msef_app_id@localhost IDENTIFIED BY 'MetroOmahaScienceFair';
GRANT SELECT,UPDATE,DELETE,EXECUTE ON MSEF.* TO 'msef_app_id';
