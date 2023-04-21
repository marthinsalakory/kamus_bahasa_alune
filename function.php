<?php

if (!session_id()) session_start();

function db_conn()
{
    return mysqli_connect('localhost', 'root', '', 'kbai');
}

function db_query($query)
{
    return mysqli_query(db_conn(), $query);
}

function db_find($table, $where)
{
    foreach ($where as $key => $val) {
        if (isset($result)) {
            $result = $result . ' && ' . $key .  ' = \'' . $val . '\'';
        } else {
            $result = $key .  ' = \'' . $val . '\'';
        }
    }
    return db_query("SELECT * FROM `$table` WHERE $result")->fetch_object();
}

function db_count($table, $array = null)
{
    if ($array != null) {
        foreach ($array as $key => $val) {
            if (isset($result)) {
                $result = $result . ' && ' . $key .  ' = \'' . $val . '\'';
            } else {
                $result = $key .  ' = \'' . $val . '\'';
            }
        }
    } else {
        $result = 1;
    }
    return db_query("SELECT * FROM `$table` WHERE $result")->num_rows;
}

function redirect($url)
{
    header("Location: " . $url);
    exit;
}

function redirect_back()
{
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}

function isLogin()
{
    if (isset($_SESSION['kbai_login'])) {
        return true;
    }
    return false;
}

function setBerhasil($pesan)
{
    $_SESSION['flash']['Berhasil'][] = $pesan;
}

function flashBerhasil()
{
    if (isset($_SESSION['flash']['Berhasil'])) {
        foreach ($_SESSION['flash']['Berhasil']  as $flash) {
            $pesan = "<li>" . $flash . "</li>";
        }
        unset($_SESSION['flash']['Berhasil']);
        return '
            <div class="alert alert-primary alert-dismissible fade show position-fixed top-0 end-0" style="z-index: 99; margin-top: 90px; width: 30%;" role=" alert">
                <strong>Berhasil!</strong>
                <ul>
                ' . $pesan . '
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}

function setGagal($pesan)
{
    $_SESSION['flash']['Gagal'][] = $pesan;
}

function flashGagal()
{
    if (isset($_SESSION['flash']['Gagal'])) {
        foreach ($_SESSION['flash']['Gagal']  as $flash) {
            $pesan = "<li>" . $flash . "</li>";
        }
        unset($_SESSION['flash']['Gagal']);
        return '
        <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0" style="z-index: 99; margin-top: 90px; width: 30%;" role=" alert">
            <strong>Gagal!</strong>
            <ul>
            ' . $flash . '
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}
