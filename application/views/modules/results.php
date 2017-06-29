<form method="post" role="form" class="form form-inline text-center">
	<div class="form-group">
		<label for="<?=$region.'_id'; ?>" class=""><?=$region; ?></label>
		<input type="text" name="<?=$region.'_id'; ?>" required="" autofocus="" class="form-control " list="region" id='region_id'>
		<datalist id="region">
		<?php
		//var_dump($regions);
		  foreach ($regions as $value)
		    {		  	
		  		echo '<option value="'.$value->{strtolower($region).'_id'}.'">'.$value->{strtolower($region).'_name'}.'</option>';
		  	}
		  ?>
		
		</datalist>
	</div>
	<div class="form-group">
		<label for="c_type" class="">Type</label>
		<select  name="c_type" required="" autofocus="" class="form-control" id="candidate">
			<option selected="">Select</option>
				<?php
					foreach ($post as $value)
					    {		  	
					  		echo '<option value="'.$value->id.'">'.ucwords(str_replace('_',' ',$value->position)).'</option>';
					  	}
				?>
				
		</select>		
	</div>
	
	
	
</form>
<br />
<hr>
<br />
<form method="get" role="form" class="form form-horizontal">
	
<div id="update"></div>
<div class="col-md-10">
	<button class="btn btn-primary pull-right">save</button>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
    $('#candidate').change(function(event) {
        var position=$('#candidate').val(),regionid=$('#region_id').val(),region='<?=strtolower($region); ?>';
    	$.ajax({url: "<?=site_url('cms/candidate_results'); ?>",			
	       				header:{'Access-Control-Allow-Origin': '*'},
	       				type:"POST",
				        data:{
				          posts: position,
				          region: region ,
				          regionid:regionid,
				        },
						 success: function(result)
						 		{
						 			console.log(result);
			        				$("#update").html(result);
			    				},
			    		 error: function(e)
			    		 	{
			    		 		console.log(e.Message);
			    		 	}
			    	});
              
    }); 
});
</script>