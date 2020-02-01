DROP DATABASE IF EXISTS bronco;
CREATE DATABASE bronco;
USE bronco; 
  
CREATE TABLE phonebook 
( 
    phoneid      INT             NOT NULL    auto_increment, 
    firstname    VARCHAR(60)     NOT NULL, 
    lastname     VARCHAR(60)     NOT NULL, 
    business     VARCHAR(60)     NOT NULL, 
    addr1        VARCHAR(60)     NOT NULL, 
    addr2        VARCHAR(60)                 DEFAULT NULL, 
    city         VARCHAR(40)     NOT NULL, 
    state        VARCHAR(2)      NOT NULL, 
    zip          VARCHAR(10)     NOT NULL, 
    emailaddress VARCHAR(255)    NOT NULL, 
    phonenumber  VARCHAR(12)     NOT NULL, 
    PRIMARY KEY (phoneid), 
    UNIQUE INDEX emailaddress (emailaddress) 
);

CREATE TABLE parts 
( 
    partid      INT             NOT NULL    auto_increment, 
    itemname    VARCHAR(60)     NOT NULL, 
    itemdesc    VARCHAR(255)    NOT NULL, 
    quantity    INT             NOT NULL, 
    PRIMARY KEY (partid) 
);

CREATE TABLE transaction
(
    transid      INT             NOT NULL    auto_increment,
    phoneid      INT             NOT NULL,
    partid       INT             NOT NULL,
    date         DATETIME        NOT NULL,
    price        DECIMAL(10,2)   NOT NULL,
    transtype    VARCHAR(10)     NOT NULL,
    quantity     INT             NOT NULL,
    PRIMARY KEY (transid),
    INDEX phoneid (phoneid),
    INDEX partid (partid)
    /*FOREIGN KEY (phoneid) REFERENCES phonebook (phoneid),
    FOREIGN KEY (partid) REFERENCES parts (partid)*/
);

CREATE TABLE projects 
( 
    projectid       INT           NOT NULL    auto_increment, 
    projectname     VARCHAR(60)   NOT NULL, 
    make            VARCHAR(60)   NOT NULL,
    model           VARCHAR(60)   NOT NULL,
    trim_pkg        VARCHAR(60)   NOT NULL       
    projectdesc     VARCHAR(255)  NOT NULL, 
    purchprice      DECIMAL(10,2) NOT NULL, 
    purchdate       DATETIME      NOT NULL, 
    sellprice       DECIMAL(10,2) NOT NULL, 
    selldate        DATETIME,     NOT NULL
    projectcomments VARCHAR(255),
    PRIMARY KEY (projectid), 
    UNIQUE INDEX (projectname),
    INDEX projectid (projectid)
);

CREATE TABLE project_parts
(
    partid      INT             NOT NULL,
    projectid   INT             NOT NULL,
    PRIMARY KEY (partid, projectid),
    INDEX partid (partid),
    INDEX projectid (projectid)
    /*FOREIGN KEY (partid) REFERENCES parts (partid),
    FOREIGN KEY (projectid) REFERENCES projects (projectid)*/  
);
                 
CREATE TABLE workcompleted 
( 
    workid          INT           NOT NULL   auto_increment, 
    projectid       INT           NOT NULL, 
    workname        VARCHAR(60)   NOT NULL, 
    dateperformed   DATETIME      NOT NULL,
    workdesc        VARCHAR(255)  NOT NULL, 
    workcomments    VARCHAR(255), 
    PRIMARY KEY (workid),
    INDEX projectid (projectid)
    /*FOREIGN KEY (projectid) REFERENCES projects (projectid)*/ 
);
                 
CREATE TABLE files 
( 
    fileid          INT            NOT NULL   auto_increment, 
    projectid       INT            NOT NULL, 
    filename        VARCHAR(60)    NOT NULL, 
    filetype        VARCHAR(60)    NOT NULL, 
    dateadded       DATETIME       NOT NULL, 
    PRIMARY KEY (fileid),
    INDEX projectid (projectid)
    /* FOREIGN KEY (projectid) REFERENCES projects (projectid)*/
); 

CREATE TABLE users
(
    userid          INT            NOT NULL     auto_increment,
    username        VARCHAR(20)    NOT NULL,
    password        VARCHAR(20)    NOT NULL,
    PRIMARY KEY (userid),
    UNIQUE INDEX (username),
    UNIQUE INDEX (password) 
);

     



INSERT INTO phonebook (contactID, firstname,lastname,businessname,addr1,addr2,city,state,zipcode,emailaddress,mobilephone,homephone,businessphone) 
VALUES (1,'Mitch','Zink',NULL,'105 Ashberry Dr',NULL,'Pittsburgh','PA','16066','zink@zink.com','4129183827',NULL,NULL);

INSERT INTO inventory (invid, projectid,itemname,itemdesc,comments,purchprice,purchdate,sellprice,selldate,quantity) 
VALUES (1,1,'muffler','made by flowmaster','it was new and is going to be used later this year','500.00','2019-03-14',NULL,NULL,1);

INSERT INTO projects (projectid,projectname,projectdesc,projectcomments,purchprice,purchdate,sellprice,selldate) 
VALUES (1,'Bronco','1977 Ford Bronco','Overall in good condition. Needs new bumper and seats.','67200.00','2019-03-14',NULL,NULL);

INSERT INTO workcompleted (workid,projectid,workname,workdesc,workcomments,dateperformed) 
VALUES (1,1,'Oil change','Used 5W-20 ','Completed','2019-03-14');