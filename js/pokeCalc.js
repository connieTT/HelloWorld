function unitTotal(element){
    //Calculate Unit Price
    var price;
    if( element.name == "poke" || element.name == "premier" ){ price = 200; }
    if( element.name == "great"){ price = 600; }
    if( element.name == "ultra"){ price = 1200; }
    if( element.name == "master"){ price = 1500; }
    if( element.name == "level"){ price = 500; }
    if( element.name == "timer" ){ price = 1000; }
    document.getElementById(element.name + "Total").innerHTML = (element.value * price).toFixed(2);
    
    //Calculate Total number of Balls
    var items = document.getElementsByClassName("item");
    var numofballs=0;
    for(var i=0; i< items.length; i++){
        numofballs += Number( items[i].value);
    }
    document.getElementById("numofballs").value = numofballs;
    
    //Calculate Total
    var unitTotals = document.getElementsByClassName("unitTotal");
    console.log(unitTotals.length)
    var total=0;
    for(var i=0; i< unitTotals.length; i++){
        total += Number( unitTotals[i].innerHTML);
    }
    document.getElementById("total").value = total.toFixed(2);    
}