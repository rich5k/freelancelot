<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/singup.css">
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
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                    <span id= "emailError" class="text-danger font-weight-bold"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
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
                    Organization
                </label>
                </div>
                
                <span id="saving"></span>

                <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                </form>
                    <!-- redirect customer to sign up page -->
                <h5><em>New User?</em> <button type="submit" class="btn btn-secondary" onclick="window.location.href='sign_up.php';">Sign Up Here</button></h5>
            </form>
    
        </div>
    </div>
    <footer>
        <p>Made by KAQA &copy; 2021. All rights reserved.</p>         
    </footer>
    <!-- <script src="../js/signIn.js"></script> -->
</body>
</html>