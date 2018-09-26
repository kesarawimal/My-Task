<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="My Task is web base application which can automated your projects.
And also My Task can manage your tasks.">
    <meta name="Keywords" content="My Task, Tasks, Projects, Tasker, auto task, free">
    <meta name="author" content="Kesara Wimal">

    <title>Blog Masters</title>

    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
	<title>MY TASK</title>
	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

</head>
<body>
<!-- navigation start -->	

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>home">MY TASK</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="<?php if($this->uri->segment(1) == 'home') echo 'active'; ?>"><a href="<?php echo base_url(); ?>home">HOME</a></li>
      <li class="<?php if($this->uri->segment(2) == 'register') echo 'active'; ?>"><a href="<?php echo base_url(); ?>users/register"><span class="glyphicon glyphicon-user"></span> REGISTER</a></li>
      <li class="<?php if($this->uri->segment(1) == 'projects') echo 'active'; ?>"><a href="<?php echo base_url(); ?>projects">PROJECTS</a></li>
      <li class="<?php if($this->uri->segment(1) == 'tasks') echo 'active'; ?>"><a href="<?php echo base_url(); ?>tasks">TASKS</a></li>
      <!-- <li><a href="#">Page 3</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if ($this->session->userdata('logged_in')) {
        echo '<li><a href="' . base_url() . 'users/logout"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a></li>';
      } else {
        echo '<li><a href="' . base_url() . 'home"><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>';
      }?> 
    </ul>
    </div>
  </div>
</nav>
<!-- navigation end -->	

	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				
				<?php $this->load->view('users/login_view'); ?>

			</div>
		
			<div class="col-sm-9">
				
				<?php $this->load->view($main_view); ?>

			</div>
		</div>
      </div>
            <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted pull-right">Copyright © MY TASK 2017  | Powered By <a href="https://codeigniter.com/">CodeIgniter</a></span>
      </div>
    </footer>


</body>
</html>
<style>
  /* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  margin-bottom: 60px; /* Margin bottom by footer height */
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}

</style>