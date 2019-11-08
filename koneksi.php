<?php
<?php
  // echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx".$_SESSION['username'];
session_start();
if (!isset($_SESSION['username'])){
header("Location:./login.php");
}
?>
$servername = "localhost";
$database = "mudamandiri";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
?>

