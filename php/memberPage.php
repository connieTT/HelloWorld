<?php session_start(); ?> 
<!DOCTYPE html>
<html>
    <head>
        <title>PokeballCenter</title>
        <link rel="stylesheet" href="../css/appStyles.css" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
        <script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="../js/pokeCalc.js"></script>
    </head>
    
<body>
    <div id="headerRow">
        <span id="userName"></span>
    </div>
    <div id="main">
        <div id="salesSection">
            <form id="salesForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <fieldset> <legend>Poke Ball Sales Form</legend>
                    <fieldset> <legend class="sublegend">Customer Information</legend>
                        <span class="cispan">First Name</span> <input type="text" name="fname"> <br>
                        <span class="cispan">Last Name</span> <input type="text" name="lname"> <br>
                        <span class="cispan">Email</span> <input type="text" name="email"> <br>
                        <span class="cispan">Apartment</span> <input type="text" name="apt"> <br>
                        <span class="cispan">Street</span> <input type="text" name="street"> <br>
                        <span class="cispan">City</span> <input type="text" name="city"> <br>
                        <span class="cispan">State</span> <input type="text" name="state"> <br>
                        <span class="cispan">Zip</span> <input type="text" name="zip"> <br>
                    </fieldset>
                    <fieldset> <legend class="sublegend">Poke Ball Order</legend>
                        <table style="font-family: 'Ubuntu Mono', monospace;">
                            <tr><th>Ball Type</th><th># of Balls</th><th>Price</th><th>Unit Total</th></tr>
                            <tr>
                                <td>Poke Balls</td>
                                <td><input type="number" name="poke" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$200 = </td>
                                <td id="pokeTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Great Balls</td>
                                <td><input type="number" name="great" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$600 = </td>
                                <td id="greatTotal" class="unitTotal">0</td>
                            </tr> 
                            <tr>
                                <td>Ultra Balls</td>
                                <td><input type="number" name="ultra" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$1200 = </td>
                                <td id="ultraTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Master Balls</td>
                                <td><input type="number" name="master" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$1500 = </td>
                                <td id="masterTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Level Balls</td>
                                <td><input type="number" name="level" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$500 = </td>
                                <td id="levelTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Premier Balls</td>
                                <td><input type="number" name="premier" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$200 = </td>
                                <td id="premierTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Timer Balls</td>
                                <td><input type="number" name="timer" class="number item" oninput="unitTotal(this);"></td>
                                <td> x P$1000 = </td>
                                <td id="timerTotal" class="unitTotal">0</td>
                            </tr>
                            <tr>
                                <td>Totals</td>
                                <td><input type="number" name="numofballs" class="number" id="numofballs"></td>
                                <td></td>
                                <td>P$<input type="number" name="total" class="number" id="total"></td>
                            </tr>
                        </table>
                        <hr>
                        <button id="submitButton" type="submit" form="salesForm" name="submit" value="sales">Enter Customer Order</button>
                    </fieldset>
                </fieldset>
            </form>    
        <div id="dataSection">
            <fieldset> <legend>Sales Data</legend>
                <fieldset id="chartBallsSold"> <legend>Balls Sold by Type</legend> </fieldset>
            </fieldset>
        </div>
    </div>
    <?php include '../php/dispatch.php';?>
</body>
</html>