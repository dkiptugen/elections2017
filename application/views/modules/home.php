<div id="map" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 clearfix" ></div>
<div class="clearfix"></div>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script type="text/javascript">

//Map dimensions (in pixels)

var margin = 20;
var width = parseInt(d3.select("#map").style("width")) - margin*2,mapRatio = .592
  , height = width * mapRatio;
 
var center={"lat":0.3088736326050645,"lon":37.90851092974151} ;
var scale=width*(1.5384615384615)*2;
//Map projection
var projection = d3.geoMercator()
    .scale(scale)
    .center([center.lon,center.lat]) //projection center
    .translate([width/2,height/2]);//translate to center the map in view

//Generate paths based on projection
var path = d3.geoPath()
    .projection(projection);
function resize() {

    var w = d3.select("#map").node().clientWidth;
    console.log("resized", w);

    // adjust things when the window size changes
    width = w - margin- margin;
    height = width * mapRatio;

    console.log(width)
    // update projection
    var newProjection = d3.geoMercator()
      .scale(width)
      .translate([width / 2, height / 2]);

    //Update path
    var path = d3.geoPath()
      .projection(newProjection);    

    // resize the map container
   	svg
        .style('width', width + 'px')
        .style('height', height + 'px');

    // resize the map
    //features.selectAll("path").attr('d', path);

}


//Create an SVG
var svg = d3.select("#map").append("svg")
    .attr("width", width)
    .attr("height", height)
    .attr('viewBox','0 0 '+width+' '+height)
    .attr('preserveAspectRatio','xMidYMid meet')
    .style('background-color','rgb(230,230,230)');


//Group for the map features
var features = svg.append("g")
    .attr("class","features");

//Create zoom/pan listener
//Change [1,Infinity] to adjust the min/max zoom scale
var zoomfactor = 1;
var zoom = d3.zoom()
    .scaleExtent([0, Infinity])
    .translateExtent([[0, 0], [width, height]])
    .extent([[0, 0], [width, height]])
    .on("zoom",zoomed);

svg.call(zoom);

d3.json("<?=base_url('assets/geojson/'.$region_code.'.geojson'); ?>",function(error,geodata) {
  if (error) return console.log(error); //unknown error, check the console

  //Create a path for each map feature in the data
  features.selectAll("path")
    .data(geodata.features)
    .enter()
    .append("path")
    .attr("d",path)
    .style('stroke','#AAA')
    // .style('fill',function(d,i){
    //    return 'rgb(68,'+d.id*2.2+',100)';
    //  })
    .style('fill','rgb(75,75,75)')
    .attr('id',function(d,i){
      return 'country_'+d.id;
    })
    .on("mouseover",hover)
    .on("click",clicked)
   ;
    /*.on("click",clicked)
    .on("mouseover",hover)*/
    d3.csv('<?=base_url('assets/geojson/'.(($region=='country')?'ken':$region."_".$id).'.csv'); ?>', function(error, data) {
  //console.log(JSON.parse(data[0].Center).lat);
  
svg.selectAll("circle")
                .data(data)
                .enter()
                .append("circle")
                .attr("cx", function(d) {
                    return projection([JSON.parse(d.Center).lon, JSON.parse(d.Center).lat])[0];
                })
                .attr("cy", function(d) {
                    return projection([JSON.parse(d.Center).lon, JSON.parse(d.Center).lat])[1];
                })
                .attr("r", 1)
                .style("fill", "white")
                .style("stroke", "white");

            svg.selectAll(".labels")
              .data(data)
              .enter().append("text")
              .attr("class", "labels")
              .text(function(d) {
               // console.log(d);
                return d.Name; })
              .attr("x", function(d) {
                  return projection([JSON.parse(d.Center).lon, JSON.parse(d.Center).lat])[0] + 3;
              })
              .attr("y", function(d) {
                  return projection([JSON.parse(d.Center).lon, JSON.parse(d.Center).lat])[1]+3;
              })
              .attr("font-size", "8px")
              .style('color','#fff')
              .style('fill', 'white')
              .style('font-weight','bolder')
              .style('margin','2px')
              .classed('hidden-md-down');
             // arrangeLabels();

               });

});
d3.select(window).on('resize', resize);


function hover(d,i)
    {
      
    }
function clicked(d,i) {
 
   

}
// var gui = d3.select("#gui");
// gui.append("button")
//   .classed("zoom in", true)
//   .text("+")
//   .style("border","0")
//   .style("background-color","rgba(0,255,255,0.5)")
//   .on("click", function (){
//     zoomfactor = zoomfactor + 0.4;
//     zoom.scaleBy(zoomfactor).event(d3.select(features));
//   });
// gui.append("button")
//   .classed("zoom out", true)
//   .text("-")
//   .style("border","0")
//   .style("background-color","rgba(0,255,0,0.5)")
//   .style("margin","10px")
//   .on("click", function (){
//     zoomfactor = zoomfactor - 0.4;
//     zoom.scaleBy(zoomfactor).event(d3.select(features));
//   });

//Update map on zoom/pan
function zoomed() {
svg.attr("transform", d3.event.transform)
      .selectAll("path").style("stroke-width", 1.5 / d3.event.transform.k + "px" );

}
</script>