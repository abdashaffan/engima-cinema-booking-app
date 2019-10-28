<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    </head>
    <body>
        <form action="" method="post" id="login-box">
            <div class="container">
                <h2 id="title"> Welcome to Engi</h1>
                <div class="container">
                    <label for="username" class="label"><b>Username</b></label><br/>
                    <input type="text" placeholder="username" class="form-input" name="username" required>
                </div>
                <div class="container">        
                    <label for="password" class="label"><b>Password</b></label><br/>
                    <input type="password" class="form-input" placeholder="password" name="password" required>
                </div>
                <button type="submit" id="submit-button">Login</button><br/>
                <p>Don't have an account ? <a href="register">Register here</a></p>
            </div>
        </form>
    </body>
</html>