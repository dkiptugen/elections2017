<div class="row">
   
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Manage Users</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="msg"></div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>User Status</th>
                            <th>Password Status</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($table as $value) 
                            {
                                $role=($value->role==0)?"Normal User":(($value->role==1)?"Admin":"Super Admin");
                                $user_status=($value->user_status==0)?"Disabled":"enabled";
                                 $pass_status=($value->pass_status==0)?"Change":"Okay";
                                echo'
                                <tr>
                                    <td>'.$value->id.'</td>
                                    <td>'.$value->Name.'</td>
                                    <td>'.$value->email.'</td>
                                    <td>'.$role.'</td>
                                    <td>'.$user_status.'</td>
                                    <td>'.$pass_status.'</td>
                                    <td>
                                        <ul class="nav">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                    Manage
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="javascript:;" data-id="'.$value->id.'" data-toggle="modal" data-target="#changePassword">Change Password</a></li>
                                                    <li><a href="#" data-id="'.$value->id.'">Update User</a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>User Status</th>
                            <th>Password Status</th>                            
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePassword">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title pull-left text text-bold">Change Password</h5>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="clearfix"></div>       
      </div>
      <div class="modal-body">
        <form action="javascript:;" method="post" class="form form-horizontal" role="form">
            <input type="hidden" name="id" >
        <div class="form-group">
            <label for="fname" class="control-label col-md-3 col-md-offset-1">Fullname</label>
            <div class="col-md-6">
                <input type="text" name="fname" id="chfname" class="form-control" disabled="disabled" />
            </div>
        </div>
        <div class="form-group">
            <label for="pass1" class="control-label col-md-3 col-md-offset-1">Enter Password</label>
            <div class="col-md-6">
                <input type="password" name="pass1" id="pass1" class="form-control" autofocus autocomplete="off" required />
            </div>
        </div>
        
        <div class="form-group">
            <label for="pass2" class="control-label col-md-3 col-md-offset-1">Confirm Password</label>
            <div class="col-md-6">
                <input type="password" name="pass2" id="pass2" class="form-control" autofocus autocomplete="off" required />
            </div>
        </div>
        <p id=pass_hint></p>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="changePassBtn">Save changes</button>        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>