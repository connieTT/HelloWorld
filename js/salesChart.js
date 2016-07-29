function chartBallsSold(poke, great, ultra, master, level, premier, timer){

    var data = [{type:'poke', color:'yellow' ,count: poke},
                {type:'great', color:'deepskyblue' ,count: great},
                {type:'ultra', color:'orange' ,count: ultra},
                {type:'master', color:'purple' ,count: master},
                {type:'level', color:'pink' ,count: level},
                {type:'premier', color:'red' ,count: premier},
                {type:'timer', color:'teal' ,count: timer}];

    // Create ordinal array of types for x axis lables
    var types = [];
    data.forEach(function(d,i){ types[i] = d.type;});
    
    var outerWidth = 750, 
        outerHeight = 200;
    
    var margin = {top: 20, right: 30, bottom: 30, left: 70},
        width = outerWidth - margin.left - margin.right,
        height = outerHeight - margin.top - margin.bottom;  
    
    var x = d3.scale.linear()
      .domain([0, d3.max(data, function(d) { return d.count; })] )
      .range([0,width]);
      
    var y = d3.scale.ordinal()
        .domain( types )
        .rangeRoundBands([0, height], .1);      

    var xAxis = d3.svg.axis()
        .scale(x)
        .tickSize(-height, -height, 0)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .tickSize(0, 0, 0)
        .orient("left");

    var svg = d3.select('#chartBallsSold')
     .append("svg")
        .attr('width', outerWidth)
        .attr('height', outerHeight)
     .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")" );      

    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
      .append("text")
        // .attr("transform", "rotate(-90)")
        .attr("x", width/2)
        .attr("dy", "1.75em")
        .style("text-anchor", "center")
        .text("(Balls Sold)");
        
    
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);
    
    var bar = svg.selectAll()
      .data( data )
     .enter().append('g')
      .attr('transform', function(d){ return 'translate(0,' + y(d.type) + ')' ;});
      
    bar.append('rect')
      .attr('width', function(d){ return x(d.count);})
      .attr('height', y.rangeBand() )
      .attr('class', function(d){return d.type;});
    
    bar.append('text')
      .attr('x', function(d){ return x(d.count) - 20; } )
      .attr('y', y.rangeBand() / 2)
      .attr('dy', '.35em')
      .text( function(d){ return d.count;});

    
    
}