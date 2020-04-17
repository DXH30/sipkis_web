<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPKIS | Ganti Password</title>

    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?= base_url(); ?>assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?= base_url(); ?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?= base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="<?= base_url() ?>assets/img/profile_small.jpg" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><?= $username ?></span>
                                <?php
                                if ($userlevel == "provinsi") {
                                    $userlevel = $provinsi;
                                }
                                ?>
                                <span class="text-muted text-xs block"><?= $userlevel ?></span>
                            </a>
                        </div>
                        <div class="logo-element">
                            SIPKIS
                        </div>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/admin"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Statistik</span></a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url() ?>index.php/profil"><i class="fa fa-wrench"></i> <span class="nav-label">Edit Profil</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Formulir</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url() ?>index.php/form/usaha_pariwisata">Form Isian Usaha Pariwisata</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/desa_wisata">Form Isian Desa Wisata</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/usaha_ekonomi_kreatif">Form Isian Usaha Ekonomi Kreatif</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/usaha_informal">Form Isian Usaha Informal</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk">Form Isian Tenaga Kerja PHK</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/chgpwd"><i class="fa fa-key"></i> <span class="nav-label">Ganti Password</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>index.php/login/logout"><i class="fa fa-diamond"></i> <span class="nav-label">Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Edit Profil</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>index.php/admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <strong>Edit Profil</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Ganti Password</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <?php if ($profil != null) : ?>
                                <form method="post" action="<?= base_url() ?>index.php/profil/edit" onsubmit="validasipassword()">
                                <?php elseif ($profil == null) : ?>
                                    <form method="post" action="<?= base_url() ?>index.php/profil/input" onsubmit="validasipassword()">
                                    <?php endif ?>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Institusi</label>
                                        <div class="col-sm-10"><input type="text" name="institusi" class="form-control" value="<?= $profil['institusi'] ?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10"><input type="email" name="email" class="form-control" value="<?= $profil['email'] ?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Website</label>
                                        <div class="col-sm-10"><input type="text" name="website" class="form-control" value="<?= $profil['website'] ?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">No WA</label>
                                        <div class="col-sm-10"><input type="number" name="no_wa" class="form-control" value="0<?= $profil['no_wa'] ?>"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10"><input type="number" name="no_telp" class="form-control" value="0<?= $profil['no_telp'] ?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                    </div>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?= base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });

        function validasipassword() {
            alert("submit");
            var password_baru = $(#password_baru).text();
            var password_baru_k = $(#password_baru_k).text();
            if (password_baru == password_baru_k) {
                alert("Konfirmasi password tidak sama");
                return false;
            } else {
                return true;
            }
        };
    </script>
</body>

</html>