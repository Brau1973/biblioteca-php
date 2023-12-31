<?PHP ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/alerts.css">
    <title>Biblioteca</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body class="sidebar-mini fixed">
    <div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a class="logo" href="index.php">Biblioteca</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <!--<li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>-->
              <!-- User Menu-->
              <?PHP if(isset($_SESSION['id'])){?>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu">
                  <!--<li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>-->
                  <li><a href="?c=Usuario&a=FormCrear&id=<?=$_SESSION['id']?>"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                  <li><a href="?c=Usuario&a=Logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                </ul>
              </li>
              <?PHP }?>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <?PHP if(isset($_SESSION['id'])){?>
          <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="<?=$_SESSION['imagen']?>" alt="User Image"></div>
            <div class="pull-left info">
              <p><?=$_SESSION['usuario']?></p>
              <!-- <p class="designation">Frontend Developer</p> -->
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.php"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li class="treeview"><a href="#"><i class="fa fa-book"></i><span>Libros</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?c=libro"><i class="fa fa-circle-o"></i>Listar</a></li>
              </ul>
            </li>
            <li class="treeview"><a href="#"><i class="fa fa-get-pocket"></i><span>Prestamos</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="?c=prestamo"><i class="fa fa-circle-o"></i> Listar</a></li>
              </ul>
            </li>
          </ul>
          <?PHP }?>
        </section>
      </aside>