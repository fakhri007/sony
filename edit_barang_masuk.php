<html>
<header>
   <?
session_start();
if (!isset($_SESSION['username'])){
header("Location:./index.php");
}
?>
  <?php include ('header.php');?>
</header>
<body>
  <div class = "wrapper">
    <!-- navbar -->
    <?php include ("navbar.php"); ?>
    <!-- SideBar -->
    <?php include ("sidebar.php"); ?> 
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Barang</li>
                <li class="breadcrumb-item active">Tambah Barang</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <?php
      include('koneksi.php');
      if(isset($_GET['ni'])){
        $ni		= $_GET['ni'];
        $query	= mysqli_query($conn,'select * from barang inner join warna on (barang.kode_warna = warna.kode_warna) where kode_barang = "'.$ni.'"');
        $data  	= mysqli_fetch_array($query);
        $kode = $data['kode_barang'];
        $nama = $data['nama_barang'];
        $warna = $data['nama_warna'];
        $jenis = $data['jenis'];
        $jumlah = $data['jumlah'];
        $harga = $data['harga'];

      }

      else{
        $kode = '';
        $nama = '';
        $jenis = '';
        $jumlah = '';
        $harga = '';
      }


      include "koneksi.php";
      $sql="SELECT * FROM barang inner join warna on (barang.kode_warna = warna.kode_warna)  WHERE kode_barang = '$kode'";
      $result=mysqli_query($conn,$sql);
      $databarang = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $query = "SELECT * FROM warna ORDER BY kode_warna ASC";

      $result_warna = mysqli_query($conn, $query);



      ?>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Barang Masuk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_barangmasuk.php" method = "post" name="formbarang">
                <div class="card-body">
                  <div class="form-group">
                    <label for="KodeBarang">Kode Barang</label>
                    <?php
                    echo '<input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang" value="'.$databarang['kode_barang'].'">'
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="NamaBarang">Nama Barang</label>
                    <?php
                    echo '<input type="text" class="form-control" id="nama" name="nama" placeholder="Kode Barang" value="'.$databarang['nama_barang'].'">'
                    ?>
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <select class="custom-select" id= "jenis" name= "jenis">
                     <option value="<?php echo $databarang['jenis']?>"><?php echo $databarang['jenis']?></option>
                     <option value="Polyester (PE)"><i>Polyester</i> (PE)</option>
                     <option value="Poly Vinyl De Flouride (PVDF)"><i>Poly Vinyl De Flouride</i> (PVDF) </option>
                   </select>
                 </div>
                 <div class="form-group">
                  <label for="Jenis">Warna</label>
                  <select class="form-control" name="kode_warna" id="kode_warna">

                    <?php while($data = mysqli_fetch_assoc($result_warna) ){
                      if($data['kode_warna'] == $databarang['kode_warna']){?>
                        <option value="<?php echo $data['kode_warna']; ?>" selected><?php echo $data['nama_warna']; ?></option>
                      <?php } else {?>
                        <option value="<?php echo $data['kode_warna']; ?>"><?php echo $data['nama_warna']; ?></option>
                      <?php }} ?>
                    </select>

                  </div>
                  
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <?php
                    echo '<input type="text" class="form-control" id="harga" name="harga" placeholder="Kode Barang" value="'.$databarang['harga'].'" onchange="totals()">'
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="Jumlah">Jumlah</label>
                    <?php
                    echo '<input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Kode Barang" value="'.$databarang['jumlah'].'"onchange="totals()">'
                    ?>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total</label>
                    <input type="text" class="form-control" id="total" value="<?php echo $databarang['total']?>" readonly name="total" placeholder="Total" >
                  </div>
                  <div class="form-group">
                    <label for="Jenis">Supplier</label>
                    <select class="form-control" name="supplier" id="supplier">
                      <option value="<?php echo $databarang['supplier']?>"><?php echo $databarang['supplier']?></option>
                      <option value="PT.a">PT.a</option>
                      <option value="PT.b">PT.b</option>
                    </select>
                  </div>

                </div> 
              </div>
              <div class="card-footer">
                <button type="submit" id= "submit_edit" name = "submit_edit" class="btn btn-primary">Submit</button>
              </div>
            </form>


            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
      </div>
    </div>
  </div>
</div>
<script>
 function totals(){
  var harga = $("#harga").val()
  var jumlah = $("#jumlah").val()
  var total = harga * jumlah
  $("#total").val(total)
}
</script>
<?php include ('footer.php');?>
</body>


</html>
</body>
</html>