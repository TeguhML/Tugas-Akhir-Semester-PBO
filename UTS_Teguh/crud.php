<?php
    require 'panggil.php';

    // proses tambah
    if(isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $pekerjaan = strip_tags($_POST['pekerjaan']);
        $pass = strip_tags($_POST['pass']);
        
        $tabel = 'tbl_penghuni';
        
        // proses insert
        $data = array(
            'password' => md5($pass),
            'nama' => $nama,
            'telepon' => $telepon,
            'email' => $email,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        
        $proses->tambah_data($tabel, $data);
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';
    }

    // proses edit
    if(isset($_GET['aksi']) && $_GET['aksi'] == 'edit') {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $pekerjaan = strip_tags($_POST['pekerjaan']);
        $pass = strip_tags($_POST['pass']);
		
        // jika password tidak diisi
        if(empty($pass)) {
            $data = array(
                'nama' => $nama,
                'telepon' => $telepon,
                'email' => $email,
                'alamat' => $alamat,
                'pekerjaan' => $pekerjaan
            );
        } else {
            $data = array(
                'password' => md5($pass),
                'nama' => $nama,
                'telepon' => $telepon,
                'email' => $email,
                'alamat' => $alamat,
                'pekerjaan' => $pekerjaan
            );
        }
        
        $tabel = 'tbl_penghuni';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel, $data, $where, $id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }
    
    // hapus data 
    if(isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
        $tabel = 'tbl_penghuni';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel, $where, $id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    // login
    if(isset($_GET['aksi']) && $_GET['aksi'] == 'login') {
        $email = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['pass']);
    
        $result = $proses->proses_login($email, $pass);
    if($result == 'gagal') {
        echo "<script>window.location.href='../login.php?get=gagal';</script>";
    } else {
        session_start();
        $_SESSION['ADMIN'] = $result;
        echo "<script>window.location.href='../index.php';</script>";
        exit;
    }
}
?>
