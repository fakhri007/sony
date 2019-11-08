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
        $kode_warna = $_POST['kode_warna'];
        $pengambil = $_POST['pengambil'];
        $tanggal = $_POST['tanggal'];

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO barang_keluar(kode_barang,nama_barang,jenis,jumlah,harga,kode_warna,pengambil,tanggal_keluar,total) VALUES('$kode','$nama','$jenis','$jumlah','$harga','$kode_warna','$pengambil',$tanggal,$total)");
        header("Location: http://localhost/sony/list_barang_keluar.php");
  die();
}

if(isset($_POST['submit_edit'])){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $kode_warna = $_POST['kode_warna'];
     $pengambil = $_POST['pengambil'];
        $tanggal = $_POST['tanggal'];
	
	$sql	= 'update barang set kode_barang="'.$kode.'", nama_barang="'.$nama.'", jenis="'.$jenis.'", jumlah="'.$jumlah.'", harga="'.$harga.'", kode_warna="'.$kode_warna.'", total="'.$total.'", pengambil="'.$pengambil.'", tanggal="'.$tanggal.'" where kode_barang="'.$kode.'"';
	$query	= mysqli_query($conn,$sql);
    if (!mysqli_query($conn,$sql))
  {
  echo("Error description: " . mysqli_error($conn));
  }
  //   header("Location: http://localhost/sony/list_barang_keluar.php");
  // die();
	
	
}
if(isset($_GET['jenis']) || isset($_GET['warna'] )){
    if(!isset($_GET['warna'])){
        $jenis = $_GET['jenis'];
        $query = "SELECT warna FROM jenis where jenis = '".$jenis."'";
        $i = 0;
        $result = mysqli_query($conn, $query);
        while($datas = mysqli_fetch_assoc($result) ){
           $data[$i] = $datas;
           $i++;
       }
       echo json_encode($data);
   } elseif (isset($_GET['jenis']) && isset($_GET['warna'] )) {
       $jenis = $_GET['jenis'];
       $warna = $_GET['warna'];
       $query = "SELECT harga FROM jenis where jenis = '".$jenis."' and warna = '".$warna."'";
       $i = 0;
       $result = mysqli_query($conn, $query);
   //  while($datas = mysqli_fetch_assoc($result) ){
   //     $data[$i] = $datas;
   //     $i++;
   // }
       echo json_encode(mysqli_fetch_assoc($result));
   }
}
?>