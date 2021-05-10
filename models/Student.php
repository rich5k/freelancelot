<?php
    class Student{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Student
        public function addStudent($data){
            //Prepare Query
            $this->db->query('insert into students(fname, lname, email, password) values(:fname, :lname, :email, :password)');

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
            $this->db->query('select email from students where email = :email');

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
            $this->db->query('select * from students where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets the Student details
        public function getStudentName($data){
            //Prepare Query
            $this->db->query('select fname, lname from students where studentID = :studentID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets all Students
        public function getAllStudents(){
            //Prepare Query
            $this->db->query('select * from students ');

            
            //Execute
            $this->db->execute();
            

            //Fetch All records
            $results=$this->db->resultset();
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

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets student picture
        public function getStudentPicture($data){
            //Prepare Query
            $this->db->query('select picture from student_bios where studentID= :studentID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets majors
        public function getMajors(){
            //Prepare Query
            $this->db->query('select DISTINCT major from student_bios ORDER BY major ASC');

            
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //get student by major and id
        public function getAllStudentsMajor($data){
            //Prepare Query
            $this->db->query('SELECT `students`.* FROM `students`,`student_bios` WHERE student_bios.major = :major and students.studentID = student_bios.studentID');

            // Bind Values
            $this->db->bind(':major', $data['major']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //gets students by names and major
        public function getStudentsSearch($data){
            //Prepare Query
            $sql="";
            if ($data['major']==""){
                if($data['search'] == ""){
                    $sql = 'select * from students';
                    $this->db->query($sql);

                }else{
                    $sql = 'select * from students where (`fname` LIKE :search or `lname` LIKE :search)';
                    
                    $this->db->query($sql);
                    $this->db->bind(':search', $data['search']);
                    
                }
                
            }else{
                if($data['search'] == ""){
                    $sql = 'SELECT `students`.* FROM `students`,`student_bios` WHERE student_bios.major = :major and students.studentID = student_bios.studentID';
                    $this->db->query($sql);
                    $this->db->bind(':major', $data['major']);
                }else{
                    $sql ='SELECT `students`.* FROM `students`,`student_bios` WHERE student_bios.major = :major and students.studentID = student_bios.studentID and (`fname` LIKE :search or `lname` LIKE :search)';
                    $this->db->query($sql);
                    $this->db->bind(':major', $data['major']);
                    $this->db->bind(':search', $data['search']);
                }
               
            }
            // Bind Values
            
            
            
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

            //Fetch One record
            $results=$this->db->single();
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
            

            //Fetch All records
            $results=$this->db->resultset();
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

        //clears project proposals
        public function clearProjProp($data){
            //Prepare Query
            $this->db->query('delete from  proj_proposals where projectID=:projectID and prop_status = "pending"');

            // Bind Values
            
            $this->db->bind(':projectID', $data['projectID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        //delete project proposal
        public function deleteProjProp($data){
            //Prepare Query
            $this->db->query('delete from  proj_proposals where projectID=:projectID and studentID = :studentID');

            // Bind Values
            
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':projectID', $data['projectID']);

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