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
  <div style="background: linear-gradient(to right, #43a8ed,#a1d6f9,#FFFFFF,#43a8ed);" class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="ULYCE" height="120" width="120">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" role="button">{{ $uxxx->username }} / <b>{{ $uxxx->role?$uxxx->role->name:''}}</b></a>
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
        <img style="width:100%;margin-top: 57px; height:85px;" src="{{ asset('img/logo.png') }}" class="brand-image elevation-1" alt="">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ $active==1?'active':'' }}">
            <a href="/admin/dashboard" class="nav-link {{ $active==1?'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ACCUEIL
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==2?'active':'' }}">
            <a href="/admin/paiements" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon fas fa-angle-double-right"></i>
              <p>
                JOURNAL DES ENTREES
              </p>
            </a>
          </li>

          <li class="nav-item {{ $active==3?'active':'' }}">
            <a href="/admin/depenses" class="nav-link {{ $active==3?'active':'' }}">
              <i class="nav-icon fas fa-angle-double-left"></i>
              <p>
                DEPENSES
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==4?'active':'' }}">
            <a href="#" class="nav-link {{ $active==4?'active':'' }}">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>
                  FACTURES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/factures" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FACTURES CLIENTS</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/proformas/factures" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>FACTURES PROFORMA</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/frn/factures" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>FACTURES FOURNISSEURS</p>
                    </a>
                </li>

              </ul>
          </li>
          <li class="nav-item {{ $active==5?'active':'' }}">
            <a href="/admin/clients" class="nav-link {{ $active==5?'active':'' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                CLIENTS
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==8?'active':'' }}">
            <a href="/admin/fournisseurs" class="nav-link {{ $active==8?'active':'' }}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                FOURNISSEURS
              </p>
            </a>
          </li>
          <li class="nav-item {{ $active==9?'active':'' }}">
            <a href="/admin/stocks" class="nav-link {{ $active==9?'active':'' }}">
              <i class="nav-icon fas fa-filter"></i>
              <p>
                STOCK
              </p>
            </a>
          </li>

          <li class="nav-item {{ $active==6?'active':'' }}">
            <a href="/admin/commerciales" class="nav-link {{ $active==6?'active':'' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                COMMERCIAUX
              </p>
            </a>
          </li>

          <li class="nav-item {{ $active==7?'active':'' }}">
            <a href="#" class="nav-link {{ $active==7?'active':'' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  PARAMETRES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/parametres/articles" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ARTICLES</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/parametres/categories" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>CATEGORIES</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/parametres/tdepenses" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>TYPES DEPENSES</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/parametres/users" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>UTILISATEURS</p>
                    </a>
                </li>
              </ul>
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
