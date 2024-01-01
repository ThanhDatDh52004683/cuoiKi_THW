<?php
session_start();
try {
    $so_luong = $_GET['so_luong'];

    if ($_SESSION['gio_hang']) {
        $gio_hang = $_SESSION['gio_hang'];

        $tong_tien = 0;
        $tong_so_luong = 0;
        foreach ($gio_hang as $sp) {
            if ($sp->ID == $id_sp) {
                $sp->so_luong = $so_luong;
            }
            $tong_so_luong += $sp->so_luong;
            $tong_tien += $sp->so_luong * $sp->gia_giam;
        }

        // Session::put('gio_hang', $gio_hang);
        // Session::put('tong_so_luong', $tong_so_luong);
        // Session::put('tong_tien', $tong_tien);
    }

    echo '1';
} catch (Exception $e) {
    die(0);
}
?>