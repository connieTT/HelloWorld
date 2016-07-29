function requestData(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
         showStock( JSON.parse(xmlhttp.responseText) );
      }
    }
    xmlhttp.open("GET", "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quote%20where%20symbol%20in%20(%22YHOO%22%2C%22AAPL%22%2C%22GOOG%22%2C%22MSFT%22%2C%22T%22%2C%22INTC%22%2C%22HPQ%22%2C%22FB%22%2C%22TWTR%22%2C%22CSCO%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=", true);
    xmlhttp.send();
}	

function showStock(data){

  	var quote = data.query.results.quote;

	for(var i=0; i<quote.length; i++){
		var div = document.createElement("div");
		var divName = "stockDiv" + i;
		div.setAttribute("id", divName);
		div.setAttribute("class", "stockDiv");
		
		var headerDiv = document.createElement("div");
		headerDiv.setAttribute("class", "headerDiv");
		var header = document.createElement("span");
		var textnode = document.createTextNode(quote[i].Name + "  (" + quote[i].symbol + ")");
		header.appendChild(textnode);
		headerDiv.appendChild(header);
		div.appendChild(headerDiv);
		
		var table = document.createElement("table");
		var tableName = "stockTable" + i;
		table.setAttribute("id", tableName);
		table.setAttribute("class", "stockTable");
		
 		var stockTableContents=	"<tr>" +
						"<th>LAST:</th>" +
						"<th>CHANGE:</th>" +
						"<th>OPEN:</th>" +
						"<th>HIGH:</th>" +
						"<th>ASK:</th>" +
						"<th>VOLUME:</th>" +
					"</tr>" +
					"<tr>" +
						'<td class="cell last" rowspan="3">' + quote[i].LastTradePriceOnly + '</td>' +
						'<td id=change' + i + ' class="cell">' + quote[i].Change + '</td>' +
						'<td class="cell">' + quote[i].Open + '</td>' +
						'<td class="cell">' + quote[i].DaysHigh + '</td>' +
						'<td class="cell">' + quote[i].Ask + '</td>' +
						'<td class="cell volume" rowspan="3">' + quote[i].AverageDailyVolume + '</td>' +
					"</tr>" +
					"<tr>" +
						'<th>CHANGE:</th>' +
						'<th>PREV:</th>' +
						'<th>LOW:</th>' +
						'<th>BID:</th>' +
					"</tr>" +
					"<tr>" +
						'<td class="cell">' + quote[i].ChangeinPercent + '</td>' +
						'<td class="cell">' + quote[i].PreviousClose + '</td>' +
						'<td class="cell">' + quote[i].DaysLow + '</td>' +
						'<td class="cell">' + quote[i].Bid + '</td>' +
					"</tr>";
		table.innerHTML = stockTableContents;
		div.appendChild(table);
		document.body.appendChild(div);
		
		var thisChange = "change" + i;
		if(quote[i].Change<0){
			document.getElementById(thisChange).style.color = "red";
			document.getElementById(thisChange).style.textShadow = "1px 1px red";
		}
		
		if(quote[i].Change>0){
			document.getElementById(thisChange).style.color = "lime";
			document.getElementById(thisChange).style.textShadow = "1px 1px lime";
		}
		
	}
}
