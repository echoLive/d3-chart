function csheader() {

function cshrender(selection) {
  console.log(selection);
  selection2 = selection._groups;
//  selection.forEach((data) => {
  selection.each(function(data) {
  	console.log(data);
//  data = list(data);
//  console.log(data);
    var interval   = TIntervals[TPeriod];
    var format     = (interval=="month")?d3.timeFormat("%b %Y"):d3.timeFormat("%d. %b %Y"); // Infobar Date
    var dateprefix = (interval=="month")?"Month of ":(interval=="week")?"Week of ":"";
    d3.select("#infodate").text(dateprefix + format(data.TIMESTAMP));
    d3.select("#infoopen").text("Open " + data.OPEN);
    d3.select("#infohigh").text("High " + data.HIGH);
    d3.select("#infolow").text("Low " + data.LOW);
    d3.select("#infoclose").text("Close " + data.CLOSE);
    d3.select("#infovolume").text("Volume " + data.TURNOVER);
    d3.select("#infocontract").text("Contract " + data.CONTRACT);

  });
} // cshrender

return cshrender;
} // csheader
