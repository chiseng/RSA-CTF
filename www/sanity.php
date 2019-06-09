

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sanity Check</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php">Admin Dashboard</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <a class="nav-link" href="index.php">
        <i class="fa fa-fw fa-dashboard"></i>
        <span class="nav-link-text">Dashboard</span>
      </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
      <a class="nav-link" href="sanity.php">
        <i class="fa fa-check-square"></i>
        <span class="nav-link-text">Sanity Check</span>
      </a>
    </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
      <a class="nav-link" href="fileupload.php">
        <i class="fa fa-check-square"></i>
        <span class="nav-link-text">File Upload</span>
      </a>
    </li>
  </ul>
  <ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
      <a class="nav-link text-center" id="sidenavToggler">
        <i class="fa fa-fw fa-angle-left"></i>
      </a>
    </li>
  </ul>
  <div class="card-header">
    Enter your server's IP to perform a sanity check
  <form name=ping action=# method=post>
      <p>
        Enter an IP address:
        <input type=text name=ip size=30>
        <input type=submit name=Submit value=Submit>
      </p>
  <?php  
  $sanitization= array(
    '|',
    'nc' ,
    '/bin/sh' ,
    ';' ,
    'python' ,
    'perl' ,
    'whoami' ,
    'ls' ,
    'bash' ,
    'socket' ,
    '/tmp' ,
    'exec' ,
    '`' ,
    '/bin/bash' ,
  )
  $ip=str_replace($sanitization, "", $_GET['ip'])
  $cmd=shell_exec("ping -c 2 ".$ip);
  $html .= "<pre>{$cmd}</pre>";
?>
</form>
{$html}
</div>




