<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <title><?=$title; ?></title>
     <?php header('Access-Control-Allow-Origin: *');   ?>
    <!-- Bootstrap core CSS -->
     
     <!-- Bootstrap -->
    <link href="<?=base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
   <!--  <link href="<?=base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet"> -->
    <!-- NProgress -->
    <link href="<?=base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="<?=base_url('assets/vendors/dropzone/dist/min/dropzone.min.css'); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
     
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
<script src="https://use.fontawesome.com/63d8223e23.js"></script>
  </head>

  <body class="login">
    <div>
      
      <div class="login_wrapper">
        <div class="animate form login_form">
          
          <section class="login_content">
            <form method="post" action="<?=site_url('changepassword'); ?>">
              <h1>Reset Password</h1>
              
              <div>
                <input type="email" class="form-control" placeholder="Email" required="Email" name="email" />
              </div>
              
              <div>
                <button class="btn btn-default submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="<?=site_url('login'); ?>" class="to_login"> Log in </a>
                </p>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
