<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=site_url('cms'); ?>" class="site_title"><?=$title; ?></a>
        </div>
 
        <div class="profile"><!--img_2 -->
            <div class="profile_pic">
                <img src="<?=site_url('images/'.$this->session->userdata('user_image')); ?>" alt="<?=$this->session->userdata('Name'); ?>" class="img-circle profile_img" style='height:70px; width:70px;'>
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->userdata('Name'); ?></h2>
            </div>
        </div>
 
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="clearfix"></div>
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=site_url('cms'); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                  <li><a><i class="fa fa-plus"></i>Counties<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('candidates/county'); ?>">Candidates</a></li>
                            <li><a href="<?=site_url('results/county'); ?>">Results</a></li>
                        </ul>
                  </li>
                  <li><a><i class="fa fa-plus"></i>Constituencies<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('candidates/constituency'); ?>">Candidates</a></li>
                            <li><a href="<?=site_url('results/constituency'); ?>">Results</a></li>
                        </ul>
                  </li>   
                  <li><a><i class="fa fa-plus"></i>Wards<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('candidates/ward'); ?>">Candidates</a></li>
                            <li><a href="<?=site_url('results/ward'); ?>">Results</a></li>
                        </ul>
                  </li>    
                </ul>
            </div>
            <div class="menu_section">
                <h3>Users</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-gears"></i>Manage<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">E-commerce</a></li>
                            
                        </ul>
                    </li>
                   
                    
                </ul>
            </div>
 
        </div>
 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="fa foff-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=site_url('images/'.$this->session->userdata('user_image')); ?>" alt="<?=$this->session->userdata('Name'); ?>"><?=$this->session->userdata('Name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href=""> Profile</a></li>
                    
                    
                    <li><a href="<?=site_url('logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->