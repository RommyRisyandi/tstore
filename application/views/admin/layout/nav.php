<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <!-- Menu Dashboard -->
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

        <!-- Menu Produk -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk'); ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Produk</a></li>
            <li><a href="<?php echo base_url('admin/produk/rating'); ?>"><i class="fa fa-star"></i> Data Rating</a></li>
            <li><a href="<?php echo base_url('admin/kategori'); ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

        <!-- Menu Toko & Cabang -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cart-plus"></i> <span>Toko & Cabang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/toko'); ?>"><i class="fa fa-table"></i>Data Toko dan Cabang</a></li>
            <li><a href="<?php echo base_url('admin/toko/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Toko & Cabang</a></li>
          </ul>
        </li>

        <!-- Menu Berita -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/berita'); ?>"><i class="fa fa-table"></i> Data Berita</a></li>
            <li><a href="<?php echo base_url('admin/berita/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Berita</a></li>
          </ul>
        </li>

        <!-- Menu User -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i> <span>User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-table"></i> Data User</a></li>
            <li><a href="<?php echo base_url('admin/home/tambah'); ?>"><i class="fa fa-plus"></i> Tambah User</a></li>
          </ul>
        </li>

        <!-- Menu Konfigurasi -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi'); ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo'); ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon'); ?>"><i class="fa fa-home"></i> Konfigurasi Icon</a></li>
            <li><a href="<?php echo base_url('admin/slider'); ?>"><i class="fa fa-image"></i> Slider</a></li>
            <li><a href="<?php echo base_url('admin/slider/tambah'); ?>"><i class="fa fa-plus"></i> Tambah Slider</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title; ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">