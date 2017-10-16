<div class="container px-0 py-5">
    <div class="mx-auto col-sm-12 col-12 col-md-5 col-lg-5 col-xl-4">        
        <div class="card ">
            <div class="card-block">
            	<form action="" class="form form-signin" autocomplete="off" role="form">
            		<h2 class="form-signin-heading">Change password</h2>
            		<div class="form-group ">
            			
            		    <input type="password" class="form-control" name="pass" required autofocus autocomplete="off" placeholder="enter password" />
            		</div>
                    <div class="form-group">
                        <input type="password" class="form-control " name="pass2" required autofocus autocomplete="off" placeholder="confirm password" autocomplete="off" />
                    </div>
            		<div class="form-group clear-fix">
            			<div class="pull-left">
            				<a href="<?=site_url("login"); ?>" class="btn btn-success btn-md">login</a>
            			</div>
            			<div class="pull-right">
            				<button type="submit" class="btn btn-primary btn-md">Change Password</button>
            			</div>
            		</div>
            		<?='<div class="form-group">'.$msg.'</div>'; ?>
            	</form>
            </div>
        </div>
    </div>
</div>