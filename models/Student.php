<?php
    class Student{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Student
        public function addStudent($data){
            //Prepare Query
            $this->db->query('insert into Students(fname, lname, email, password) values(:fname, :lname, :email, :password)');

            // Bind Values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets the Student email
        public function getStudentEmail($data){
            //Prepare Query
            $this->db->query('select email from Students where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            if($numRows>0){
                return true;
            }
            else{
                return false;
            }
            
        }

        //gets the Student details
        public function getStudentDetails($data){
            //Prepare Query
            $this->db->query('select * from Students where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //adds student bio
        public function addStudentBio($data){
            //Prepare Query
            $this->db->query('insert into student_bios(studentID, bio, major, university, picture) values(:studentID, :bio, :major, :university, :picture)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':bio', $data['bio']);
            $this->db->bind(':major', $data['major']);
            $this->db->bind(':university', $data['university']);
            $this->db->bind(':picture', $data['picture']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets student bio
        public function getStudentBio($data){
            //Prepare Query
            $this->db->query('select * from student_bios where studentID= :studentID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets majors
        public function getMajors(){
            //Prepare Query
            $this->db->query('select DISTINCT major from student_bios');

            
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds project proposals
        public function addProjProp($data){
            //Prepare Query
            $this->db->query('insert into proj_proposals(studentID, projectID, proposal, prop_status) values(:studentID, :projectID, :proposal, :prop_status)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':proposal', $data['proposal']);
            $this->db->bind(':prop_status', $data['prop_status']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets project proposals
        public function getProjProp($data){
            //Prepare Query
            $this->db->query('select * from proj_proposals where studentID= :studentID and projectID = :projectID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets all project proposals
        public function getAllProp($data){
            //Prepare Query
            $this->db->query('select * from proj_proposals where projectID = :projectID');

            // Bind Values
            $this->db->bind(':projectID', $data['projectID']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }


        //updates project proposal status
        public function updateProjProp($data){
            //Prepare Query
            $this->db->query('update proj_proposals set prop_status = :prop_status where projectID= :projectID and studentID= :studentID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':prop_status', $data['prop_status']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }


        //adds student projects
        public function addStudProj($data){
            //Prepare Query
            $this->db->query('insert into stud_projects(studentID, projectID, reviews, ratings) values(:studentID, :projectID, :reviews, :ratings)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':reviews', $data['reviews']);
            $this->db->bind(':ratings', $data['ratings']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets student projects
        public function getStudProj($data){
            //Prepare Query
            $this->db->query('select * from stud_projects where studentID= :studentID and projectID = :projectID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>