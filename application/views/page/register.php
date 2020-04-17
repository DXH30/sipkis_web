<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPKIS | Register</title>

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
                <!-- <h1 class="logo-name"></h1> -->
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url() ?>assets/img/logo.png" width="224px">
                </a>
            </div>
            <h3>Selamat datang di SIPKIS</h3>
            <p>
                Sistem Pelaporan Kondisi Industri dan Sdm Pariwisata Indonesia
                <!-- 2. Sistim Pendukungan Akomodasi, Transportasi, F&B Kemenparekraf -->
            </p>
            <form action="<?=base_url();?>index.php/register/submit" class="m-t" role="form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Sudah punya akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="<?=base_url()?>index.php/login">Login</a>
            </form>
            <p class="m-t"> <small>Sistem Pelaporan Kondisi Industri dan SDM Pariwisata &copy; Primakom 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>