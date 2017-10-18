	<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Page title <small>Page subtile </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<div class="container">
					<div class="col-md-6 col-md-offset-3">
						<form action="<?=current_url(); ?>" class="form form-horizontal" method="post" id="presidential">
							<div class="form-group">
								<label for="countyName" class="control-label col-md-4">County</label>
								<div class="col-md-8">
									<select name="county" id="countyName" class="form-control" data-id="<?=$this->uri->segment(3); ?>">
										<?php
											foreach($county as $value)
												{
													echo'<option value="'.$value->county_id.'">'.$value->county_name.'</option>';
												}
										?>
									</select>
									
								</div>
							</div>
							<div class="form-group" >
								<label for="constituency" class="control-label col-md-4">Constituency</label>
								<div class="col-md-8">
									<select name="constituency" id="constituency" class="form-control">
										
									</select>
								</div>
							</div>
							<h3>Votes</h3>
							<div id="votes">
								
							</div>
							<div class="form-group">
								<div class="pull-right">
									<button class="btn btn-sm btn-primary">save</button>
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>