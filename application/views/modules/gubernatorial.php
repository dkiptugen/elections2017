<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Page title <small>Page subtile </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a></li>
                            <li><a href="#">Settings 2</a></li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

				<div class="container">
					<div class="col-md-6 col-md-offset-3">
						<form action="<?=current_url(); ?>" class="form form-horizontal" method="post" id="governor">
							<input type="hidden" name="year" value="<?=$this->uri->segment(3); ?>" />
							<div class="form-group">
								<label for="year" class="control-label col-md-4">Year</label>
										<div class="col-md-8">
											<input type="text" id="year" class="form-control" name="year"   value="<?=$this->uri->segment(3); ?>" readonly>
				                           
										</div>
							</div>
							<div class="form-group">
								<label for="countyName" class="control-label col-md-4">County</label>
								<div class="col-md-8">
									<select name="county" id="countyName" class="form-control" data-id="<?=$this->uri->segment(3); ?>">
										<option>Select value</option>
										<?php
											foreach($county as $value)
												{
													echo'<option value="'.$value->county_id.'">'.$value->county_name.'</option>';
												}
										?>
									</select>
									
								</div>
							</div>
							
							<div class="form-group">
								<label for="winner" class="control-label col-md-4">Governor</label>
										<div class="col-md-8">
											<input type="text" id="winner" class="form-control" name="winner" required autofocus list="gov" autocomplete="off">
				                            <datalist id="gov">
				    
				                            </datalist>
										</div>
							</div>
							<div class="form-group">
								<label for="party" class="control-label col-md-4">Party</label>
								<div class="col-md-8">
									<input type="text" id="party" class="form-control" name="party" />                   
								</div>
							</div>
							<div class="form-group">
								<label for="partycolor" class="control-label col-md-4">Party Color</label>
								<div class="col-md-8">
									<input type="color" id="partycolor" class="form-control" name="party_color" />                   
								</div>
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