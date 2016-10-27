<?php
session_start();

// belum ada data vote, kembalikan ke halaman voting
if (! isset($_SESSION["vote"]))
    header("Location: vote1.php");

// belum ada data voting yang dikirim user kembalikan ke halaman voting
if (! isset($_GET["gender"]) ||
    ! isset($_GET["name"])) {
    header("Location: vote1.php");
}

// ambil data yang dikirim user
$gender = $_GET["gender"];
$name = $_GET["name"];

// baca data dari session
$pilihan = $_SESSION["vote"];


// check apakah gender dan name ditemukan di dalam data pilihan
// jika ketemu, plus 1
if (array_key_exists($gender, $pilihan)) {
    if (array_key_exists($name, $pilihan[$gender])) {
        $pilihan[$gender][$name]++;
    }
}
// update pilihan
$_SESSION["vote"] = $pilihan;

// kembalikan ke url sebelumnya
// super global variable $_SERVER menyimpan informasi mengenai
// URL yang diakses sebelumnya mencapai url sekarang
header("Location: " . $_SERVER["HTTP_REFERER"]);
?>
