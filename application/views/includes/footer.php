
        <!-- footer content -->
        <footer>
          <div class="pull-right">
           	Election
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<script type="text/javascript" src="<?=base_url("assets/Gentelella/jquery/dist/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/tether.min.js"); ?>"></script>
<script type="text/javascript" src="<?=base_url("assets/Gentelella/bootstrap/dist/js/bootstrap.min.js"); ?>">  
</script>

<script>
  $(document).ready(function(e){
    $("#governor select").on("change",function(){
      var countyid = $(this).find(":selected").val();
      var year = $(this).data("id");
      var link = "<?=site_url('home/getGovernor'); ?>"+"/"+countyid+"/"+year;
      
      $.ajax(link)
        .done(function(er) {
         $("#governor #winner").val(er); 
        });
      var link = "<?=site_url('home/getGovernorDatalist'); ?>"+"/"+countyid+"/"+year;  
       $.ajax(link)
        .done(function(er) {
             $("#gov").html(er);
          });
    });
    $("#presidential #countyName").on("change",function(){
      var countyid = $(this).find(":selected").val();
      var year = $(this).data("id");
      $.ajax("<?=site_url('home/getConstituency'); ?>/"+countyid)
        .done(function(con){
          $("#constituency").html(con);
        });
       $("#presidential #constituency").attr("data-year",year);
      
    });
    $("#presidential #constituency").on("change",function(){
        var year = $(this).attr("data-year");
        var conid=$(this).find(":selected").val();
        var link ="<?=site_url("home/presidential"); ?>/"+conid+"/"+year;
       $.ajax(link)
        .done(function(er) {
             $("#votes").html(er);
          });

    });
  });
</script>
<script type="text/javascript" src="<?=base_url("assets/js/custom.js"); ?>"></script> 
<script type="text/javascript" src="<?=base_url("assets/Gentelella/js/custom.js"); ?>"></script>  
<?php
if($map)
  {
    $this->view($map);
  }
?>

</body>
</html>