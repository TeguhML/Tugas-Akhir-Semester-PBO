<?php
    session_start();
    require 'panggil.php';

    // Proses Tambah Data
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $pekerjaan = $_POST['pekerjaan'];
        $password = $_POST['password'];

        // Enkripsi password menggunakan MD5
        $hashedPassword = md5($password);

        $data = array(
            array(
                'nama' => $nama,
                'telepon' => $telepon,
                'email' => $email,
                'alamat' => $alamat,
                'pekerjaan' => $pekerjaan,
                'password' => $hashedPassword
            )
        );

        $hasil = $proses->tambah_data('tbl_penghuni', $data);

        if ($hasil) {
            header("Location: index.php");
            exit();
        } else {
            $pesan = "Gagal menambahkan data";
        }
    }
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Tambah Data Penghuni Kosan</title>
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
        .btn-kembali {
            background-color: #6c757d;
            color: #fff;
            border-color: #6c757d;
        }

        /* Alert */
        .alert {
            margin-top: 20px;
            text-align: center;
        }

        .alert h3 {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br />
                <h2>Tambah Data Penghuni</h2>
                <br />
                <a href="index.php" class="btn btn-kembali btn-md float-right"><span class="fa fa-arrow-left"></span> Kembali</a>
                <br /><br />
                <?php if (isset($pesan)) { ?>
                    <div class="alert alert-danger">
                        <h3><?php echo $pesan; ?></h3>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" class="form-control" name="telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
