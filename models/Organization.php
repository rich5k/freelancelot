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

        //gets the Organization name
        public function getOrgName($data){
            //Prepare Query
            $this->db->query('select cname from organizations where organID = :organID');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);
           

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

        //adds payments
        public function addPayments($data){
            //Prepare Query
            $this->db->query('insert into payments(studentID, projectID, organID, acctDetails, amount) values(:studentID, :projectID, :organID, :acctDetails, :amount)');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':organID', $data['organID']);
            $this->db->bind(':acctDetails', $data['acctDetails']);
            $this->db->bind(':amount', $data['amount']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets payments
        public function getPayments($data){
            //Prepare Query
            $this->db->query('select * from payments where studentID= :studentID and projectID= :projectID and organID= :organID');

            // Bind Values
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':projectID', $data['projectID']);
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
            $this->db->query('select * from projects where workStatus="pending" ORDER BY createTime DESC');

            

            //Execute
            $this->db->execute();
            

           //Fetch All records
           $results=$this->db->resultset();
           return $results;
            
        }

        //gets Pending projects
        public function getPendingProjects($data){
            //Prepare Query
            $this->db->query('select * from projects where organID= :organID and workStatus="pending" ORDER BY createTime DESC');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);

            //Execute
            $this->db->execute();
            

           //Fetch All records
           $results=$this->db->resultset();
           return $results;
            
        }

        //gets Ongoing projects
        public function getOngoingProjects($data){
            //Prepare Query
            $this->db->query('select * from projects where organID= :organID and workStatus="ongoing" ORDER BY createTime DESC');

            // Bind Values
            $this->db->bind(':organID', $data['organID']);

            //Execute
            $this->db->execute();
            

           //Fetch All records
           $results=$this->db->resultset();
           return $results;
            
        }

        //gets accepted proposals
        public function getAcceptedProp($data){
            //Prepare Query
            $this->db->query('select * from proj_proposals where projectID = :projectID');

            // Bind Values
            $this->db->bind(':projectID', $data['projectID']);
           

            //Execute
            $this->db->execute();
            

            //Fetch All records
            $results=$this->db->single();
            return $results;
            
        }

        //updates project proposal status
        public function updateProjStatus($data){
            //Prepare Query
            $this->db->query('update projects set workStatus = :workStatus where projectID= :projectID ');

            // Bind Values
            
            $this->db->bind(':projectID', $data['projectID']);
            $this->db->bind(':workStatus', $data['workStatus']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
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
        $results=$this->db->single();
        return $results;
        
    }

    
    //gets all organization projects
    public function getAllOrgProj($data){
        //Prepare Query
        $this->db->query('select * from organ_projects where organID= :organID ORDER BY org_projID DESC');

        // Bind Values
        $this->db->bind(':organID', $data['organID']);
        

        //Fetch All records
        $results=$this->db->resultset();
        return $results;
        
    }

    }
?>