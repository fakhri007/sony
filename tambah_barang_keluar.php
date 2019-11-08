<html>
<header>
  <?php include ('header.php');?>
  <?php if (isset($_REQUEST['kode_warna'])) {$kode_warna = $_REQUEST['kode_warna']; } else { $kode_warna = ''; } ?>
</header>
<body>
  <?php

  require_once 'koneksi.php';

  $query = "SELECT * FROM jenis GROUP BY jenis";

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

      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Barang Keluar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="proses_barangkeluar.php" method = "post" name="formbarang">
                <div class="card-body">
                  <div class="form-group">
                      <label for="Jenis">Pengambil</label>
                      <select class="form-control" name="pengambil" id="pengambil" onchange="role()">
                        <option value="Manager Proyek">Manager Proyek</option>
                        <option value="Pelanggan">Pelanggan</option>
                      </select>
                    </div>
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
                    <select class="form-control" name="jenis" id="jenis" onchange="ubahWarna()">
                      <option disabled selected value> -- select an option -- </option>
                      <?php while($data = mysqli_fetch_assoc($result) ){?>
                        <option value="<?php echo $data['jenis']; ?>"><?php echo $data['jenis']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Jenis">Warna</label>
                    <select class="form-control" name="kode_warna" id="kode_warna" onchange="getHarga()" >
                      <option disabled selected value> -- select an option -- </option>

                    </select>

                  </div>
                  <div class="form-group">
                    <label for="Jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah" onchange="hitungTotal()">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" onchange="hitungTotal()">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Total</label>
                    <input type="text" class="form-control" id="total" readonly name="total" placeholder="Total" >
                  </div>
                  
                  <div class="form-group">
                    <label for="jumlah">Tanggal Keluar</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Masuk">
                  </div>  
                  <div class="card-footer" bg-light>
                    <button type="submit" id= "submit" name = "submit" class="btn btn-primary">Submit</button>
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
    <?php include ('footer.php');?>
    <script>
      function role(){
        var role = $("#pengambil").val()
        if(role == "Manager Proyek"){
         document.getElementById('harga').readOnly = true;
          document.getElementById('jumlah').readOnly = true;
        } else {
          document.getElementById('harga').readOnly = false;
          document.getElementById('jumlah').readOnly = false;
        }
      }
      function ubahWarna(){
        $('#kode_warna')
        .find('option')
        .remove()
        .end()
        .append('<option disabled selected value> -- select an option -- </option>');
        $('#harga').val("");
        var jenis = $("#jenis").val()
        $.get( "http://localhost/sony/proses_barangkeluar.php?jenis="+jenis, function( data ) {
          $.each(JSON.parse(data), function(key, value) {
          // alert(value.warna);
          $('#kode_warna').append('<option value=' + value.warna + '>' + value.warna + '</option>');
        });
        //alert( "Data Loaded: " + data );
      });

      }
      function getHarga(){

        var jenis = $("#jenis").val()
        var warna = $("#kode_warna").val()
        $.get( "http://localhost/sony/proses_barangkeluar.php?jenis="+jenis+"&warna="+warna, function( data ) {
          $.each(JSON.parse(data), function(key, value) {
          // alert(value);
          $('#harga').val(value);
          hitungTotal()
        //   if ($('#harga').onchange()){ 
            //$('#harga').onchange("hitungTotal()");
        // }
      });

        //alert( "Data Loaded: " + data );
      });
      }

      function hitungTotal(){
        var jml = $("#jumlah").val()
        var harga = $("#harga").val()
        // alert(harga)
        var total = jml * harga
        $("#total").val(total)
    //     $("#total").val(total)
    //     if (!isNaN(total))
    // document.getElementById("total").innerHTML = total
      }
    </script>
    <?php
  // /function warna(){
  // if (isset($_GET['jenis'])) { 
  //   $jenis =  $_GET['jenis'];
  //   $query = "SELECT * FROM jenis GROUP BY jenis";

  //   $result = mysqli_query($conn, $query);
  //   return $result;

  //   } else { 
  //     $jenis = '';
  //      }
  //    }
    ?>
  </body>


  </html>
</body>
</html>



