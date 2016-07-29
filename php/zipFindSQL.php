<!DOCTYPE html>
<html>
    <head>
        <title>County Find</title>
        <link rel="stylesheet" href="../css/zipFindStyles.css" type="text/css" />
        <script src="https://maps.google.com/maps/api/js?sensor=false"></script>        
        <script type="text/javascript" src="../js/zipFindScripts.js"></script>
    </head>
<body>
    <div id="call">
        <h1>Call</h1>
        <form id="zipForm" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <!--<p>Enter a ZIP Code and find the US City and State it r..efers to. <input type="text" name="zip"> <input type="submit">-->
            <p>Enter a City <input type="text" name="city"> and a State <input type="text" name="state"> <input type="submit">
            <p>(Data from: <a href="https://www.gaslampmedia.com/download-zip-code-latitude-longitude-city-state-county-csv/"> https://www.gaslampmedia.com/download-zip-code-latitude-longitude-city-state-county-csv/ </a>)</p>
        </form>
    </div>

    <hr>

    <div id="response">
        <h1>Response</h1>
        <div id="mapholder"></div>
        <?php
            //Set variables
            $servername = "localhost";
            $username = "cedrictstallwort";
            $password = "";
            $dbname = "ZipCodes";
            
            // Create connection
            $con=mysqli_connect($servername, $username, $password, $dbname);
            
            // Check connection
            if (mysqli_connect_errno())
              {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }  else {
                //echo "Successfully Connected to MySQL<br/>" ; 
              }
              
            //Set up query
            $sql = "SELECT * FROM zips WHERE (city='" . $_GET['city'] . "') and (state='" . $_GET['state'] . "')";

            //Execute query
            $result = mysqli_query($con, $sql);

            //Close server connection
            mysqli_close($con); 
            
            //Display results using Javascript
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "<script> showMap(" . $row["zip_code"] . "," . $row["latitude"] . "," . $row["longitude"] . ",'" . $row["city"] . "','" . $row["state"] . "','" . $row["county"] . "'); </script>" ;
            } else {
                echo "0 results";
            }
       
        ?>
    </div>

</body>
</html>    