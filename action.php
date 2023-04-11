<?php
include 'function.php';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['kbai_login'] = true;
        redirect_back();
    }
}

if (isset($_POST['tambah_kata'])) {
    $indonesia = strtolower($_POST['indonesia']);
    $alune = strtolower($_POST['alune']);

    if (db_query("INSERT INTO `kata`(`indonesia`, `alune`) VALUES ('$indonesia','$alune')")) {
        setBerhasil("Berhasil menambahkan data");
        redirect_back();
    } else {
        setGagal("Gagal menambahkan data");
        redirect_back();
    }
}

if (isset($_POST['tambah_kalimat'])) {
    $indonesia = strtolower($_POST['indonesia']);
    $alune = strtolower($_POST['alune']);

    if (db_query("INSERT INTO `kalimat`(`indonesia`, `alune`) VALUES ('$indonesia','$alune')")) {
        setBerhasil("Berhasil menambahkan data");
        redirect_back();
    } else {
        setGagal("Gagal menambahkan data");
        redirect_back();
    }
}

if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
    $jenis = $_POST['jenis'];
    $bahasa = $_POST['bahasa'];
    $data = "";
    if (isset($_POST['database'])) {
        foreach (db_query("SELECT * FROM $jenis WHERE $bahasa LIKE '$cari%' ORDER BY $bahasa ASC") as $k) {
            $data = $data . "<tr><td class='text-center'>" . $k['indonesia'] . "</td><td class='text-center'>" . $k['alune'] . "</td></tr>";
        }
        echo $data;
        die;
    }
    if ($bahasa == 'indonesia') {
        foreach (db_query("SELECT * FROM $jenis WHERE $bahasa LIKE '$cari%' ORDER BY $bahasa ASC") as $k) {
            $data = $data . "<tr><td class='text-center'>" . $k['indonesia'] . "</td><td class='text-center'>" . $k['alune'] . "</td></tr>";
        }
    } else {
        foreach (db_query("SELECT * FROM $jenis WHERE $bahasa LIKE '$cari%' ORDER BY $bahasa ASC") as $k) {
            $data = $data . "<tr><td class='text-center'>" . $k['alune'] . "</td><td class='text-center'>" . $k['indonesia'] . "</td></tr>";
        }
    }
    echo $data;
    die;
}


redirect_back();
