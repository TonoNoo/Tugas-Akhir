<?php 

$menu       = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));

 ?>
<!doctype html>
<html lang="en">
 
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="wp-content/vendor/bootstrap/css/bootstrap.min.css">
    <link href="wp-content/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="wp-content/libs/css/style2.css">
    <link rel="stylesheet" href="wp-content/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="wp-content/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="wp-content/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="wp-content/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="wp-content/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="wp-content/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <title><?php echo $title; ?> -  Food Resto</title>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <?php if($this->session->userdata('level') == 1) { ?>
                    <a class="navbar-brand" href="admin/dashboard"> Food Resto</a>
                <?php }else if($this->session->userdata('level') == 2) { ?>
                    <a class="navbar-brand" href="kasir/dashboard"> Food Resto</a>
                <?php }else { ?>
                    <a class="navbar-brand" href="koki/dashboard"> Food Resto</a>
                <?php } ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="wp-content/images/<?php echo $me['admin_foto']; ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $me['admin_nama']; ?> </h5>
                                </div>
                                <a class="dropdown-item" href="kasir/profil"><i class="fas fa-user mr-2"></i>Profil</a>
                                <a class="dropdown-item" href="kasir/password"><i class="fas fa-key mr-2"></i>Password</a>
                                <a class="dropdown-item" href="kasir/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <?php if($this->uri->segment(2) == 'dashboard') { ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header">
                                    <h2 class="pageheader-title">Selamat Datang di Aplikasi Food Restaurant - Kasir</h2>
                                </div>
                            </div>
                        </div>
                    <?php }else { ?>
                    <?php } ?>
                    