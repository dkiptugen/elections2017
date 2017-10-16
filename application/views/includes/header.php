<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Elections</title>

	<link rel="stylesheet" href="<?=base_url("assets/Gentelella/bootstrap/dist/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?=base_url("assets/Gentelella/css/custom.min.css"); ?>">
	<link rel="stylesheet" href="<?=base_url("assets/css/font-awesome.min.css"); ?>">
	
	<link rel="stylesheet" href="<?=base_url("assets/css/custom.css"); ?>">
	
 
<!--[if lt IE 9]>
<script src="../assets/js/ie8-responsive-file-warning.js"></script>
<![endif]-->
 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

	<body class="nav-md">
    <div class="container body">
	<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="<?=site_url("home"); ?>" class="site_title">Elections</a>
        </div>
 
        <div class="profile"><!--img_2 -->
            <div class="profile_pic">
                <img src="<?=$this->session->userdata("userimg"); ?>" alt="profile" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->userdata("name"); ?></h2>
            </div>
        </div>
 
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                	<li><a href="index.html">Dashboard</a></li>
                    <li><a><i class="fa fa-home"></i>Gubernatorial<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('home/governors/2013'); ?>">2013</a></li>
                            <li><a href="<?=site_url('home/governors/2017'); ?>">2017</a></li>
                        </ul>
                    </li>
                   
                    <li><a><i class="fa fa-home"></i>Presidential<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url('home/president/1'); ?>">2013</a></li>
                            <li><a href="<?=site_url('home/president/3'); ?>">2017</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Accounts</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-cog"></i> Manage Account<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url("profile"); ?>">My Profile</a></li>
                            <li><a href="<?=site_url("managepassword"); ?>">Password</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <div class="menu_section">
                <h3>Admin</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-cogs"></i>Accounts<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?=site_url("adduser"); ?>">Add Users</a></li>
                            <li><a href="<?=site_url("manageaccounts"); ?>">Manage users</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
 
        </div>
 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>