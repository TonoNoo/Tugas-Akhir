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
    <style>
        .content {
          display: none;
        }
        .noContent {
          color: #000 !important;
          background-color: transparent !important;
          pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href=""> Food Resto</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Menu</h2>
                            </div>
                        </div>
                    </div>
                    