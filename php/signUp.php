<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="../css/appStyles.css" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
    </head>
    
<body>

    <div id="signUp">
        <form id="signUpForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset>
                <legend>SIGN UP</legend>
                   <p>FIRST NAME</p>
                   <input type="text" name="fname"> <br>
                   <p>LAST NAME</p>
                   <input type="text" name="lname"> <br>
                   <p>EMAIL</p>
                   <input type="text" name="email"> <br>
                   <p>USERNAME</p>
                   <input type="text" name="membername"> <br>                   
                   <p>PASSWORD</p>
                   <input type="password" name="password"> <br>
                   <button type="submit" form="signUpForm" name="submit" value="signUp">CREATE ACCOUNT</button>
                   <hr>
                   <p id="question"> Already have account?</p>
                   <button type="button" onclick="window.location.href='signIn.php'">SIGN IN</button>
                   
            </fieldset>
        </form>
        <div id="pic"></div>
    </div>
    <div> <?php include '../php/dispatch.php';?> </div>
</body>
</html>