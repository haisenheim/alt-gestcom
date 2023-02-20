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
  <aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->

      <h3 style="text-align:center; font-weight:600" class="brand-text brand-link">NYOTA</h3>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ $active==1?'active':'' }}">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ACCUEIL
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==2?'active':'' }}">
            <a href="/admin/parametres" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                PARAMETRES
              </p>
            </a>
          </li>

          <li class="nav-item {{ $active==5?'active':'' }}">
            <a href="/admin/budget" class="nav-link">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                FACTURES
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==6?'active':'' }}">
            <a href="/admin/telechargements" class="nav-link">
              <i class="nav-icon fas fa-mobile"></i>
              <p>
                TELECHARGEMENTS
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==7?'active':'' }}">
            <a href="/admin/fournisseurs" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                CLIENTS
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==7?'active':'' }}">
            <a href="/admin/rapports" class="nav-link">
              <i class="nav-icon fas fa-file-excel"></i>
              <p>
                EDITIONS
              </p>
            </a>
          </li>

          <li class="nav-item {{ $active==8?'active':'' }}">
            <a href="/admin/compte" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Comptes utilisateurs
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==9?'active':'' }}">
            <a href="/admin/tickets/upload" class="nav-link">
              <i class="nav-icon fas fa-upload"></i>
              <p>
                TICKETS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-arrow-left"></i>
              <p>
                DECONNEXION
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
  <div style="background: rgba(255, 255, 255, 0.726)" class="content-wrapper">


    <!-- Main content -->
    <section class="content" style="">
        <div class="container">
            @include('includes.flash-message')
       </div>
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('includes.foot')
</body>
</html>
