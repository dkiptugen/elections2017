<div class="container px-0 py-5">
    <div class="mx-auto col-sm-12 col-12 col-md-5 col-lg-5 col-xl-4">        
        <div class="card ">
            <div class="card-block">
            	<form action="<?=site_url("changepassword"); ?>" class="form form-signin" method="post">
            		<h2 class="form-signin-heading">Change password</h2>
            		<div class="form-group input-group">
            			<span class="input-group-addon input-md">
            				<label for="emailAddress">Email </label>
            		    </span>
            		    <input type="email" class="form-control input-md" name="email" required autofocus autocomplete="off">
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
