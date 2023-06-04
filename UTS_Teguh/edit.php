<?php
    // session start
    if (!empty($_SESSION)) {
    } else {
        session_start();
    }
    require 'panggil.php';

    // Proses pengubahan data
    if (isset($_POST['aksi']) && $_POST['aksi'] == 'edit') {
        $idEdit = $_POST['editid'];
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['pekerjaan'];

        // Update data penghuni
        $data = array(
            'nama' => $nama,
            'telepon' => $telepon,
            'email' => $email,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        $proses->edit_data('tbl_penghuni', $data, 'id_login', $idEdit);

        // Change password if provided
        if (!empty($_POST['password'])) {
            $password = $_POST['password'];
            $proses->edit_data('tbl_penghuni', array('password' => md5($password)), 'id_login', $idEdit);
        }

        header('Location: index.php');
        exit();
    }

    // Get the user data
    $editId = $_GET['editid'];
    $dataPenghuni = $proses->ambil_data_by_id('tbl_penghuni', 'id_login', $editId);
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Edit Penghuni Kosan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br />
                <h3>Edit Penghuni Kosan</h3>
                <br />
                <form method="POST" action="edit.php">
                    <input type="hidden" name="aksi" value="edit">
                    <input type="hidden" name="editid" value="<?php echo $editId; ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo $dataPenghuni['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="<?php echo $dataPenghuni['telepon']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $dataPenghuni['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $dataPenghuni['alamat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" value="<?php echo $dataPenghuni['pekerjaan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



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
                    <span style="color:#fff;">Selamat Datang, <?php echo $sesi['nama']; ?></span>
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <br /><br />
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data Penghuni</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="edit.php">
                                <input type="hidden" name="aksi" value="edit">
                                <input type="hidden" name="editid" value="<?php echo $idEdit; ?>">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon:</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan:</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $pekerjaan; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                            </form>
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
