<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPKIS | Login</title>

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
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
            <p>Login in. Untuk melanjutkan.</p>
            <form class="m-t" role="form" action="<?= base_url(); ?>index.php/login/submit" method="post">
                <div class="form-group">
                    <?php if (isset($pesan)) : ?>
                        <div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-exclamation-triangle"></i> <strong><?= $pesan ?></strong></div>
                    <?php endif; ?>
                    <!-- <input type="text" class="form-control" id="username" name="username" placeholder="Username" required=""> -->
                    <select name="username" class="form-control">
                        <option value="admin">Admin</option>
                        <?php
                        foreach ($provinsi as $prov) {
                        ?>
                            <option value="<?= $prov['username'] ?>"><?= $prov['provinsi'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <!-- <button type="button" id="provinsiButton" class="btn btn-info block full-width m-b">Login Provinsi</button> -->

                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <!-- <a href="#"><small>Lupa password?</small></a> -->
<!--                <p class="text-muted text-center"><small>Belum Punya akun?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register">Buat akun</a> -->
            </form>
            <p class="m-t"> <small>Sistem Pelaporan Kondisi Industri dan SDM Pariwisata &copy; Primakom 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>

</body>

</html>
