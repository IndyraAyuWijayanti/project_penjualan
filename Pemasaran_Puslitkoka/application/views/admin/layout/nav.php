<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dasbor') ?>" class="brand-link">
      <img src="<?= base_url() ?>assets/admin/dist/img/puslit.png"
           alt="puslit"
           class="brand-image img-circle elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-light"><b>ICCRI </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- MENU DASHBOARD -->
          <li class="nav-item">
            <a href="<?= base_url('admin/dasbor') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-aqua"></i>
              <p>DASHBOARD</p>
            </a>
          </li>

          <!-- Menu Berita -->
          <!-- <li class="nav-item">
            <a href="<?= base_url('admin/berita') ?>" class="nav-link"> 
              <i class="nav-icon fas fa-book text-aqua"></i>
              <p>BERITA</p>
            </a>
          </li> -->


           <!-- MENU USER -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                ADMIN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/user') ?>" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/user/tambah') ?>" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Tambah Admin</p>
                </a>
              </li>
            </ul>
          </li>



  <!-- MENU Pelanggan -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                PELANGGAN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/pelanggan') ?>" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="<?= base_url('admin/kategoripelanggan') ?>" class="nav-link">
                  <i class="nav-icon fa fa-tags"></i>
                  <p>Kategori Pelanggan</p>
                </a>
              </li>
            </ul>
          </li>


        

          <!-- MENU PRODUK -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                PRODUK
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/produk') ?>" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>Data Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/produk/tambah') ?>" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Tambah Produk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
                  <i class="nav-icon fa fa-tags"></i>
                  <p>Kategori Produk</p>
                </a>
              </li>
            </ul>
          </li>




  <!-- MENU TRANSAKSI -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-check text-aqua"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/transaksi') ?>" class="nav-link">
                  <i class="nav-icon fa fa-table"></i>
                  <p>Data Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/transaksi/tambah') ?>" class="nav-link">
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Tambah Transaksi</p>
                </a>
              </li>
            </ul>
          </li>

        
          

         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>