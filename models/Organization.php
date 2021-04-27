<?php
    class Organization{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Organization
        public function addOrganization($data){
            //Prepare Query
            $this->db->query('insert into Organizations(fname, lname, email, password) values(:fname, :lname, :email, :password)');

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

        //gets the Organization email
        public function getOrganizationEmail($data){
            //Prepare Query
            $this->db->query('select email from Organizations where email = :email');

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
            $this->db->query('select * from Organizations where email = :email');

            // Bind Values
            $this->db->bind(':email', $data['email']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        //adds products to cart
        public function addProductsOrganization($data){
            //Prepare Query
            $this->db->query('insert into products_Organization(productID, OrganizationID, quantity) values(:prodID, :custID, :quantity)');

            // Bind Values
            $this->db->bind(':prodID', $data['prodID']);
            $this->db->bind(':custID', $data['custID']);
            $this->db->bind(':quantity', $data['quantity']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets products in cart
        public function getProductsOrganization($data){
            //Prepare Query
            $this->db->query('select * from products_Organization where OrganizationID= :custID');

            // Bind Values
            $this->db->bind(':custID', $data['custID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //updates the quantity of products in cart
        public function updateQuantity($data){
            //Prepare Query
            $this->db->query('update products_Organization set quantity = :quantity where productID= :prodID and OrganizationID= :custID');

            // Bind Values
            $this->db->bind(':custID', $data['custID']);
            $this->db->bind(':prodID', $data['prodID']);
            $this->db->bind(':quantity', $data['quantity']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
            
        }

        //removes single product from cart
        public function deleteProductsOrganization($data){
            //Prepare Query
            $this->db->query('delete from  products_Organization where productID=:prodID and OrganizationID =:custID');

            // Bind Values
            $this->db->bind(':prodID', $data['prodID']);
            $this->db->bind(':custID', $data['custID']);
            
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //adds orders
        public function addOrder($data){
            //Prepare Query
            $this->db->query('insert into orders(orderTime, OrganizationID) values(:orderTime, :custID)');

            // Bind Values
            $this->db->bind(':orderTime', $data['orderTime']);
            $this->db->bind(':custID', $data['custID']);
        
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets orders
        public function getOrders($data){
            //Prepare Query
            $this->db->query('select * from orders where orderTime= :orderTime and OrganizationID= :custID');

            // Bind Values
            $this->db->bind(':orderTime', $data['orderTime']);
            $this->db->bind(':custID', $data['custID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //adds payment
        public function addPayment($data){
            //Prepare Query
            $this->db->query('insert into payments(accountDetails, OrganizationID, orderID) values(:accountDetails, :custID, :orderID)');

            // Bind Values
            $this->db->bind(':accountDetails', $data['accountDetails']);
            $this->db->bind(':custID', $data['custID']);
            $this->db->bind(':orderID', $data['orderID']);
            

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
            $this->db->query('select * from payments where accountDetails=:accountDetails and OrganizationID= :custID');

            // Bind Values
            $this->db->bind(':accountDetails', $data['accountDetails']);
            $this->db->bind(':custID', $data['custID']);

            //Fetch All records
            $results=$this->db->single();
            return $results;
            
        }

        //removes all products from cart
        public function clearProductsOrganization($data){
            //Prepare Query
            $this->db->query('delete from products_Organization where OrganizationID =:custID');

            // Bind Values
            $this->db->bind(':custID', $data['custID']);
            
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //displays orders
        public function displayOrders($data){
            //Prepare Query
            $this->db->query('select * from orders where OrganizationID= :custID order by orderID desc');

            // Bind Values
            $this->db->bind(':custID', $data['custID']);

            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }

        //displays payments
        public function displayPayments($data){
            //Prepare Query
            $this->db->query('select * from payments where orderID=:orderID and OrganizationID= :custID');

            // Bind Values
            $this->db->bind(':orderID', $data['orderID']);
            $this->db->bind(':custID', $data['custID']);

            //Fetch All records
            $results=$this->db->single();
            return $results;
            
        }

        //filters orders
        public function filterOrders($data){
            //Prepare Query
            $this->db->query('select * from orders where OrganizationID= :custID and orderTime between :fDate and :tDate order by orderID desc');

            // Bind Values
            $this->db->bind(':custID', $data['custID']);
            $this->db->bind(':fDate', $data['fDate']);
            $this->db->bind(':tDate', $data['tDate'].' 23:59:59.999');
            //Fetch All records
            $results=$this->db->resultset();
            return $results;
            
        }
    }
?>