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
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>User Status</th>
                            <th>Password Status</th>                            
                            <th></th>
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
                                                    <li><a href="#">Change Password</a></li>
                                                    <li><a href="#">Update User</a></li>
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
                            <th></th>
                        </tr>
                    </tfoot>

                </table>

            </div>
        </div>
    </div>
</div>