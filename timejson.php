<!DOCTYPE html>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

<div id="demo"></div>
<script>

var data = JSONData.slice()
var format = d3.time.format("%a %b %d %Y")
var amountFn = function(d) { return d.amount }
var dateFn = function(d) { return format.parse(d.created_at)}

var x = d3.time.scale()
	.range([10,280])
	.domain(d3.extend(data,dateFn));

var y = d3.scale.linear()
	.range([180,10])
	.domain(d3.extent(data,dateFn));

var svg = d3.select("#demo").append("svg:svg")
	.attr("width", 300)
	.attr("height", 200);

svg.selectAll("circle").data(data).enter()
	.append("svg:circle")
	.attr("r",4)
	.attr("cx", function(d) { return x(dateFn(d)) })
	.attr("cy", function(d) { return y(amountFn(d)) });

</script>
