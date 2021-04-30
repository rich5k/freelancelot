<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
    <div class="form-container">
        <div class="form-image">
            <img src="../assets/signpic1.jpg" alt="">
        </div>
        <div class="form-contents">
            <img src="#" alt="">
            <h1>Sign In To Join The Amazing Community!!!</h1>
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
                <input class="org-check" type="radio" name="category" id="org-check" value="org">
                <label class="org-check" for="org-check">
                    Organization
                </label>
                </div>
                <br>
                <br>
                <span id="saving"></span>

                <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                </form>
                    <!-- redirect customer to sign up page -->
                <h5><em>New User?</em> <button type="submit" class="btn btn-secondary" onclick="window.location.href='signUp.php';">Sign Up Here</button></h5>
            </form>
    
        </div>
    </div>
    <footer>
        <p>Made by KAQA &copy; 2021. All rights reserved.</p>         
    </footer>
    <!-- <script src="../js/signIn.js"></script> -->
</body>
</html>