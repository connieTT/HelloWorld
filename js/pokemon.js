var tiles = document.getElementsByClassName("tile");

var row1="0px", row2="-236px", row3="-471px";
var col1="0px",col2="-253px",col3="-505px",col4="-758px",col5="-1010px",col6="-1263px",col7="-1515px";

var pokemons =[    {name:"p1", left:col1, top:row1 },
                {name:"p2", left:col1, top:row2 },
                {name:"p3", left:col1, top:row3 },
                {name:"p4", left:col2, top:row1 },
                {name:"p5", left:col2, top:row2 },
                {name:"p6", left:col2, top:row3 },
                {name:"p7", left:col3, top:row1 },
                {name:"p8", left:col3, top:row2 },
                {name:"p9", left:col3, top:row3 },
                {name:"p10", left:col4, top:row1 },
                {name:"p11", left:col4, top:row2 },
                {name:"p12", left:col4, top:row3 },
                {name:"p13", left:col5, top:row1 },
                {name:"p14", left:col5, top:row2 },
                {name:"p15", left:col5, top:row3 },
                {name:"p16", left:col6, top:row1 },
                {name:"p17", left:col6, top:row2 },
                {name:"p18", left:col6, top:row3 },
                {name:"p19", left:col7, top:row1 },
                {name:"p20", left:col7, top:row2 },
                {name:"p21", left:col7, top:row3 },
              ];

function startUp(){
  tiles[0].childNodes[0].innerText = "Let's";
  tiles[1].innerHTML = "<div> Play </div>";
  tiles[2].innerHTML = "<div> Pokemon </div>";
  tiles[3].innerHTML = "<div> Battle! </div>";
}

function doBattle(){
    var selected=[];
    
    for( var i=0; i<tiles.length; i++){
        tiles[i].innerHTML = "";
        tiles[i].style.backgroundImage = "url('../img/pokemon/pokemons.png')";
        tiles[i].style.backgroundRepeat = "no-repeat";
        selected[i] = Math.floor(Math.random() * 21);
        tiles[i].style.backgroundPosition = pokemons[selected[i]].left + " " + pokemons[selected[i]].top;
    }
    
    if ((selected[0]==selected[1]) && (selected[0]==selected[2]) && (selected[0]==selected[3])) {
        document.getElementById("text").innerHTML = "Pokemons united!";
    } else if ( ((selected[0]==selected[1]) && (selected[0]==selected[2])) || 
    ((selected[0]==selected[1]) && (selected[0]==selected[3])) ||
    ((selected[1]==selected[2]) && (selected[1]==selected[3])) ||
    ((selected[0]==selected[2]) && (selected[0]==selected[3]))) {
        document.getElementById("text").innerHTML = "3 out of 4!";
    } else if ((selected[0]==selected[1]) || (selected[0]==selected[2]) || (selected[0]==selected[3])
    || (selected[1]==selected[2]) || (selected[1]==selected[3]) || (selected[2]==selected[3])) {
        document.getElementById("text").innerHTML = "2 pokemons match!";
    } else {
        document.getElementById("text").innerHTML = "No Match! Keep going!";
    }
}

function autoBattle(){
    auto = setInterval( function(){doBattle()}, 1000 );
}

function stopBattle(){
    clearInterval( auto );
}