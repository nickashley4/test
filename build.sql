CREATE TABLE patented_products(
  productID int NOT NULL AUTO_INCREMENT,
  projectSummary varchar(800),
  PRIMARY KEY (productID)
)ENGINE = innodb;

CREATE TABLE contact(
  contactID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fname varchar(20),
  lname varchar(20)
)ENGINE = innodb;

CREATE TABLE conversation(
  conversationID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  conversationName varchar(50)
)ENGINE = innodb;

CREATE TABLE group_member(
  joinedDateTime timestamp,
  leftDateTime timestamp,
  conversation_id INT,
  userID INT,
  FOREIGN KEY (conversation_id) REFERENCES group_chat(conversationID),
  FOREIGN KEY (userID) REFERENCES user(userID)
)ENGINE = innodb;

CREATE TABLE comment_section(
conversationID int NOT NULL,
postID int NOT NULL,
PRIMARY KEY (conversationID),
FOREIGN KEY (postID)
) ENGINE = innodb;

CREATE TABLE user (
userID INT auto_increment NOT NULL,
fname VARCHAR(30) NOT NULL,
lname VARCHAR(30) NOT NULL,
address VARCHAR(50),
phone VARCHAR(15),
school VARCHAR(50),
about VARCHAR(300),
PRIMARY KEY (userID)
) ENGINE = innodb;

CREATE TABLE school (
schoolID INT auto_increment NOT NULL,
schoolName VARCHAR(50) NOT NULL,
address VARCHAR(50),
products VARCHAR(50),
about VARCHAR(2000),
PRIMARY KEY (schoolID)
) ENGINE = innodb;

CREATE TABLE medicine (
medID INT NOT NULL,
hospitalName VARCHAR(50),
specialization VARCHAR(30),
medicineTypes VARCHAR(100),
PRIMARY KEY (medID)
) ENGINE=innodb;

CREATE TABLE law (
lawID INT NOT NULL,
firmName VARCHAR(50),
specialization VARCHAR(50),
PRIMARY KEY (lawID)
) ENGINE=innodb;

CREATE TABLE business (
busID INT NOT NULL,
specialization VARCHAR(30),
businessTypes VARCHAR(100),
PRIMARY KEY (busID)
) ENGINE=innodb;

CREATE TABLE engineer (
engID INT NOT NULL,
jobName VARCHAR(50),
specialization VARCHAR(30),
productTypes VARCHAR(100),
PRIMARY KEY (engID)
) ENGINE=innodb;

CREATE TABLE event (
eventID int NOT NULL AUTO_INCREMENT,
eventName varchar(255),
eventDescription varchar(1000),
eventLocation varchar(255),
eventDatetime smalldatetime,
eventCategory varchar(255),
PRIMARY KEY (eventID)
)ENGINE=innodb;

CREATE TABLE news_article (
articleID int NOT NULL AUTO_INCREMENT,
articleName varchar(255),
articleLink mediumtext,
articleCaption varchar(1000),
PRIMARY KEY (articleID)
)ENGINE = innodb;

CREATE TABLE post(
postID int NOT NULL AUTO_INCREMENT,
title varchar(255),
caption varchar(255),
likes int,
userID int NOT NULL,
PRIMARY KEY (postID)
FOREIGN KEY (userID)
)ENGINE=innodb;

CREATE TABLE notifications (
notificationID INT auto_increment,
userID INT NOT NULL,
name VARCHAR(30) NOT NULL,
notificationTime TIME,
status BOOLEAN,
PRIMARY KEY (notificationID)
) ENGINE = innodb;

CREATE TABLE message (
messageID INT NOT NULL AUTO_INCREMENT,
from_user int NOT NULL,
conversationID int NOT NULL,
messageDateTime DATETIME,
messageText,
PRIMARY KEY (chatID)
FOREIGN KEY (from_user),
FOREIGN KEY (conversationID)
) ENGINE = innodb;

CREATE TABLE project (
projectID INT NOT NULL AUTO_INCREMENT,
projectName varchar(100),
projectCategory varchar(255),
topic varchar(100),
teamSize int,
projectDescription varchar(1200),
searchingFor varchar(300)
userID INT NOT NULL,
PRIMARY KEY (projectID)
) ENGINE=innodb;

CREATE TABLE group_chat (
conversationID INT NOT NULL,
chatName varchar (100),
PRIMARY KEY (conversationID)
)ENGINE = innodb;



