<?php

namespace lib;

spl_autoload_extensions('.php');
spl_autoload_register();

session_start();

require 'config.php';

// authentification
if (isset($_SESSION['authentificated']) && $_SESSION['authentificated']) {
  if (empty($_GET['page'])) $_GET['page'] = 'home';
  $_GET['page'] = htmlspecialchars($_GET['page']);
  $_GET['page'] = str_replace("\0", '', $_GET['page']);
  $_GET['page'] = str_replace(DIRECTORY_SEPARATOR, '', $_GET['page']);
  $display = true;
  function is_active($page) {
    if ($page == $_GET['page'])
      echo ' class="active"';
  }
}
else {
  $_GET['page'] = 'login';
  $display = false;
}

$page = 'pages'. DIRECTORY_SEPARATOR.$_GET['page']. '.php';
$page = file_exists($page) ? $page : 'pages'. DIRECTORY_SEPARATOR .'404.php';

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo strtoupper(gethostname()); ?></title>
    <meta name="author" content="Nicolas Devenet" />
    <meta name="author" content="Jose Antonio Jamilena Daza" />
    <meta name="robots" content="noindex, nofollow, noarchive" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="icon" type="image/png" href="img/favicon.ico" />
    <!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="css/raspcontrol.css" rel="stylesheet" media="screen" />
  </head>

  <body>

    <header>
      <div class="container">
        <a href="<?php echo INDEX; ?>"><img src="img/raspcontrol.png" alt="rbpi" /></a>
        <h1><a href="<?php echo INDEX; ?>">&nbsp;<?php echo strtoupper(gethostname()); ?></a></h1>
        <h2>&nbsp;&nbsp;&nbsp;<?php echo php_uname(); ?></h2>
      </div>
    </header>

    <?php if ($display) : ?>

    <div class="navbar navbar-static-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="nav-collapse collapse">
			  <ul class="nav">
				<li<?php is_active('home'); ?>><a href="<?php echo INDEX; ?>"><i class="icon-home icon-white"></i> Home</a></li>
				<li<?php is_active('details'); ?>><a href="<?php echo DETAILS; ?>"><i class="icon-search icon-white"></i> Details</a></li>
				<li<?php is_active('services'); ?>><a href="<?php echo SERVICES; ?>"><i class="icon-cog icon-white"></i> Services</a></li>
				<li<?php is_active('disks'); ?>><a href="<?php echo DISKS; ?>"><i class="icon-disks icon-white"></i> Disks</a></li>
				<li<?php is_active('nmap'); ?>><a href="<?php echo NMAP; ?>"><i class="icon-tasks icon-white"></i> NMAP</a></li>
				<li<?php is_active('port_status'); ?>><a href="<?php echo PORT_STATUS; ?>"><i class="icon-certificate icon-white"></i> Port Status</a></li>
                                <li<?php is_active('camera'); ?>><a href="<?php echo CAMERA; ?>"><i class="icon-camera icon-white"></i>Camera</a></li>
				<li<?php is_active('torrent'); ?>><a href="<?php echo TORRENT; ?>"><i class="icon-arrow-down icon-white"></i>Torrent</a></li>
			  </ul>
			  <ul class="nav pull-right">
				<li><a href="<?php echo LOGOUT; ?>"><i class="icon-off icon-white"></i> Logout</a></li>
			  </ul>
          </div>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <div id="content">
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="container">
        <div class="alert alert-error">
          <strong>Oups!</strong> <?php echo $_SESSION['message']; ?>
        </div>
      </div>
      <?php unset($_SESSION['message']); } ?>

<?php
  include $page;
?>

    </div> <!-- /content -->

    <!--<footer>
      <div class="container">
        <p>Powered by <a href="https://github.com/josejamilena/Raspcontrol">Raspcontrol</a>.</p>
        <p>Sources are available on <a href="https://github.com/josejamilena/Raspcontrol">Github</a>.</p>
      </div>
    </footer>-->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<?php
		// load specific scripts
		if ('details' === $_GET['page']) {
			echo '   <script src="js/details.js"></script>';
		}
	?>
  </body>
</html>
