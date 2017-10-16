<!-- 
    <div class="container">

      <form class="form-signin form">
        <h2 class="form-signin-heading">Please sign in</h2>

        <div class="input-group">
          
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <div class="input-group-addon ">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> -->
    <div class="container px-0 py-5">
      <div class="mx-auto col-sm-12 col-12 col-md-5 col-lg-5 col-xl-4">
        
          <div class="card ">
            <div class="card-block">
              <form action="<?=site_url("login"); ?>" class="form" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="input-group form-group">
                  <label for="inputEmail" class="sr-only">Username</label>
                  <span class="input-group-addon ">
                    <i class="fa fa-user"></i>
                  </span>
                  <input type="text" id="inputEmail" class="form-control" placeholder="Username or email" name="username" required   />
                </div>
                <div class="input-group form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <span class="input-group-addon">
                    <i class="fa fa-key"></i>
                  </span>
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password" />
                </div>
                <div class="checkbox clear-fix">
                  <label>
                    <input type="checkbox" value="remember-me" name="remember"/>  Remember me
                  </label>
                  <div class="pull-right">
                    <a href="<?=site_url("changepassword"); ?>">Forgot Password?</a>
                  </div>
                </div>
                <?php
                  if(isset($msg))
                    {
                       echo '<div class="form-group">'.$msg.'</div>';
                    }
                ?>
                <button class="btn btn-md btn-primary btn-block" type="submit" >Sign in</button>
              </form>
            </div>
          </div>
        
      </div>
    </div>