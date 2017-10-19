
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
  $("#changePassword").on("show.bs.modal",function(event)
    { 
      var button = $(event.relatedTarget);
      var userid = button.data('id');
      $("input[name='id']").val(userid);
      $.ajax("<?=site_url('users/getUsers'); ?>/"+userid).done(function(data){
          $("#chfname").val(data.Name);          
      });
     
    });
  $("#pass2").on("keyup",function(){
      var pass  = $("#pass1").val();
      var pass2 = $(this).val();
      if(pass===pass2)
          {
            
            this.setCustomValidity('');
            $('input[type="password"]').removeClass("input-danger");
          }
      else
          {
            
            this.setCustomValidity('Passwords must match');
            $('input[type="password"]').addClass("input-danger");
          }
  });
  $("#changePassBtn").on("click",function(){
      var data = {id:$('input[name="id"]').val(),pass:"'"+$('input[name="pass1"]').val()+"'"};
      // console.log(data);
       $("form").trigger('reset');
      $("#changePassword").modal('toggle');
      var link ="<?=site_url("users/changePass"); ?>";
       $.post(link,data).done(function(msg) {
            $(".msg").addClass("alert").addClass("alert-danger").html(msg);
            $(".alert").delay(4000).slideUp(200, function() {
                $(this).alert('close');
            });
             // console.log(msg);
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