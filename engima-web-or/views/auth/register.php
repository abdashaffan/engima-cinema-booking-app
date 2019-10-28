<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
        <script src="main.js"></script>
        <script src="assets/js/register.js"></script>
    </head>
    <body>
        <form action="/register" method="post" id="login-box">
            <div class="container">
                <h2 id="title"> Welcome to <b>Engi</h2>
                <div class="container">
                    <label for="username" class="label"><b>Username</b></label><br/>
                    <input type="text" placeholder="username" class="form-input" name="username" oninput="checkUniqueUsername()" required>
                    <p id="usernameMessage" class="error-message"></p>
                </div>
                <div class="container">        
                    <label for="email" class="label"><b>Email</b></label><br/>
                    <input type="email" class="form-input" placeholder="joe@email.com" name = "email" oninput="checkUniqueEmail()"required>
                    <p id="emailMessage" class="error-message"></p>
                </div>
                <div class="container">
                    <label for="phoneNumber" class="label"><b>Phone Number</b></label><br/>
                    <input type="text" class="form-input" name="phoneNumber" placeholder="0812xxxxx" oninput="checkUniquePhone()" required>
                    <span id="phoneNumberMessage"></span>
                </div>
                <div class="container">        
                    <label for="password" class="label"><b>Password</b></label><br/>
                    <input type="password" class="form-input" placeholder="make as strong as possible" name="password" oninput="checkPassword()" required>
                </div>
                <div class="container">        
                    <label for="password-confirm" class="label"><b>Confirm Password</b></label><br/>
                    <input type="password" class="form-input" placeholder="same as above" name="confirm-password" oninput="checkPassword()"required>
                </div>        
                <div class="container">
                    <label for="fileToUpload" class="label"><b>Upload</b></label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <button type="submit" id="submit-button" onsubmit="checkSubmission()">Login</button><br/>
                <p>Already have an account? <a href="login">Login here</a></p>
            </div>
        </form>    
    </body>
</html>