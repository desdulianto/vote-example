<?php
session_start();

$pilihan = array("laki" => array("Budi" => 0, "Agus" => 0, "Iwan" => 0),
                 "perempuan" => array("Susi" => 0, "Rita" => 0, "Ani" => 0));

// jika belum ada data, isikan data di atas terlebih dahulu;
if (! isset($_SESSION["vote"]))
    $_SESSION["vote"] = $pilihan;
else
    // jika sudah ada tarik data dari session
    $pilihan = $_SESSION["vote"];

if (! isset($_GET["gender"]))
    $gender = "laki";
else
    $gender = $_GET["gender"];

// jika gender salah, anggap gender adalah laki
if (! in_array($gender, array("laki", "perempuan")))
    $gender = "laki";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <a href="vote1.php?gender=laki"><button>Laki</button></a>
    <a href="vote1.php?gender=perempuan"><button>Perempuan</button></a>
    <ul>
<?php
        $nominees = $pilihan[$gender];
    foreach ($nominees as $name => $vote) {
        echo "<li>$name: $vote <a href=\"process1.php?gender=$gender&name=$name\"><button>Vote for $name</button></a></li>";
    }
?>
    </ul>
</body>
</html>