INSERT INTO conversation(conversationID, conversationName)
VALUES(333, "networking group"),
VALUES(334, "new idea group"),
VALUES(335, "medical patent project"),
VALUES(336, "research group"),
VALUES(337, "sports medicine research"),
VALUES(338, "Looking for legal help"),
VALUES(339, "Looking for engineering professionals"),
VALUES(340, "Looking for a business strategist"),
VALUES(341, "Searching for help on my idea"),
VALUES(342, "Setting up a meeting with law student"),
VALUES(343, "Looking to get to know medical student");

INSERT INTO contact(contactID, fname, lname)
VALUES(10, "Jack", "Kassenbrock"),
VALUES(11, "Max", "Weybright"),
VALUES(12, "Jack", "Calvert"),
VALUES(13, "Wyatt", "Harrell"),
VALUES(14, "Nick", "Ashley"),
VALUES(15, "Mike", "Hunter"),
VALUES(16, "Taylor", "Swift"),
VALUES(17, "Kevin", "Hart"),
VALUES(18, "Steve", "Smith"),
VALUES(19, "Michael", "Freeman"),
VALUES(20, "Jackson", "West");

INSERT INTO group_member(contactID, conversationID)
VALUES(10, 333),
VALUES(11, 333),
VALUES(12, 334),
VALUES(13, 334),
VALUES(14, 335),
VALUES(15, 335),
VALUES(16, 338),
VALUES(17, 338),
VALUES(18, 339),
VALUES(19, 339),
VALUES(20, 339);

INSERT INTO user (userID, fname, lname, address, phone, school, about) VALUES
(1000, 'John', 'Bravo', '222 W Grant St', '8123235758', 'Indiana University', 'Final year in law school, looking to help students with patenting.'),
(1001, 'Mike', 'Hunter', '5950 N Walnut St', '2195453457', 'Indiana University', 'Tech student looking to help manufacture and market new products.'),
(1002, 'Nate', 'Leach', '49 E 10th St', '7725432427', 'Indiana University', 'Engineer student in my final year of school. Trying to find people to help distribute my product.'),
(1003, 'Jack', 'Kassen', '375 W 14th St', '8635453424', 'South Carolina University', 'Junior in college, studying engineering.'),
(1004, 'Noah', 'Warren', '23 S Walnut St', '8123143124', 'Butler University', 'Senior trying to find a way to build the most effect medical product.'),
(1005, 'Todd', 'Peterson', '5468 W Terrace Ln', '3178904783', 'Ivy Tech', 'Engineer looking to try and get help with my productI am developing.'),
(1006, 'Mary', 'John', '29 Condit St', '2192284546', 'Arizona State University', 'Law student trying to help people protect their products.'),
(1007, 'Nick', 'Ash', '350 S High St', '8173284567', 'Michigan University', 'Senior medical student with a solid idea for a product.'),
(1008, 'John', 'Westen', '9734 N Mats Dr', '2052139896', 'Purdue University', 'Junior medical student, trying to work with engineers to build a product. '),
(1009, 'Alice', 'Smith', '570 W Place Ln', '2198121999', 'IndianaUniversity Northwest', 'University student with the goal of working with a medical student to build my idea.');

