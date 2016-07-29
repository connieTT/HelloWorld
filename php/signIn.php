<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign In</title>
        <link rel="stylesheet" href="../css/appStyles.css" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
    </head>
    
<body>

    <div id="signIn">
        <form id="signInForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset>
                <legend>SIGN IN</legend>
                    <p id="message"></p>
                   <p>Email or Username</p>
                   <input type="text" name="emailormember"> <br>
                   <p>Password</p>
                   <input type="password" name="password"> <br>
                   <button type="submit" form="signInForm" name="submit" value="signIn">SIGN IN</button>
                   <hr>
                   <p id="question"> Don't have an account yet?</p>
                   <button type="button" onclick="window.location.href='signUp.php'">SIGN UP</button>
                   
            </fieldset>
        </form>
        <div id="pic"></div>
    </div>
    <div> <?php include '../php/dispatch.php';?> </div>
</body>
</html>