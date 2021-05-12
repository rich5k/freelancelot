<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="form-container">
        <div class="form-image">
            <img src="../assets/signpic2.jpg" alt="">
        </div>
        <div class="form-contents">
            <img src="../assets/logo1.png" alt="">
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
                <input class="org-check" type="radio" name="category" id="org-check" value="org">
                <label class="org-check" for="org-check">
                    Organization
                </label>
                </div>
                
                <span id="saving"></span>
                <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                </form>
    
        </div>
    </div>
    <script>
        $(document).ready(function(){
            
            $(document).on('click','#org-check', function(){
                //gets value from form and passes it to database through ajax
                console.log("org worked");
                var category=$("#org-check").val();
                if(category !='' ){
                    $.ajax({
                        url:'../controller/alterRegister.php',
                        method: 'POST',
                        data: {category: category},
                        success:function(data){
                            $('.form-contents').html(data) ;
                        }
                    });
                }
                else{
                    //if no user role is picked, show alert
                    alert('Pls select user role');
                }
            });

            $(document).on('click', '#student-check',function(){
                //gets value from form and passes it to database through ajax
                console.log("stud worked");
                var category=$("#student-check").val();
                if(category !='' ){
                    $.ajax({
                        url:'../controller/alterRegister.php',
                        method: 'POST',
                        data: {category: category},
                        success:function(data){
                            $('.form-contents').html(data) ;
                        }
                    });
                }
                else{
                    //if no user role is picked, show alert
                    alert('Pls select user role');
                }
            });
        });
    </script>
    <footer>
        <p>Made by KAQA &copy; 2021. All rights reserved.</p>         
    </footer>
    <!-- <script src="../js/signIn.js"></script> -->
    
</body>
</html>