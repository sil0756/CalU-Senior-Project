
DROP DATABASE 
IF EXISTS bronco;

DROP TABLE 
IF EXISTS bronco.phonebook;

DROP TABLE 
IF EXISTS bronco.inventory;

DROP TABLE 
IF EXISTS bronco.projects;

DROP TABLE 
IF EXISTS bronco.workcompleted;

CREATE DATABASE bronco;
USE bronco; 
  
                 CREATE TABLE phonebook 
                 ( 
                              contactid     INT auto_increment, 
                              firstname     VARCHAR(60), 
                              lastname      VARCHAR(60), 
                              businessname  VARCHAR(60), 
                              addr1         VARCHAR(60), 
                              addr2         VARCHAR(60) DEFAULT NULL, 
                              city          VARCHAR(40), 
                              state         VARCHAR(2), 
                              zipcode       VARCHAR(10), 
                              emailaddress  VARCHAR(255), 
                              mobilephone   VARCHAR(12), 
                              homephone     VARCHAR(12), 
                              businessphone VARCHAR(12), 
                              PRIMARY KEY (contactid), 
                              UNIQUE INDEX emailaddress (emailaddress) 
                 );
                 
                 CREATE TABLE inventory 
                 ( 
                              invid      INT auto_increment, 
                              projectid  INT, 
                              itemname   VARCHAR(60), 
                              itemdesc   VARCHAR(255), 
                              comments   VARCHAR(255), 
                              purchprice DECIMAL(10,2), 
                              purchdate  DATETIME, 
                              sellprice  DECIMAL(10,2), 
                              selldate   DATETIME, 
                              quantity   INT, 
                              PRIMARY KEY (invid), 
                              INDEX invid (invid), 
                              INDEX projectid (projectid) 
                 );
                 
                 CREATE TABLE projects 
                 ( 
                              projectid       INT auto_increment, 
                              projectname     VARCHAR(60), 
                              projectdesc     VARCHAR(255), 
                              projectcomments VARCHAR(255), 
                              purchprice      DECIMAL(10,2), 
                              purchdate       DATETIME, 
                              sellprice       DECIMAL(10,2), 
                              selldate        DATETIME, 
                              PRIMARY KEY (projectid), 
                              INDEX projectid (projectid)
                 );
                 
                 CREATE TABLE workcompleted 
                 ( 
                              workid        INT auto_increment, 
                              projectid     INT, 
                              workname      VARCHAR(60), 
                              workdesc      VARCHAR(255), 
                              workcomments  VARCHAR(255), 
                              dateperformed DATETIME, 
                              PRIMARY KEY (workid) 
                 );
                 
                 CREATE TABLE files 
                 ( 
                              fileid    INT auto_increment, 
                              projectid INT, 
                              filename  VARCHAR(60), 
                              filetype  VARCHAR(60), 
                              dateadded DATETIME, 
                              PRIMARY KEY (fileid) 
                 ); 
     



INSERT INTO phonebook (contactID, firstname,lastname,businessname,addr1,addr2,city,state,zipcode,emailaddress,mobilephone,homephone,businessphone) 
VALUES (1,'Mitch','Zink',NULL,'105 Ashberry Dr',NULL,'Pittsburgh','PA','16066','zink@zink.com','4129183827',NULL,NULL);

INSERT INTO inventory (invid, projectid,itemname,itemdesc,comments,purchprice,purchdate,sellprice,selldate,quantity) 
VALUES (1,1,'muffler','made by flowmaster','it was new and is going to be used later this year','500.00','2019-03-14',NULL,NULL,1);

INSERT INTO projects (projectid,projectname,projectdesc,projectcomments,purchprice,purchdate,sellprice,selldate) 
VALUES (1,'Bronco','1977 Ford Bronco','Overall in good condition. Needs new bumper and seats.','67200.00','2019-03-14',NULL,NULL);

INSERT INTO workcompleted (workid,projectid,workname,workdesc,workcomments,dateperformed) 
VALUES (1,1,'Oil change','Used 5W-20 ','Completed','2019-03-14');