<?php
//Set variables
$servername = "localhost";
$username = "cedrictstallwort";
$password = "";
$dbname = "tongtongZHAO";

// Create connection
$con=mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
  {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  else {
//   	echo "Successfully Connected to MySQL<br/>" ; 
  } 

//If this request came from signUp.php ...
if( $_POST['submit'] == 'signUp'){
    //Set up the query
    $sql = "INSERT INTO members (FNAME, LNAME, EMAIL, USERNAME, PASSWORD)
    VALUES ('" .$_POST['fname']. "','" .$_POST['lname']. "','" .$_POST['email']. "','" .$_POST['username']. "','" .$_POST['password']. "')";

    //Execute query and test
    if (mysqli_query($con, $sql)) {
        $sql = "SELECT ID FROM members WHERE ( (EMAIL='" .$_POST['email']. "') and (PASSWORD='" .$_POST['password']. "') )";
        $row = mysqli_fetch_assoc(mysqli_query($con, $sql));     
        $_SESSION["id"] = $row["ID"];
        $_SESSION["thisPage"] = "membersPage";
        echo "<script> window.location.href='memberPage.php' </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

//If this request came from signIn.php ...
if($_POST['submit']=='signIn'){
    $sql = "SELECT * FROM members WHERE ( (EMAIL='" .$_POST['emailormember']. "') and (PASSWORD='" .$_POST['password']. "') ) or ( (USERNAME ='" .$_POST['emailormember']. "') and (PASSWORD='" .$_POST['password']. "') )";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc( $result );
        $_SESSION["id"] = $row["ID"];
        $_SESSION["thisPage"] = "memberPage";        
        echo "<script> window.location.href='memberPage.php' </script>";
    } else {
        echo "<script>";
        echo "document.getElementById('message').innerText = 'Incorrect Sign In. Please Try Again or Sign Up for an Account.'; ";
        echo "</script>";
    }
}

//If this request came from memberPage.php ...
if($_POST['submit']=='sales'){
    $sql = "INSERT INTO orders (ID, FNAME, LNAME, EMAIL, APT, STREET, CITY, STATE, ZIP, POKE, GREAT, ULTRA, MASTER, LEVEL, PREMIER, TIMER, NUMOFBALLS, TOTAL)
    VALUES ('"  .$_SESSION['id']. "','" 
                .$_POST['fname']. "','"                
                .$_POST['lname']. "','" 
                .$_POST['email']. "','" 
                .$_POST['apt']. "','" 
                .$_POST['street']. "','" 
                .$_POST['city']. "','" 
                .$_POST['state']. "','" 
                .$_POST['zip']. "','" 
                .$_POST['poke']. "','" 
                .$_POST['great']. "','" 
                .$_POST['ultra']. "','" 
                .$_POST['master']. "','"                 
                .$_POST['level']. "','" 
                .$_POST['premier']. "','"
                .$_POST['timer']. "','" 
                .$_POST['numofballs']. "','"                 
                .$_POST['total']. "')";
    
    //Execute query and test
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('DATA ENTERED!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

if($_SESSION['thisPage'] == "memberPage"){
    $sql = "SELECT * FROM members WHERE ( ID='" .$_SESSION['id'].  "')";
    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
    echo "<script>";
    echo "document.getElementById('userName').innerText = 'Welcome back, " . $row["FNAME"] . " " . $row["LNAME"] ."!'";
    echo "</script>";    


// ============= CHARTS ============================== //
    // Get sums of each cookie type sold for this member //
    $types = ["POKE", "GREAT", "ULTRA", "MASTER", "LEVEL", "PREMIER", "TIMER"];
    $sums = [];
    for( $i=0; $i<count($types); $i++){
        $sql = "SELECT SUM(" . $types[$i] . ") AS sum FROM orders WHERE ( ID='" . $_SESSION['id'] . "')" ;
        $sums[$i] = mysqli_fetch_assoc(mysqli_query($con, $sql))['sum'];        
    }

    // Balls sold Chart //
    echo "<script type='text/javascript' src='../js/salesChart.js'></script>";
    echo "<script> chartBallsSold(" . $sums[0] . "," . 
                                     $sums[1] . "," . 
                                     $sums[2] . "," . 
                                     $sums[3] . "," . 
                                     $sums[4] . "," . 
                                     $sums[5] . "," . 
                                     $sums[6] . "); </script>";
}

//Close connection to server
mysqli_close($con);


?>

