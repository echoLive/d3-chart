function genType(d) {
  d.TIMESTAMP  = parseDate(d.TIMESTAMP);
  d.CONTRACT	 = d.CONTRACT;
  d.OPEN       = +d.OPEN;
  d.HIGH       = +d.HIGH; 
  d.LOW        = +d.LOW;
  d.CLOSE      = +d.CLOSE;
  d.TURNOVER   = +d.TURNOVER;
  d.COMSHORT   = +d.COMSHORT;
  d.VOLATILITY = +d.VOLATILITY;
  d.COMLONG    = +d.COMLONG;
  return d;
}
/*
function text(t) { 
  alert t.CONTRACT   = +t.CONTRACT;
  return t;
}
*/
function timeCompare(date, interval) {
  if (interval == "week")       { var durfn = d3.timeMonday(date); }
  else if (interval == "month") { var durfn = d3.timeMonth(date); }
  else { var durfn = d3.timeDay(date); } 
  return durfn;
}

function dataCompress(data, interval) {
  var compressedData  = d3.nest()
                 .key(function(d) { return timeCompare(d.TIMESTAMP, interval); })
                 .rollup(function(v) { return {
                         TIMESTAMP:   timeCompare(d3.values(v).pop().TIMESTAMP, interval),
                         OPEN:        d3.values(v).shift().OPEN,
                         LOW:         d3.min(v, function(d) { return d.LOW;  }),
                         HIGH:        d3.max(v, function(d) { return d.HIGH; }),
                         CLOSE:       d3.values(v).pop().CLOSE,
                         TURNOVER:    d3.mean(v, function(d) { return d.TURNOVER; }),
                         VOLATILITY:  d3.mean(v, function(d) { return d.VOLATILITY; }),
                         COMSHORT:    d3.mean(v, function(d) { return d.COMSHORT; }),
                         COMLONG:     d3.mean(v, function(d) { return d.COMLONG; }),
                         CONTRACT:    d3.mean(v, function(t) { return t.CONTRACT; })                  
                        }; })
                 .entries(data).map(function(d) { return d.values; });

  return compressedData;
}
