<?php
     // include database connection file
include("koneksi.php");
    // Check If form submitted, insert form data into users table.
if(isset($_POST['submit'])) {
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $jenis = $_POST['jenis'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];
  $supplier = $_POST['supplier'];
   // $pengambil = $_POST['pengambil'];
  $kode_warna = $_POST['kode_warna'];

        // Insert user data into table
  $result = mysqli_query($conn, "INSERT INTO barang(kode_barang,nama_barang,jenis,jumlah,harga,kode_warna,total,supplier) VALUES('$kode','$nama','$jenis','$jumlah','$harga','$kode_warna','$total','$supplier')");
  header("Location: http://localhost/sony/list_barang_masuk.php");
  die();
}

if(isset($_POST['submit_edit'])){
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $jenis = $_POST['jenis'];
  $jumlah = $_POST['jumlah'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];
  $supplier = $_POST['supplier'];
  $kode_warna = $_POST['kode_warna'];

  $sql	= 'update barang set kode_barang="'.$kode.'", nama_barang="'.$nama.'", jenis="'.$jenis.'", jumlah="'.$jumlah.'", harga="'.$harga.'", kode_warna="'.$kode_warna.'", total="'.$total.'", supplier="'.$supplier.'" where kode_barang="'.$kode.'"';
  $query	= mysqli_query($conn,$sql);
  if (!mysqli_query($conn,$sql))
  {
  echo("Error description: " . mysqli_error($conn));
  }
  header("Location: http://localhost/sony/list_barang_masuk.php");
  die();

}






?>