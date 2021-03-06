create database freelancelotDB;

use freelancelotDB;
-- table for students
create table students(
studentID int not null primary key auto_increment,
fname varchar(255) not null,
lname varchar(255) not null, 
email varchar(50) not null,
password varchar(255) not null
);
-- table for student bios
create table student_bios(
stud_bioID int not null primary key auto_increment,
studentID int not null,
bio text(65535) not null, 
major varchar(255) not null,
university varchar(255) not null,
picture varchar(255) not null,
foreign key (studentID) references students(studentID)
);
-- table for organizations
create table organizations(
organID int not null primary key auto_increment,
cname varchar(255) not null, 
email varchar(50) not null,
password varchar(255) not null
);
-- table for org. info
create table organ_infos(
organ_infoID int not null primary key auto_increment,
organID int not null,
companyInfo text(65535) not null, 
clocation varchar(255) not null,
cwebsite varchar(255) not null,
picture varchar(255) not null,
foreign key (organID) references organizations(organID)
);
-- table for projects
create table projects(
projectID int not null primary key auto_increment,
organID int not null,
ptitle varchar(255) not null, 
pdescription text(65535) not null,
createTime datetime not null,
payStatus varchar(255) not null,
amount float(9,2) not null,
pdifficulty varchar(255) not null,
workStatus varchar(255) not null,
foreign key (organID) references organizations(organID)
); 
-- table for org. past projects
create table organ_projects(
org_projID int not null primary key auto_increment,
organID int not null,
projectID int not null,
reviews varchar(255) not null,
ratings int not null,
foreign key (organID) references organizations(organID),
foreign key (projectID) references projects(projectID)
);

-- table for student portfolio
create table stud_projects(
stud_projID int not null primary key auto_increment,
studentID int not null,
projectID int not null,
reviews varchar(255) not null,
ratings int not null,
foreign key (studentID) references students(studentID),
foreign key (projectID) references projects(projectID)
);

-- table for project proposals
create table proj_proposals(
proj_propID int not null primary key auto_increment,
studentID int not null,
projectID int not null,
proposal text(65535) not null,
prop_status varchar(255) not null,
foreign key (studentID) references students(studentID),
foreign key (projectID) references projects(projectID)
);

-- table for payments
create table payments(
paymentID int not null primary key auto_increment,
studentID int not null,
projectID int not null,
organID int not null,
acctDetails varchar(255) not null,
amount float(9,2) not null,
foreign key (studentID) references students(studentID),
foreign key (projectID) references projects(projectID),
foreign key (organID) references organizations(organID)
);
