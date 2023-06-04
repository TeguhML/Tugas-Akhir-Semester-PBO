<?php
    // session start
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require 'panggil.php';

    // Proses penghapusan data
    if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {
        $idHapus = $_POST['hapusid'];
        $proses->hapus_data('tbl_penghuni', 'id_login', $idHapus);
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Penghuni kosan mewah tapi murah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Body */
        body {
            background-image: url('pisang.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Container */
        .container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* Card */
        .card {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
        }

        .card-title {
            margin-bottom: 0;
        }

        .card-body {
            padding: 20px;
        }

        /* Buttons */
        .btn-edit {
            background-color: #28a745;
            color: #fff;
            border-color: #28a745;
        }

        .btn-hapus {
            background-color: #dc3545;
            color: #fff;
            border-color: #dc3545;
        }

        /* Alert */
        .alert {
            margin-top: 20px;
            text-align: center;
        }

        .alert h3 {
            margin-bottom: 0;
        }

        /* Separator Line */
        .separator {
            border-top: 1px solid #ddd;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($_SESSION['ADMIN'])) { ?>
                    <br />
                    <span style="color:#fff;">Selamat Datang, <?php echo $_SESSION['ADMIN']['nama']; ?></span>
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <br /><br />
                    <a href="tambah.php" class="btn btn-success btn-md" data-toggle="tooltip" data-placement="top" title="Tambah Penghuni"><span class="fa fa-plus"></span> Tambah</a>
                    <br /><br />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Penghuni Kosan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="50px">No</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $hasil = $proses->tampil_data('tbl_penghuni');
                                        foreach ($hasil as $isi) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $isi['nama']; ?></td>
                                                <td><?php echo $isi['telepon']; ?></td>
                                                <td><?php echo $isi['email']; ?></td>
                                                <td><?php echo $isi['alamat']; ?></td>
                                                <td><?php echo $isi['pekerjaan']; ?></td>
                                                <td>
                                                    <a href="edit.php?editid=<?php echo $isi['id_login']; ?>" class="btn btn-edit btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data"><span class="fa fa-pencil"></span></a>
                                                    <form method="POST" action="index.php">
                                                        <input type="hidden" name="aksi" value="hapus">
                                                        <input type="hidden" name="hapusid" value="<?php echo $isi['id_login']; ?>">
                                                        <button type="submit" onclick="return confirm('Apakah yakin data akan dihapus?')" class="btn btn-hapus btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Data"><span class="fa fa-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        <h3>Anda belum login! Silakan <a href="login.php">login</a> terlebih dahulu.</h3>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
