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

if (isset($_POST['otomatis_indonesia'])) {
    $post = $_POST['otomatis_indonesia'];
    $post = nl2br($post);
    $post = preg_split('/<br[^>]*>/i', $post);
    $post = implode(' ', $post);
    $post = explode(' ', $post);
    $kalimat = $_POST['otomatis_indonesia'];
    foreach ($post as $kata) {
        if (db_count('kata', ['indonesia' => preg_replace("/[^a-zA-Z0-9]/", "", trim($kata))])) {
            $kalimat = preg_replace("/\b" . preg_replace("/[^a-zA-Z0-9]/", "", trim($kata)) . "\b/", db_find('kata', ['indonesia' => preg_replace("/[^a-zA-Z0-9]/", "", trim($kata))])->alune, $kalimat);
        }
    }
    echo nl2br($kalimat);
    die;
}

if (isset($_POST['otomatis_alune'])) {
    $post = $_POST['otomatis_alune'];
    $post = nl2br($post);
    $post = preg_split('/<br[^>]*>/i', $post);
    $post = implode(' ', $post);
    $post = explode(' ', $post);
    $kalimat = $_POST['otomatis_alune'];
    foreach ($post as $kata) {
        if (db_count('kata', ['alune' => preg_replace("/[^a-zA-Z0-9]/", "", trim($kata))])) {
            $kalimat = preg_replace("/\b" . preg_replace("/[^a-zA-Z0-9]/", "", trim($kata)) . "\b/", db_find('kata', ['alune' => preg_replace("/[^a-zA-Z0-9]/", "", trim($kata))])->indonesia, $kalimat);
        }
    }
    echo nl2br($kalimat);
    die;
}

// if (isset($_POST['otomatis_indonesia'])) {
//     $post = $_POST['otomatis_indonesia'];
//     $post = nl2br($post);
//     $kalimat = '';
//     foreach (preg_split('/<br[^>]*>/i', $post) as $baris) {
//         foreach (explode(' ', $baris) as $b) {
//             if (db_count('kata', ['indonesia' => trim($b)])) {
//                 $kalimat = $kalimat . ' ' . db_find('kata', ['indonesia' => trim($b)])->alune;
//             } else {
//                 $kalimat = $kalimat . ' ' . trim($b);
//             }
//         }
//         $kalimat = $kalimat . '<br>';
//     }
//     echo nl2br($kalimat);
//     die;
// }
