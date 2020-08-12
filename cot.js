// set the dimensions and margins of the graph
var margin = {top: 10, right: 60, bottom: 20, left: 2},
    width = 1062 - margin.left - margin.right,
    height = 120 - margin.top - margin.bottom;
    
// parse the date / time
var parseTime = d3.timeParse("%Y-%m-%d");
// set the ranges
var x = d3.scaleTime().range([0, width]);
var y = d3.scaleLinear().range([0, height]);
// define the line
var valueline = d3.line()
    .x(function(d) { return x(d.date_cot); })
    .y(function(d) { return y(d.comshort); });
// append the svg obgect to the body of the page
// appends a 'group' element to 'svg'
// moves the 'group' element to the top left margin
var svg = d3.select("#cotbox").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform",
          "translate(" + margin.left + "," + margin.top + ")");
var yAxisRight = d3.axisRight()
     .scale(y)
     .ticks(Math.floor(height/40));
                 
// gridlines in y axis function
        function make_y_gridlines() {
        return d3.axisLeft(y)
            .ticks(2)
            .tickValues([tick1, tick2])
        }
// Get the data
d3.json("cot.json").then(function(data) {
  // format the data
  data.forEach(function(d) {
      d.date_cot = parseTime(d.date_cot);
      d.comshort = +d.comshort;
  });
  // Scale the range of the data
  x.domain(d3.extent(data, function(d) { return d.date_cot; }));
  y.domain([ydomain, d3.max(data, function(d) { return d.comshort; })]);
  // Add the valueline path.
  svg.append("path")
      .data([data])
      .attr("class", "line")
      .attr("d", valueline);
  // Add the x Axis
  svg.append("g")
      .attr("transform", "translate(0," + height + ")")
      .call(d3.axisBottom(x));
  // Add the y Axis
  svg.append("g")
      .call(d3.axisLeft(y))
      .attr("class", "grid")
      .call(make_y_gridlines().tickSize(-width, 0, 0));
  svg.append("g")
      .attr("class", "axis yaxis")
      .attr("transform", "translate(" + width + ",0)")
      .call(yAxisRight.tickSizeOuter(3)
            .ticks(2)
            .tickValues([tick1, tick2])
      );//right
});