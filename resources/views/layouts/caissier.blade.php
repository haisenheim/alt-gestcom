<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
        $active = \Illuminate\Support\Facades\Session::get('active');
                use Carbon\Carbon;
                use App\Helper\NumberFr;
                $locale = app()->getLocale();
                $uxxx = App\User::find(auth()->user()->id);
                Carbon::setlocale($locale);
                $date = Carbon::now();
                $translatedDate = $date->translatedFormat('D, j M Y, H:i:s');
    ?>
<div class="wrapper">
  <!-- Preloader -->
  <div style="background: linear-gradient(to right, #5bbdd6,#FFFFFF,#5bbdd6);" class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="NyotaShop Manager" height="160" width="160">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">{{ $uxxx->name }} / <b>{{ $uxxx->role?$uxxx->role->name:''}}</b></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <p>
            <?php echo($translatedDate);?>
        </p>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

      <h3 style="text-align:center; font-weight:600" class="brand-text brand-link">{{ $uxxx->fournisseur?Str::upper($uxxx->fournisseur->name):'INCONNU' }}</h3>
      <p style="text-align:center;">
        <a style="color:#fff; font-size:1rem;" href="/logout">Se déconnecter</a>
      </p>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/caissier/dashboard" class="nav-link {{ $active==1?'active':'' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                ACCUEIL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/caissier/ventes" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                Ventes
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div style="background: #fff" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield('content-header')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('includes.foot')
</body>
</html>
