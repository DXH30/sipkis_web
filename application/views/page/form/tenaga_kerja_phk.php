<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SIPKIS | Form Tenaga Kerja PHK</title>

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
                    <li>
                        <a href="<?= base_url() ?>index.php/profil"><i class="fa fa-wrench"></i> <span class="nav-label">Edit Profil</span></a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Formulir</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?= base_url() ?>index.php/form/usaha_pariwisata">Form Isian Usaha Pariwisata</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/desa_wisata">Form Isian Desa Wisata</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/usaha_ekonomi_kreatif">Form Isian Usaha Ekonomi Kreatif</a></li>
                            <li><a href="<?= base_url() ?>index.php/form/usaha_informal">Form Isian Usaha Informal</a></li>
                            <li class="active"><a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk">Form Isian Tenaga Kerja PHK</a></li>
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
                    <h2>Form Isian Tenaga Kerja PHK</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>index.php/admin">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Formulir</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Form Isian Desa Wisata</strong>
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
                            <h5>Form Isian Desa Wisata</h5>
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
                            <?php if (isset($edit)) : ?>
                                <form method="post" action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/4">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                <?php else : ?>
                                    <form method="post" action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/1">
                                    <?php endif ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tipe</label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" name="tipe_id">
                                                <?php
                                                foreach ($tipe_usaha as $row) {
                                                    if (isset($tipe_id) && ($tipe_id == $row['id'])) :
                                                ?>
                                                        <option value="<?= $row['id'] ?>" selected><?= $row['tipe_usaha'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $row['id'] ?>"><?= $row['tipe_usaha'] ?></option>
                                                    <?php endif ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="<?php if (isset($nama)) echo $nama; ?>">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-10"><input type="text" name="tempat_lahir" value="<?php if (isset($tempat_lahir)) {
                                                                                                                    echo $tempat_lahir;
                                                                                                                } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10"><input type="date" name="tanggal_lahir" value="<?php if (isset($tanggal_lahir)) {
                                                                                                                    echo $tanggal_lahir;
                                                                                                                } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10"><input type="text" name="nik" value="<?php if (isset($nik)) {
                                                                                                        echo $nik;
                                                                                                    } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Telp</label>
                                        <div class="col-sm-10"><input type="number" name="telp" value="<?php if (isset($telp)) {
                                                                                                            echo $telp;
                                                                                                        } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Whatsapp</label>
                                        <div class="col-sm-10"><input type="number" name="whatsapp" value="<?php if (isset($whatsapp)) {
                                                                                                                echo $whatsapp;
                                                                                                            } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10"><input type="email" name="email" value="<?php if (isset($email)) {
                                                                                                            echo $email;
                                                                                                        } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Jabatan</label>
                                        <div class="col-sm-10"><input type="text" name="jabatan" value="<?php if (isset($jabatan)) {
                                                                                                            echo $jabatan;
                                                                                                        } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Sertifikat</label>
                                        <div class="col-sm-10"><input type="text" name="sertifikat" value="<?php if (isset($sertifikat)) {
                                                                                                                echo $sertifikat;
                                                                                                            } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Masa Kerja (Tahun)</label>
                                        <div class="col-sm-10"><input type="number" name="masa_kerja" value="<?php if (isset($masa_kerja)) {
                                                                                                                    echo $masa_kerja;
                                                                                                                } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10"><input type="text" name="keterangan" value="<?php if (isset($keterangan)) {
                                                                                                                echo $keterangan;
                                                                                                            } ?>" class="form-control"></div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <?php
                                            if (isset($prov_id)) {
                                            ?>
                                                <input type="hidden" name="prov_id" value="<?= $prov_id ?>" class="form-control">
                                            <?php
                                            }
                                            ?>
                                            <?php if (isset($edit)) : ?>
                                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                            <?php else : ?>
                                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                                            <?php endif ?>
                                        </div>
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
    </script>
</body>

</html>