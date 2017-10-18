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
		.on("mouseout",function(){
			$(".tool >.2013, .tool > .2017").html();
		})
		;
	//draw map
	var map = svg.selectAll("path")
		.data(json.features)
		.enter()
		.append("path")
		.attr("d", path)
		.attr("stroke-width","1.5")
		.attr("stroke","rgba(75,75,75,0.8)")
		.on('mouseover', function(d,i) {
            var jsonData;
			$.ajax({
			  dataType: "json",
			  url: "<?=site_url("home/getCountyInfo"); ?>/"+d.id+"/1",
			  async: false,
			  success: function(data){jsonData = data}
			});
		      $('.tool .2013').html(jsonData.candidate_name).parent().css("top",d3.event.clientY+"px").css("left",d3.event.clientX+"px").css("object-fit","cover");// log the mouse x,y position
		    })
		
		.style("fill",function(d,i){
			var jsonData;
			$.ajax({
			  dataType: "json",
			  url: "<?=site_url("home/getCountyInfo"); ?>/"+d.id+"/1",
			  async: false,
			  success: function(data){jsonData = data}
			});

            return jsonData.party_color;
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
		.attr("stroke-width","1.5")
		.attr("stroke","rgba(75,75,75,0.8)")
		.on('mouseover', function(d,i) {
            var jsonData;
			$.ajax({
			  dataType: "json",
			  url: "<?=site_url("home/getCountyInfo"); ?>/"+d.id+"/2",
			  async: false,
			  success: function(data){jsonData = data}
			});
		      $('.tool .2017').html(jsonData.candidate_name).parent().css("top",d3.event.clientY+"px").css("left",d3.event.clientX+"px").css("object-fit","cover");// log the mouse x,y position
		    })
		
		.style("fill",function(d,i){
			var jsonData;
			$.ajax({
			  dataType: "json",
			  url: "<?=site_url("home/getCountyInfo"); ?>/"+d.id+"/2",
			  async: false,
			  success: function(data){jsonData = data}
			});

            return jsonData.party_color;
		});
		 
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
