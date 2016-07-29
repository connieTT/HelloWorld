<!DOCTYPE html>
<html>
    <head>
        <title>ZIP Find</title>
        <link rel="stylesheet" href="../css/zipFindStyles.css" type="text/css" />
        <script src="https://maps.google.com/maps/api/js?sensor=false"></script>        
        <script type="text/javascript" src="../js/zipFindScripts.js"></script>
    </head>
<body>
    <div id="call">
        <h1>Call</h1>
        <form id="zipForm" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <p>Enter a US City(like Atlanta) and State(like GA) to find where it is. <input type="text" name="city" id="city"> 
            <input type="text" name="state" id="state"> <input type="submit">
            or <a href="<?php echo $_SERVER['PHP_SELF'] . "?state=-1";?>">click here to generate a random zip code.</a></p>
            <p>(Data from: <a href="https://www.gaslampmedia.com/download-zip-code-latitude-longitude-city-state-county-csv/"> https://www.gaslampmedia.com/download-zip-code-latitude-longitude-city-state-county-csv/ </a>)</p>
        </form>
    </div>

    <hr>

    <div id="response">
        <h1>Response</h1>
        <div id="mapholder"></div>
        <div id="tripholder">&nbsp;</div>
        <?php
            if( !empty($_GET) ){
                $filename = "../data/zipFile.csv";
                $datafile = fopen($filename, "r") or die("Unable to open file!");
                
                
                if( $_GET['state'] ==-1 ){    
                    $count = 0;
                    $randDataline = mt_rand(1, 42742);
                    
                    while( $count <= $randDataline ){
                     $dataline = fgetcsv($datafile) ;
                     if( $count == $randDataline){
                        //  echo "Zip: " . $dataline[0] . "<br> City: " .$dataline[3] . "<br> County: " . $dataline[5] . "<br> State: " . $dataline[4];
                         echo "<script> showMap(" . $dataline[0] . "," . $dataline[1] . "," . $dataline[2] . ",'" . $dataline[3] . "','" . $dataline[4] . "','" . $dataline[5] . "'); </script>" ;
                     }
                     
                     $count++;
                    }           
                }else{
                    while( ! feof($datafile) ){
                        // Format "00603",18.455913,-67.14578,"Aguadilla","PR","Aguadilla
                        $dataArr = array();

                        $dataline = fgetcsv($datafile) ;
                        if( $dataline[3] == $_GET['city']&&$dataline[4]==$_GET['state']){
                                // echo "Zip: " . $dataline[0] . "<br> City: " .$dataline[3] . "<br> County: " . $dataline[5] . "<br> State: " . $dataline[4];
                            $data=array($dataline[0],$dataline[1],$dataline[2],$dataline[3],$dataline[4] );
                            echo "<script> showMap(" . $dataline[0] . "," . $dataline[1] . "," . $dataline[2] . ",'" . $dataline[3] . "','" . $dataline[4] ."','" . $dataline[5] . "'); </script>" ;
                            break;
                        }
                        
                        
                    }
                
                }
    
                fclose($datafile);
                
            }
        ?>
    </div>




</body>
</html>    