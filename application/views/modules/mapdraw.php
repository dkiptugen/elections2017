<script src="<?=base_url("assets/js/d3.min.js"); ?>"></script>
<script type="text/javascript">
	var element = d3.select('#gov2013').node();

	var viewportWidth = element.getBoundingClientRect().width;
	var viewportHeight = $(window).height()/2;
	var width = element.getBoundingClientRect().width;
	var height = width/0.92;
	//Map projection
var projection = d3.geoMercator()
    .scale([width*6])
    .center(["37.90851092974151","0.3088736326050645"]) //projection center
    .translate([width/2,height/2]);//translate to center the map in view

//Generate paths based on projection
var path = d3.geoPath()
    .projection(projection);
	
   	 d3.json("<?=base_url("assets/geojson/ken.geojson"); ?>", function(error,json) {
 	//console.log(json);
 	if (error) return console.log(error); 
 	var svg = d3.select("#gov2013")
		.append("svg")
		.attr("width",width)
		.attr("height",height)
		.attr("xmlns","http://www.w3.org/2000/svg")
		;
	//draw map
	var map = svg.selectAll("path")
		.data(json.features)
		.enter()
		.append("path")
		.attr("d", path)
		.attr("stroke-width","1")
		.attr("stroke","#ffe325")
		.on("mouseover",function(d,i){
			console.log(d.properties.COUNTY_NAM);
		})
		.style("fill",function(d,i){

		});
		 
 	});

   	 d3.json("<?=base_url("assets/geojson/ken.geojson"); ?>", function(error,json) {
 	//console.log(json);
 	if (error) return console.log(error); 
 	var svg = d3.select("#gov2017")
		.append("svg")
		.attr("width",width)
		.attr("height",height);
	//draw map
	var map = svg.selectAll("path")
		.data(json.features)
		.enter()
		.append("path")
		.attr("d", path)
		.on("click",function(){
			console.log(d.id);
		}

			); 
 	});


d3.select(window).on('resize', resize);


function resize() {
  
   
    width = element.getBoundingClientRect().width;
    height = width/0.92;
  
   projection
    	.scale([width*2])
   		.translate([width/2,height/2]);

    
   d3.select(".x_content").attr("width",width).attr("height",height);
   d3.select("svg").attr("width",width).attr("height",height);
  
   d3.selectAll("path").attr('d', path);
 

}






</script>
