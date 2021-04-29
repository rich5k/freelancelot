<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    <div class="form-container">
        <div class="form-image">
            <img src="../assets/signpic1.jpg" alt="">
        </div>
        <div class="form-contents">
            <img src="#" alt="">
            <h1>Fill in details for your CV</h1>
            <!-- form for logining in -->
            <form action="../controller/login.php" method="post">
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
                <input class="lecturer-check" type="radio" name="category" id="lecturer-check" value="lecturer">
                <label class="lecturer-check" for="lecturer-check">
                    Lecturer
                </label>
                </div>
                <div class="form-check">
                <input class="registry-check" type="radio" name="category" id="registry-check" value="registry">
                <label class="registry-check" for="registry-check">
                    Registry
                </label>
                </div>
                <span id="saving"></span>
                <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                </form>
    
        </div>
    </div>
    <footer>
        <p>Made by KAQA &copy; 2021. All rights reserved.</p>         
    </footer>
    <!-- <script src="../js/signIn.js"></script> -->
</body>
</html>