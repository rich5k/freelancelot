create database freelancelotDB;

use freelancelotDB;

create table students(
studentID int not null primary key auto_increment,
fname varchar(255) not null,
lname varchar(255) not null, 
email varchar(50) not null,
password varchar(255) not null
);

create table student_bios(
stud_bioID int not null primary key auto_increment,
studentID int not null,
bio text(65535) not null, 
major varchar(255) not null,
university varchar(255) not null,
picture varchar(255) not null,
foreign key (studentID) references students(studentID)
);

create table organizations(
organID int not null primary key auto_increment,
cname varchar(255) not null, 
email varchar(50) not null,
password varchar(255) not null
);

create table organ_infos(
organ_infoID int not null primary key auto_increment,
organID int not null,
companyInfo text(65535) not null, 
clocation varchar(255) not null,
cwebsite varchar(255) not null,
picture varchar(255) not null,
foreign key (organID) references organizations(organID)
);

create table projects(
projectID int not null primary key auto_increment,
organID int not null,
ptitle varchar(255) not null, 
pdescription text(65535) not null,
createTime datetime not null,
payStatus varchar(255) not null,
amount float(5,2) not null,
pdifficulty varchar(255) not null,
foreign key (organID) references organizations(organID)
); 

create table organ_projects(
org_projID int not null primary key auto_increment,
organID int not null,
projectID int not null,
reviews varchar(255) not null,
ratings int not null,
foreign key (organID) references organizations(organID),
foreign key (projectID) references projects(projectID)
);


create table stud_projects(
stud_projID int not null primary key auto_increment,
studentID int not null,
projectID int not null,
reviews varchar(255) not null,
ratings int not null,
foreign key (studentID) references students(studentID),
foreign key (projectID) references projects(projectID)
);


create table proj_proposals(
proj_propID int not null primary key auto_increment,
studentID int not null,
projectID int not null,
proposal text(65535) not null,
prop_status varchar(255) not null,
foreign key (studentID) references students(studentID),
foreign key (projectID) references projects(projectID)
);