INSERT INTO school (schoolID, schoolName, address, products, about) VALUES
(10500, 'Indiana University', '107 S Indiana Ave', 'Sensor system, Malware', 'Founded in 1820, Indiana University Bloomington is the flagship campus of IUs most 
innovative school, Arizona State University is where students and faculty work with NASA to develop, advance and lead innovations in space exploration.'),
(10900, 'Butler University', '4600 Sunset Ave', 'Water Operated Engine', 'Butler University, founded on ideals of equity and academic excellence, creates and fosters 
a collaborative, stimulating intellectual learning environment. We are inspired toboldly innovate and broadly educate, enriching communities and preparing all learners to lead meaningful lives.'),
(11000, 'South Carolina University', '1244 Blossom Street', 'Medical Brace', 'Since 1896, South Carolina State University has maintained a legacy of excellence in education. We have been home
to generations of scholars and leaders in business, military service, government, athletics, education, medicine, science, engineering technology and more.'),
(11100, 'Ivy Tech', '200 Daniels Way', 'Data Center, AI system, Extended Breathing Tank', 'Ivy Tech is the number 1 largest 
singly-accredited community college in the country.');

INSERT INTO medicine (medID, hospitalName, specialization, medicineTypes) VALUES
(1004, 'St. Margarets', 'Dermatology', 'Capsules, Injections, Suppositories'),
(1007, 'Indiana University Hospital', 'Neurology', 'Implants, tablets, Liquid'),
(1008, 'St. Marys', 'Radiation Oncology', 'Inhalers, Implants, topical');

INSERT INTO law (lawID, firmName, specialization) VALUES
(1000, 'Kenn Nunn Law Firm', 'Medicine'),
(1006, 'Alliance Law Group', 'Business');

INSERT INTO business (busID, specialization, businessTypes) VALUES
(1001, 'Management', 'Partnership'),
(1009, 'Marketing', 'Partnership');

INSERT INTO engineer (engID, jobName, specialization, productTypes) VALUES
(1002, 'Patriot Engineering','Electrical Engineer', 'Multipurpose Light Fixtures'),
(1003, 'AZTEC Engineering Group', 'Mechanical Engineer', 'Fixed Sensor System'),
(1005, 'Yates Engineering Services', 'Chemical Engineer', 'Pharmacueticals, Biotechnology, Syntheti Fibers');

INSERT INTO project VALUES (10000, 1000);

INSERT INTO event (eventID, userID, eventName, eventDescription, eventLocation, event_datetime, eventCategory) VALUES 
('1001', 'Meeting with Nate Leach', 'Meeting to discuss potential patent.', 'Zoom meeting', '2023-02-10 10:30:00', 'Meeting'),
('1002', 'Lunch with Bob Jones', 'Lunch to discuss new innovations.', 'Trojan Horse', '2023-01-28 12:30:00', 'Meeting'),
('1003', 'Innovators conference', 'Conference where creative minds meet to discuss new ideas.', 'Monroe Convention Center', '2023-02-04 12:00:00', 'Conference');

INSERT INTO news_article (articleID, articleName, articleLink, articleCaption, articlePhoto) VALUES 
('10001', '3 of the best home blood pressure monitors: How to use, what to look for, and more', 'https://www.medicalnewstoday.com/articles/281067#_noHeaderPrefixedContent', 'Best Home Blood Pressure Monitors', ' '),
('10002', 'Telemedicine: What to know', 'https://www.medicalnewstoday.com/articles/telemedicine', 'Telemedicine: What to Know', ' '),
('10003', 'What are genes and why are they important?', 'https://www.medicalnewstoday.com/articles/120574', 'Importance of Genes',' ');

INSERT INTO post (postID, title, postPhoto, caption, likes) VALUES 
('50001', 'New Invention', ' ', 'Look at my new invention! Thank you to everyone who helped in the process!', '6'),
('50002', 'Looking for lawyers', ' ', 'I am looking for patent lawyers to talk with me about my idea for an invention.', '3'),
('50003', 'Any Engineers?', ' ', 'I am looking for an engineer to help me design my idea.', '9');

INSERT INTO notifications (notificationID, userID, name, notificationTime, status) VALUES
(15000, 1003, 'New Request', '04:45:44', TRUE),
(15001, 1009, 'New Comment', '07:25:44', FALSE),
(15002, 1004, 'New Request', '02:20:44', FALSE),
(15003, 1007, 'New Message', '01:40:44', TRUE),
(15004, 1002, 'New Message', '09:13:44', TRUE);

INSERT INTO message (messageID, from_user, conversationID, messageText) VALUES 
('6000', '1000', '333', 'Example message text'),
('6001', '1006', '333', 'This is an example message that is 
supposed to be longer in order to see how it looks for the UI. 
Team 48 is currently at Wells Library and we are having a great 
time figuring out the database build.'),
('6002', '1007', '336', 'COMMENT EXAMPLE FOR POST 778');

INSERT INTO message(messageID, messageText, conversationID)
VALUES(1000, "here's a message", 333),
VALUES(1001, "testing", 333),
VALUES(1002, "insert text", 333)
VALUES(1003, "nisl nunc mi ipsum faucibus vitae aliquet nec ullamcorper sit amet risus nullam eget felis eget nunc nisl pretium fusce id velit ut tortor pretium", 333)
VALUES(1004, "dictum varius duis at consectetur lorem donec massasapien faucibus", 333)
VALUES(1005, "ornare aenean", 333)
VALUES(1006, "id porta nibh venenatis cras", 333)
VALUES(1007, "ut pharetra sit amet aliquam id diam maecenas", 333)
VALUES(1008, "arcu vitae elementum curabitur vitae nunc sed velit dignissim sodales ut eu", 333)
VALUES(1009, "schedule a meeting", 333)
VALUES(1010, "Meet and greet", 333)
VALUES(1011, "here's another message", 333);

INSERT INTO group_chat VALUES (100,'Best Chat'),(101,'Worst Chat');

INSERT INTO message(from_user, messageText, conversationID) VALUES 
(1006, "here's a message again", 334),
(1007, "here's a message again x2", 334),
(1002, "here's a message again", 334);

INSERT INTO message(from_user, messageText, conversationID) VALUES 
(1004, "here's a message again", 335),
(1003, "here's a message again x2", 335),
(1002, "here's a message again", 335);

INSERT INTO comment_section VALUES (333,777),(336,778);



UPDATE group_chat SET conversationID = 334 WHERE chatName = 'Best
Chat';
UPDATE group_chat SET conversationID = 335 WHERE chatName = 
'Worst Chat';
UPDATE conversation SET convoType = True WHERE conversationID = 
334;
UPDATE conversation SET convoType = True WHERE conversationID = 
335;
UPDATE conversation SET convoType = False WHERE conversationID = 
333;
UPDATE conversation SET convoType = False WHERE conversationID = 
336;
UPDATE conversation SET convoType = True WHERE conversationID = 
337;
UPDATE conversation SET convoType = True WHERE conversationID = 
338;
UPDATE conversation SET convoType = True WHERE conversationID = 
339;
UPDATE conversation SET convoType = False WHERE conversationID = 
340;
UPDATE conversation SET convoType = False WHERE conversationID = 
341;
UPDATE conversation SET convoType = True WHERE conversationID = 
342;
UPDATE conversation SET convoType = False WHERE conversationID = 
343;



DELETE FROM conversation WHERE conversationID = 12345;


ALTER TABLE group_member
ADD  contactID int,
ADD FOREIGN KEY (contactID) REFERENCES contact(contactID);
ALTER TABLE group_member
ADD conversationID int,
ADD FOREIGN KEY (conversationID)REFERENCES 
conversation(conversationID);
ALTER TABLE message
ADD FOREIGN KEY (conversationID) REFERENCES 
conversation(conversationID);

ALTER TABLE user ADD gender VARCHAR(50);
ALTER TABLE user ADD picture VARCHAR(255);
ALTER TABLE user ADD full_name VARCHAR(100);
ALTER TABLE user ADD verifiedEmail INT;
ALTER TABLE user ADD token VARCHAR(255);
ALTER TABLE user ADD field VARCHAR(50);


SELECT m.*, cs.postID FROM message as m
INNER JOIN comment_section as cs
ON m.conversationID = cs.conversationID
WHERE cs.postID = 778;

SELECT m.*, gc.* from message as m
INNER JOIN group_chat as gc
ON m.conversationID = gc.conversationID
WHERE gc.conversationID = 334;

UPDATE user SET email = 'test@gmail.com' WHERE userID = 1000;

UPDATE user SET field = 'Medicine' WHERE userID = 1000;
UPDATE user SET field = 'Business' WHERE userID = 1001;
UPDATE user SET field = 'Engineer' WHERE userID = 1002;
UPDATE user SET field = 'Engineer' WHERE userID = 1003;
UPDATE user SET field = 'Engineer' WHERE userID = 1004;
UPDATE user SET field = 'Engineer' WHERE userID = 1005;
UPDATE user SET field = 'Law' WHERE userID = 1006;
UPDATE user SET field = 'Medicine' WHERE userID = 1007;
UPDATE user SET field = 'Medicine' WHERE userID = 1008;
UPDATE user SET field = 'Engineer' WHERE userID = 1009;

ALTER TABLE user ADD schoolID int, ADD FOREIGN KEY (schoolID) REFERENCES school(schoolID); 
UPDATE user, school SET user.schoolID = school.schoolID WHERE user.school = school.schoolName;
INSERT INTO school VALUES (11200, 'Indiana University Northwest', '3400 Broadway', 'Arm Cast, Neck Brace', 'Indiana University Northwest is a public university and regional campus of Indiana University established in 1963.');


SELECT u.school, c.* FROM user AS u
JOIN contact AS c
ON c.userID = u.userID
WHERE u.userID = 1000;