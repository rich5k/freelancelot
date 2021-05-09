<?php
    class Organization{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Organization
        public function addOrganization($data){
            //Prepare Query
            $this->db->query('insert into organizations(cname, email, password) values(:cname, :email, :password)');

            // Bind Values
            $this->db->bind(':cname', $data['cname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets the Organization email
        public function getOrganizationEmail($data){
            //Prepare Query
            $this->db->query('select email from organizations where email = :email');

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

        //gets the Organization details
        public function getOrganizationDetails($data){
            //Prepare Query
            $this->db->query('select * from organizations where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //adds organization info
        public function addOrgInfo($data){
            //Prepare Query
            $this->db->query('insert into organ_infos(organID, companyInfo, clocation, cwebsite, picture) values(:organID, :companyInfo, :clocation, :cwebsite, :picture)');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);
            $this->db->bind(':companyInfo', $data['companyInfo']);
            $this->db->bind(':clocation', $data['clocation']);
            $this->db->bind(':cwebsite', $data['cwebsite']);
            $this->db->bind(':picture', $data['picture']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets organization info
        public function getOrgInfo($data){
            //Prepare Query
            $this->db->query('select * from organ_infos where organID= :organID');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //adds projects
        public function addProjects($data){
            //Prepare Query
            $this->db->query('insert into projects(organID, ptitle, pdescription, createTime, payStatus, amount, pdifficulty, workStatus) values(:organID, :ptitle, :pdescription, :createTime, :payStatus, :amount, :pdifficulty, :workStatus)');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);
            $this->db->bind(':ptitle', $data['ptitle']);
            $this->db->bind(':pdescription', $data['pdescription']);
            $this->db->bind(':createTime', $data['createTime']);
            $this->db->bind(':payStatus', $data['payStatus']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':pdifficulty', $data['pdifficulty']);
            $this->db->bind(':workStatus', $data['workStatus']);
            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets projects
        public function getProjects($data){
            //Prepare Query
            $this->db->query('select * from projects where projectID= :projectID');

            // Bind Values
            $this->db->bind(':projectID', $data['projectID']);

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //gets all projects
        public function getAllProjects(){
            //Prepare Query
            $this->db->query('select * from projects where workStatus="pending" ORDER BY createTime ASC');

            

            //Execute
            $this->db->execute();
            

           //Fetch All records
           $results=$this->db->resultset();
           return $results;
            
        }


       //adds organization projects
       public function addOrgProj($data){
        //Prepare Query
        $this->db->query('insert into organ_projects(organID, projectID, reviews, ratings) values(:organID, :projectID, :reviews, :ratings)');

        // Bind Values
        $this->db->bind(':organID', $data['organID']);
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

    //gets organization projects
    public function getOrgProj($data){
        //Prepare Query
        $this->db->query('select * from organ_projects where organID= :organID and projectID = :projectID');

        // Bind Values
        $this->db->bind(':organID', $data['organID']);
        $this->db->bind(':projectID', $data['projectID']);

        //Fetch All records
        $results=$this->db->resultset();
        return $results;
        
    }

       
    }
?>