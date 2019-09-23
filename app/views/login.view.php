<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <title>Login</title>
    <style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        height: 100vh;
        background: #FFF;
        font-family: 'Lato', sans-serif;

    }

    .login-header {
        margin-bottom: 1.7em;
    }

    #login-card {
        display: flex;
        flex-direction: column;
        justify-content: left;
        align-items: center;
        border: 1px solid #f2f2f2;
        box-shadow: 0 4px 6px #828282;
        padding: 50px 40px;
        border-radius: 6px;
    }

    .login-header {
        font-weight: 400;
        font-size: 1.5em;
        margin: 0px 20px 40px 20px;
    }

    #login-form {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #828282;
    }

    form label {
        font-size: .8em;
        font-weight: 700;
        letter-spacing: 1.1px;
        margin-bottom: -13px;
    }

    .input {
        font-family: inherit;
        border: .5px solid #E0E0E0;
        padding: .5rem 1rem;
        border-radius: 5px;
        color: inherit;
    }

    .btn {
        cursor: pointer;
    }

    .login-btn {
        margin: 1.5em 0em;
        background-color: #2D9CDB;
        letter-spacing: 1.1px;
        font-weight: bold;
        color: #f2f2f2;
        border: none;
        font-family: inherit;
        padding: 1em 4em;
        border-radius: 5px;
    }

    .login-btn:hover {
        background-color: #2F80ED;
    }

    .login-card-footer {
        font-size: .75em;
    }

    .link {
        text-decoration: none;
        font-weight: bold;
        color: #2D9CDB;
    }
    </style>
</head>

<body>
    <div id="login-card">
        <span class="login-header">Welcome to <b>Engi</b>ma!</span>
        <form action="" method="post" id="login-form">
            <label for="email">Email</label><br>
            <input type="email" name="email" required class="input" placeholder="john@doe.com"><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" required class="input" placeholder="Insert password"><br>
            <button type="submit" name="submit" class="btn login-btn">Login</button><br>
        </form>
        <span class="login-card-footer">
            Don't have an account ? <a href="#" class="link">Register here</a>
        </span>
    </div>
</body>

</html>