<html>
<header>
  <?php include ('header.php');?>
  <?php if (isset($_REQUEST['kode_warna'])) {$kode_warna = $_REQUEST['kode_warna']; } else { $kode_warna = ''; } ?>
</header>
<body>
  <?php

  require_once 'koneksi.php';

  $query = "SELECT * FROM warna ORDER BY kode_warna ASC";

  $result = mysqli_query($conn, $query);

  ?>
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

        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Barang Masuk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="proses_barangmasuk.php" method = "post" name="formbarang">
                  <div class="card-body">

                    <div class="form-group">
                      <label for="KodeBarang">Kode Barang</label>
                      <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang">
                    </div>
                    <div class="form-group">
                      <label for="NamaBarang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                      <label for="Jenis">Jenis</label>
                      <select class="form-control" name="jenis" id="jenis">
                        <option value="Polyester (PE)">Polyester (PE)</option>
                        <option value="Poly Vinil De Plouride (PVDF)">Poly Vinil De Plouride (PVDF)</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="Jenis">Warna</label>
                      <select class="form-control" name="kode_warna" id="kode_warna">
                        <?php while($data = mysqli_fetch_assoc($result) ){?>
                        <option value="<?php echo $data['kode_warna']; ?>"><?php echo $data['nama_warna']; ?></option>
                        <?php } ?>
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" onchange="totals()">
                    </div>
                    <div class="form-group">
                      <label for="Jumlah">Jumlah</label>
                      <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" onchange="totals()">
                    </div>   
                    <div class="form-group">
                      <label for="exampleInputPassword1">Total</label>
                      <input type="text" class="form-control" id="total" readonly name="total" placeholder="Total" >
                    </div>
                    <div class="form-group">
                    <label for="Jenis">Supplier</label>
                    <select class="form-control" name="supplier" id="supplier">
                      <option value="PT.a">PT.a</option>
                      <option value="PT.b">PT.b</option>
                    </select>
                  </div>
                    <div class="form-group">

                      <label for="jumlah">Tanggal Masuk</label>
                      <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Total harga">
                    </div>  
                  </div>
                  <div class="card-footer">
                    <button type="submit" id= "submit" name = "submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

                <?php
                // Check If form submitted, insert form data into users table.
                if(isset($_POST['submit'])) {
                $kode = $_POST['kode'];
                $nama = $_POST['nama'];
                $jenis = $_POST['jenis'];
                $jumlah = $_POST['jumlah'];
                $harga = $_POST['harga'];

                // include database connection file
                include_once("koneksi.php");

                // Insert user data into table
                $result = mysqli_query($conn, "INSERT INTO barang(kode_barang,nama_barang,jenis,jumlah) VALUES('$kode','$nama','$jenis','jumlah','harga')");

                // Show message when user added
                echo "User added successfully. <a href='index.php'>View Users</a>";
              }
              ?>
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