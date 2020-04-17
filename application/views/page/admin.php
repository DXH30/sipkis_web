<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPKIS | Statistik</title>

    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="<?= base_url() ?>assets/img/profile_small.jpg" />
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
                    <li class="active">
                        <a href="<?= base_url() ?>index.php/admin"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Statistik</span></a>
                    </li>
                    <li>
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
            <div class="wrapper wrapper-content animated fadeIn">
                <div class="p-w-md m-t-sm">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Perusahaan terdampak</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                            <canvas id="barChart" height="149" width="321" style="display: block; width: 321px; height: 149px;"></canvas>
                                        </div>
                                        <div class="col-lg-3">
                                            <ul class="stat-list">
                                                <li>
                                                    <h2 class="no-margins">23</h2>
                                                    <small>Peningkatan jumlah perusahaan terdampak</small>
                                                    <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 48%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">4</h2>
                                                    <small>Penurunan jumlah perusahaan terdampak</small>
                                                    <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 60%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">90</h2>
                                                    <small>Total perusahaan</small>
                                                    <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 22%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <canvas id="pariwisataChart" height="300" width="321"></canvas>
                                        </div>
                                        <div class="col-lg-6">
                                            <canvas id="ekrafChart" height="300" width="321"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Pertanyaan</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <h5>Whatsapp : <a href="https://wa.me/6281285004783">+62 812-8500-4783</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Pekerja Terdampak</h5>
                                    <div class="float-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-white active" id="harianButton">Harian</button>
                                            <button type="button" class="btn btn-xs btn-white" id="bulananButton">Bulanan</button>
                                            <button type="button" class="btn btn-xs btn-white" id="tahunanButton">Tahunan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="flot-chart">
                                                <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="526" height="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 526.5px; height: 200px;"></canvas>
                                                    <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 55px; text-align: center;">Jan 03</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 102px; text-align: center;">Jan 06</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 148px; text-align: center;">Jan 09</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 195px; text-align: center;">Jan 12</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 241px; text-align: center;">Jan 15</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 287px; text-align: center;">Jan 18</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 334px; text-align: center;">Jan 21</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 380px; text-align: center;">Jan 24</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 427px; text-align: center;">Jan 27</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 43px; top: 184px; left: 473px; text-align: center;">Jan 30</div>
                                                        </div>
                                                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 171px; left: 19px; text-align: right;">0</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 131px; left: 6px; text-align: right;">250</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 91px; left: 6px; text-align: right;">500</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 51px; left: 6px; text-align: right;">750</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 11px; left: 0px; text-align: right;">1000</div>
                                                        </div>
                                                        <div class="flot-y-axis flot-y2-axis yAxis y2Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 171px; left: 514px;">0</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 143px; left: 514px;">5</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 514px;">10</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 86px; left: 514px;">15</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 57px; left: 514px;">20</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 29px; left: 514px;">25</div>
                                                            <div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 514px;">30</div>
                                                        </div>
                                                    </div><canvas class="flot-overlay" width="526" height="200" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 526.5px; height: 200px;"></canvas>
                                                    <div class="legend">
                                                        <div style="position: absolute; width: 114px; height: 36px; top: 13px; left: 35px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div>
                                                        <table style="position:absolute;top:13px;left:35px;;font-size:smaller;color:#545454">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #000000;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #1ab394;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Number of orders</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="legendColorBox">
                                                                        <div style="border:1px solid #000000;padding:1px">
                                                                            <div style="width:4px;height:0;border:5px solid #1C84C6;overflow:hidden"></div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="legendLabel">Payments</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <ul class="stat-list">
                                                <li>
                                                    <h2 class="no-margins">2,346</h2>
                                                    <small>Peningkatan jumlah pekerja</small>
                                                    <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 48%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">4,422</h2>
                                                    <small>Penurunan jumlah pekerja</small>
                                                    <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 60%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h2 class="no-margins ">9,180</h2>
                                                    <small>Total pekerja</small>
                                                    <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 22%;" class="progress-bar"></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Usaha Pariwisata</h5>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Tipe Usaha</th>
                                                    <th>Nama Usaha</th>
                                                    <th>Jenis Usaha</th>
                                                    <th>Alamat</th>
                                                    <th>Jumlah Tenaga Kerja</th>
                                                    <th>Jumlah Tenaga Kerja PHK</th>
                                                    <th>Kondisi</th>
                                                    <th>Estimasi kerugian </th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usaha_pariwisata as $row) { ?>
                                                    <tr>
                                                        <form action="<?= base_url() ?>index.php/form/usaha_pariwisata/2" method="post">
                                                            <td width="10%">
                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                <a href="<?= base_url() ?>index.php/form/usaha_pariwisata/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                            </td>
                                                            <td><?= $row['tipe_usaha'] ?></td>
                                                            <td><?= $row['nama_usaha'] ?></td>
                                                            <td><?= $row['jenis_usaha'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                            <td><?= $row['jumlah_pekerja'] ?></td>
                                                            <td><?= $row['jumlah_pekerja_phk'] ?></td>
                                                            <td><?= $row['kondisi'] ?></td>
                                                            <td>Rp <?= number_format($row['estimasi_kerugian'], 0, ".", ",") ?></td>
                                                            <td><?= $row['keterangan'] ?></td>
                                                            <?php if ($userlevel == "admin") : ?>
                                                                <td><?= $row['provinsi'] ?></td>
                                                            <?php endif ?>
                                                        </form>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/usaha_pariwisata" class="btn btn-success">+</a>
                                    <h4>Tenaga Kerja PHK</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>NIK</th>
                                                    <th>Telp</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
                                                    <th>Jabatan</th>
                                                    <th>Sertifikat</th>
                                                    <th>Masa Kerja (tahun)</th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tenaga_kerja_phk as $row) { ?>
                                                    <?php if ($row['tipe_id'] == '1') : ?>
                                                        <tr>
                                                            <form action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/2" method="post">
                                                                <td width="10%">
                                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                                </td>
                                                                <td><?= $row['nama'] ?></td>
                                                                <td><?= $row['tempat_lahir'] ?></td>
                                                                <td><?= $row['tanggal_lahir'] ?></td>
                                                                <td><?= $row['nik'] ?></td>
                                                                <td><?= $row['telp'] ?></td>
                                                                <td><?= $row['whatsapp'] ?></td>
                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['jabatan'] ?></td>
                                                                <td><?= $row['sertifikat'] ?></td>
                                                                <td><?= $row['masa_kerja'] ?></td>
                                                                <td><?= $row['keterangan'] ?></td>
                                                                <?php if ($userlevel == "admin") : ?>
                                                                    <td><?= $row['provinsi'] ?></td>
                                                                <?php endif ?>
                                                            </form>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk?tipe_id=1" class="btn btn-warning">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Desa Wisata</h5>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama Desa Wisata</th>
                                                    <th>Alamat</th>
                                                    <th>Jumlah Tenaga Kerja</th>
                                                    <th>Jumlah Tenaga Kerja PHK</th>
                                                    <th>Kondisi</th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($desa_wisata as $row) { ?>
                                                    <tr>
                                                        <form action="<?= base_url() ?>index.php/form/usaha_informal/2" method="post">
                                                            <td width="10%">
                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                <a href="<?= base_url() ?>index.php/form/desa_wisata/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                            </td>
                                                            <td><?= $row['nama_desa_wisata'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                            <td><?= $row['jumlah_pekerja'] ?></td>
                                                            <td><?= $row['jumlah_pekerja_phk'] ?></td>
                                                            <td><?= $row['kondisi'] ?></td>
                                                            <td><?= $row['keterangan'] ?></td>
                                                            <?php if ($userlevel == "admin") : ?>
                                                                <td><?= $row['provinsi'] ?></td>
                                                            <?php endif ?>
                                                        </form>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/desa_wisata" class="btn btn-success">+</a>
                                    <h4>Tenaga Kerja PHK</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>NIK</th>
                                                    <th>Telp</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
                                                    <th>Jabatan</th>
                                                    <th>Sertifikat</th>
                                                    <th>Masa Kerja (tahun)</th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tenaga_kerja_phk as $row) { ?>
                                                    <?php if ($row['tipe_id'] == '2') : ?>
                                                        <tr>
                                                            <form action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/2" method="post">
                                                                <td width="10%">
                                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                                </td>
                                                                <td><?= $row['nama'] ?></td>
                                                                <td><?= $row['tempat_lahir'] ?></td>
                                                                <td><?= $row['tanggal_lahir'] ?></td>
                                                                <td><?= $row['nik'] ?></td>
                                                                <td><?= $row['telp'] ?></td>
                                                                <td><?= $row['whatsapp'] ?></td>
                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['jabatan'] ?></td>
                                                                <td><?= $row['sertifikat'] ?></td>
                                                                <td><?= $row['masa_kerja'] ?></td>
                                                                <td><?= $row['keterangan'] ?></td>
                                                                <?php if ($userlevel == "admin") : ?>
                                                                    <td><?= $row['provinsi'] ?></td>
                                                                <?php endif ?>
                                                            </form>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk?tipe_id=2" class="btn btn-warning">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Usaha Ekonomi Kreatif</h5>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama Usaha</th>
                                                    <th>Alamat</th>
                                                    <th>Tipe Usaha</th>
                                                    <th>Jumlah Tenaga Kerja</th>
                                                    <th>Jumlah Tenaga Kerja PHK</th>
                                                    <th>Kondisi</th>
                                                    <th>Estimasi kerugian </th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usaha_ekonomi_kreatif as $row) { ?>
                                                    <tr>
                                                        <form action="<?= base_url() ?>index.php/form/usaha_ekonomi_kreatif/2" method="post">
                                                            <td width="10%">
                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                <a href="<?= base_url() ?>index.php/form/usaha_ekonomi_kreatif/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                            </td>
                                                            <td><?= $row['nama_usaha'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                            <td><?= $row['tipe_usaha'] ?></td>
                                                            <td><?= $row['jumlah_pekerja'] ?></td>
                                                            <td><?= $row['jumlah_pekerja_phk'] ?></td>
                                                            <td><?= $row['kondisi'] ?></td>
                                                            <td>Rp <?= number_format($row['estimasi_kerugian'], 0, ".", ",") ?></td>
                                                            <?php if ($userlevel == "admin") : ?>
                                                                <td><?= $row['provinsi'] ?></td>
                                                            <?php endif ?>
                                                            <td><?= $row['keterangan'] ?></td>
                                                        </form>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/usaha_ekonomi_kreatif" class="btn btn-success">+</a>
                                    <h4>Tenaga Kerja PHK</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>NIK</th>
                                                    <th>Telp</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
                                                    <th>Jabatan</th>
                                                    <th>Sertifikat</th>
                                                    <th>Masa Kerja (tahun)</th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tenaga_kerja_phk as $row) { ?>
                                                    <?php if ($row['tipe_id'] == '3') : ?>
                                                        <tr>
                                                            <form action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/2" method="post">
                                                                <td width="10%">
                                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                                </td>
                                                                <td><?= $row['nama'] ?></td>
                                                                <td><?= $row['tempat_lahir'] ?></td>
                                                                <td><?= $row['tanggal_lahir'] ?></td>
                                                                <td><?= $row['nik'] ?></td>
                                                                <td><?= $row['telp'] ?></td>
                                                                <td><?= $row['whatsapp'] ?></td>
                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['jabatan'] ?></td>
                                                                <td><?= $row['sertifikat'] ?></td>
                                                                <td><?= $row['masa_kerja'] ?></td>
                                                                <td><?= $row['keterangan'] ?></td>
                                                                <?php if ($userlevel == "admin") : ?>
                                                                    <td><?= $row['provinsi'] ?></td>
                                                                <?php endif ?>
                                                            </form>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk?tipe_id=2" class="btn btn-warning">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Usaha Informal</h5>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Pekerjaan</th>
                                                    <th>Alamat</th>
                                                    <th>Jumlah Tenaga Kerja</th>
                                                    <th>Jumlah Tenaga Kerja PHK</th>
                                                    <th>Kondisi</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usaha_informal as $row) { ?>
                                                    <tr>
                                                        <form action="<?= base_url() ?>index.php/form/usaha_informal/2" method="post">
                                                            <td width="10%">
                                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                <a href="<?= base_url() ?>index.php/form/usaha_informal/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                            </td>
                                                            <td><?= $row['pekerjaan'] ?></td>
                                                            <td><?= $row['alamat'] ?></td>
                                                            <td><?= $row['jumlah_pekerja'] ?></td>
                                                            <td><?= $row['jumlah_pekerja_phk'] ?></td>
                                                            <td><?= $row['kondisi'] ?></td>
                                                            <td><?= $row['keterangan'] ?></td>
                                                        </form>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/usaha_informal" class="btn btn-success">+</a>
                                    <h4>Tenaga Kerja PHK</h4>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa fa-wrench"></i></th>
                                                    <th>Nama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>NIK</th>
                                                    <th>Telp</th>
                                                    <th>Whatsapp</th>
                                                    <th>Email</th>
                                                    <th>Jabatan</th>
                                                    <th>Sertifikat</th>
                                                    <th>Masa Kerja (tahun)</th>
                                                    <th>Keterangan</th>
                                                    <?php if ($userlevel == "admin") : ?>
                                                        <th>Provinsi</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tenaga_kerja_phk as $row) { ?>
                                                    <?php if ($row['tipe_id'] == '4') : ?>
                                                        <tr>
                                                            <form action="<?= base_url() ?>index.php/form/tenaga_kerja_phk/2" method="post">
                                                                <td width="10%">
                                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk/3?id=<?= $row['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></button>
                                                                </td>
                                                                <td><?= $row['nama'] ?></td>
                                                                <td><?= $row['tempat_lahir'] ?></td>
                                                                <td><?= $row['tanggal_lahir'] ?></td>
                                                                <td><?= $row['nik'] ?></td>
                                                                <td><?= $row['telp'] ?></td>
                                                                <td><?= $row['whatsapp'] ?></td>
                                                                <td><?= $row['email'] ?></td>
                                                                <td><?= $row['jabatan'] ?></td>
                                                                <td><?= $row['sertifikat'] ?></td>
                                                                <td><?= $row['masa_kerja'] ?></td>
                                                                <td><?= $row['keterangan'] ?></td>
                                                                <?php if ($userlevel == "admin") : ?>
                                                                    <td><?= $row['provinsi'] ?></td>
                                                                <?php endif ?>
                                                            </form>
                                                        </tr>
                                                    <?php endif ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?= base_url() ?>index.php/form/tenaga_kerja_phk?tipe_id=2" class="btn btn-warning">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div>
                    <strong>Copyright</strong> Primakom &copy; 2020
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

    <!-- Flot -->
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>assets/js/inspinia.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- ChartJS-->
    <script src="<?= base_url() ?>assets/js/plugins/chartJs/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/palette.js"></script>
    <script>
        $(document).ready(function() {

            var sparklineCharts = function() {
                $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16, 8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };

            var sparkResize;

            $(window).resize(function(e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineCharts, 500);
            });

            sparklineCharts();




            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 20],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 7],
                [15, 8],
                [16, 12]
            ];
            var data2 = [
                [0, 0],
                [1, 2],
                [2, 7],
                [3, 4],
                [4, 11],
                [5, 4],
                [6, 2],
                [7, 5],
                [8, 11],
                [9, 5],
                [10, 4],
                [11, 1],
                [12, 5],
                [13, 2],
                [14, 5],
                [15, 2],
                [16, 0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis: {},
                yaxis: {},
                tooltip: false
            });
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7],
                [gd(2012, 1, 2), 6],
                [gd(2012, 1, 3), 4],
                [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9],
                [gd(2012, 1, 6), 7],
                [gd(2012, 1, 7), 5],
                [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7],
                [gd(2012, 1, 10), 8],
                [gd(2012, 1, 11), 9],
                [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4],
                [gd(2012, 1, 14), 5],
                [gd(2012, 1, 15), 11],
                [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8],
                [gd(2012, 1, 18), 11],
                [gd(2012, 1, 19), 11],
                [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6],
                [gd(2012, 1, 22), 8],
                [gd(2012, 1, 23), 11],
                [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7],
                [gd(2012, 1, 26), 9],
                [gd(2012, 1, 27), 9],
                [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5],
                [gd(2012, 1, 30), 8],
                [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800],
                [gd(2012, 1, 2), 500],
                [gd(2012, 1, 3), 600],
                [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500],
                [gd(2012, 1, 6), 456],
                [gd(2012, 1, 7), 800],
                [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467],
                [gd(2012, 1, 10), 876],
                [gd(2012, 1, 11), 689],
                [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500],
                [gd(2012, 1, 14), 600],
                [gd(2012, 1, 15), 700],
                [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345],
                [gd(2012, 1, 18), 888],
                [gd(2012, 1, 19), 888],
                [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987],
                [gd(2012, 1, 22), 444],
                [gd(2012, 1, 23), 999],
                [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786],
                [gd(2012, 1, 26), 666],
                [gd(2012, 1, 27), 888],
                [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178],
                [gd(2012, 1, 30), 555],
                [gd(2012, 1, 31), 993]
            ];

            var dataset = [{
                label: "Jumlah pekerja",
                data: data3,
                color: "#1ab394",
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 24 * 60 * 60 * 600,
                    lineWidth: 0
                }

            }, {
                label: "Jumlah pekerja terdampak",
                data: data2,
                yaxis: 2,
                color: "#1C84C6",
                lines: {
                    lineWidth: 1,
                    show: true,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.4
                        }]
                    }
                },
                splines: {
                    show: false,
                    tension: 0.6,
                    lineWidth: 1,
                    fill: 0.1
                },
            }];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null,
                previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });

        var barData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Perusahaan Terdampak",
                    backgroundColor: 'rgba(220, 220, 220, 0.5)',
                    pointBorderColor: "#fff",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Perusahaan tidak terdampak",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };

        var barOptions = {
            responsive: true,
            maintainAspectRatio: false,
        };

        var ctx2 = document.getElementById("barChart").getContext("2d");

        new Chart(ctx2, {
            type: 'bar',
            data: barData,
            options: barOptions,
        });

        BaOption = {
            legend: {
                display: true,
                position: 'left',
                alignment: 'start',
            },
            title: {
                text: "Usaha Pariwisata",
                display: true
            },
            responsive: true,
            maintainAspectRatio: true,
        };
        if ($(window).width() < 900) {
            BaOption.legend.position = 'bottom';
            document.getElementById('pariwisataChart').setAttribute("height", "500");
        }

        pariwisataData = {
            labels: [
                "Akomodasi",
                "Jasa Makanan dan Minuman",
                "Jasa Perjalanan Wisata",
                "Jasa Hiburan dan Rekreasi",
                "Objek/Daya Tarik/Kawasan Wisata",
                "MICE",
                "Jasa Transportasi Wisata",
                "Cinderamata",
                "Spa"
            ],
            datasets: [{
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40, 10, 20, 20],
                backgroundColor: [
                    "#fff",
                    "#faf",
                    "#fbf",
                    "#fcf",
                    "#fdf",
                    "#fef",
                    "#f0f",
                    "#f1f",
                    "#f2f",
                    "#f3f",
                ],
            }]
        };

        var lendata = pariwisataData.datasets[0].data.length;
        pariwisataData.datasets[0].backgroundColor = palette(['tol', 'qualitative'], lendata).map(function(hex) {
            return '#' + hex;
        });

        var ctx3 = document.getElementById("pariwisataChart").getContext("2d");
        new Chart(ctx3, {
            type: 'doughnut',
            data: pariwisataData,
            options: BaOption,
        });

        ekrafData = {
            labels: [
                "Aplikasi dan Pengembang Permainan",
                "Arsitektur",
                "Desain Interior",
                "Desain Komunikasi Visual",
                "Desain Produk",
                "Fashion",
                "Film, Animasi, dan Video",
                "Fotografi",
                "Kriya",
                "Kuliner",
                "Musik",
                "Penerbitan",
                "Periklanan",
                "Seni Pertunjukan",
                "Seni Rupa",
                "Televisi dan Radio"
            ],
            datasets: [{
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40, 10, 20, 20, 12, 23, 43, 66, 23, 12],
                backgroundColor: [
                    "#ff0",
                    "#af0",
                    "#bf0",
                    "#cf0",
                    "#df0",
                    "#ef0",
                    "#0f0",
                    "#1f0",
                    "#2f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                    "#3f0",
                ],
            }]
        };

        CaOption = {
            legend: {
                display: true,
                position: 'left',
                alignment: 'start',
            },
            title: {
                text: "Usaha Ekonomi Kreatif",
                display: true
            },
            responsive: true,
            maintainAspectRatio: true,
        };
        if ($(window).width() < 900) {
            CaOption.legend.position = 'bottom';
            document.getElementById('ekrafChart').setAttribute("height", "500");
        }
        var lendata = ekrafData.datasets[0].data.length;
        ekrafData.datasets[0].backgroundColor = palette(['tol', 'qualitative'], lendata).map(function(hex) {
            return '#' + hex;
        });
        var ctx4 = document.getElementById("ekrafChart").getContext("2d");
        new Chart(ctx4, {
            type: 'doughnut',
            data: ekrafData,
            options: CaOption,
        });
    </script>
</body>

</html>