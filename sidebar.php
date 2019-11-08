<!-- Main Sidebar Container -->
<?php
  // echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx".$_SESSION['username'];
session_start();
if (!isset($_SESSION['username'])){
header("Location:./login.php");
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambah_barang_masuk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tambah_barang_keluar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Barang Keluar</p>
                </a>
              </li>
              </li>
            </ul>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                List Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="list_barang_masuk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Barang Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_barang_keluar.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Barang Keluar</p>
                </a>
              </li>
              </li>
            </ul>
            <li>
            <a href="stok_barang.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Stok Barang
             
              </p>
            </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pengadaan Barang
              
              </p>
            </a>
            </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Supplier
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tambah_supplier.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="list_supplier.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Supplier</p>
                </a>
              </li>
              </li>
            </ul>
            </li>
            <li>
            <a href="manajemen_akun.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manajemen Akun 
              </p>
            </a>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>