<?php
    //changes sign up form based on whether it is a company or
    //student
    if(isset($_POST['category'])){
        
        $output ='';
        $category=$_POST["category"];

        //if user is an organization
        if($category=="org"){
            
            $output.='
                <img src="#" alt="">
                <h1>Sign Up To Join The Amazing Community!!!</h1>
                <!-- form for logining in -->
                <form action="../controller/register.php" method="post">
                    <div class="form-group">
                        <label for="cname">Company Name</label>
                        <input type="text" class="form-control" id="cname" name="cname" required>
                        <span id= "cnameError" class="text-danger font-weight-bold"></span>
                    
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span id= "emailError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="pswd">Password</label>
                        <input type="password" class="form-control" id="pswd" name="pswd">
                        <span id= "passwordError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirmPswd">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPswd" name="confirmPswd">
                        <span id= "confirmPasswordError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-check">
                    <input class="student-check" type="radio" name="category" id="student-check" value="student">
                    <label class="student-check" for="student-check">
                        Student
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="org-check" type="radio" name="category" id="org-check" value="org" checked>
                    <label class="org-check" for="org-check">
                        Organization
                    </label>
                    </div>
                    
                    <span id="saving"></span>
                    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                </form>
            ';
            
        }
        //if user is a student
        else{
            
            $output.='
                <img src="#" alt="">
                <h1>Sign Up To Join The Amazing Community!!!</h1>
                <!-- form for logining in -->
                <form action="../controller/register.php" method="post">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                        <span id= "fnameError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" required>
                        <span id= "lnameError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <span id= "emailError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="pswd">Password</label>
                        <input type="password" class="form-control" id="pswd" name="pswd">
                        <span id= "passwordError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirmPswd">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPswd" name="confirmPswd">
                        <span id= "confirmPasswordError" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="form-check">
                    <input class="student-check" type="radio" name="category" id="student-check" value="student" checked>
                    <label class="student-check" for="student-check">
                        Student
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="org-check" type="radio" name="category" id="org-check" value="org" >
                    <label class="org-check" for="org-check">
                        Organization
                    </label>
                    </div>
                    
                    <span id="saving"></span>
                    <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                </form>
            ';
            
        }

        echo $output;
    }
?>