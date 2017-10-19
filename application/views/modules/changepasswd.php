<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Change Password</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                   <!--  <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="" method="post" class="form form-horizontal" role="form" id="changpass">
                    <div class="form-group">
                        <label for="cpass" class="control-label col-md-offset-2 col-md-2">Current Password</label>
                        <div class="col-md-4">
                            <input type="password" name="rpass" id="cpass" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass1" class="control-label col-md-offset-2 col-md-2">Enter New password</label>
                        <div class="col-md-4">
                            <input type="password" name="pass1" id="pass1" class="form-control" autofocus autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass2" class="control-label col-md-offset-2 col-md-2">Confirm Password</label>
                        <div class="col-md-4">
                            <input type="password" name="pass2" id="pass2" class="form-control" autofocus autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group">
                           <div class="col-md-8 ">
                               <button type="submit" class="btn btn-sm btn-primary pull-right">Change Password</button>
                               <div class="clearfix">
                                   <?=(isset($msg))?$msg:NULL; ?>
                               </div>
                           </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>