<!doctype html>
<html lang="en">
 
<head>
    <base href="<?php echo base_url(); ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?> -  Food Resto</title>
    <link rel="stylesheet" href="wp-content/vendor/bootstrap/css/bootstrap.min.css">
    <link href="wp-content/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="wp-content/libs/css/style.css">
    <link rel="stylesheet" href="wp-content/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="login"><img class="logo-img img-fluid" src="wp-content/images/food-resto.png" alt="logo"></a></div>
            <div class="card-body">
                <form action="" method="post">
                    <?php if($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error');?>
                    </div>
                    <?php endif; ?>
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username" autofocus="">
                        <small class="text-danger"><?php echo form_error('username'); ?></small>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                        <small class="text-danger"><?php echo form_error('password'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                </form>
            </div>
        </div>
    </div>
  
    <script src="wp-content/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="wp-content/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>