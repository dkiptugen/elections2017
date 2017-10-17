<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>ADD USER</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
				<form action="" class="form form-horizontal" method="post">
					<div class="form-group">
						<label for="inputName" class="control-label col-md-offset-2 col-md-2">Name</label>
						<div class="col-md-4">
							<input type="text" name="fullname" id="inputName" class="form-control" required="required" autofocus pattern="[a-zA-Z\s']+$" oninvalid="setCustomValidity('invalid name')" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail" class="control-label col-md-offset-2 col-md-2">Email Address</label>
						<div class="col-md-4">
							<input type="email" name="email" id="inputEmail" class="form-control" required autofocus oninvalid="setCustomValidity('invalid email')" autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="inputUsername" class="control-label col-md-offset-2 col-md-2">Username</label>
						<div class="col-md-4">
							<input type="text" name="username" id="inputUsername" class="form-control" required autofocus autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="inputRole" class="control-label col-md-offset-2 col-md-2">Usertype</label>
						<div class="col-md-4">
							<select name="role" id="inputRole" class="form-control" required autofocus>
								<option value="0" selected="selected">Normal User</option>					
								<option value="1">Admin</option>	
								<option value="2">Super Admin</option>							
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword1" class="control-label col-md-offset-2 col-md-2">Enter Password</label>
						<div class="col-md-4">
							<input type="password" name="pass1" id="inputPassword1" class="form-control" required autofocus autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword2" class="control-label col-md-offset-2 col-md-2">Confirm Password</label>
						<div class="col-md-4">
							<input type="password" name="pass2" id="inputPassword2" class="form-control" required autofocus autocomplete="off">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-8">
							<button type="submit" class="btn btn-primary pull-right">
								SAVE
							</button>
						</div>
					</div>
					<div class="form-group">
						<?=(isset($msg))?$msg:NULL; ?>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	var password = document.getElementById("inputPassword1")
  , confirm_password = document.getElementById("inputPassword2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>