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
        <img style="max-width: 100%;margin-top: 57px;" src="{{ asset($uxxx->fournisseur?'img/'.$uxxx->fournisseur->logo_uri:'') }}" class="brand-image elevation-1" alt="">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item {{ $active==1?'active':'' }}">
            <a href="/marchand/dashboard" class="nav-link {{ $active==1?'active':'' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                ACCUEIL
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/marchand/parametres" class="nav-link {{ $active==2?'active':'' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                PARAMETRES
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="/marchand/budget" class="nav-link {{ $active==5?'active':'' }}">
              <i class="nav-icon fas fa-columns"></i>
              <p>
                BUDGETS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/marchand/cartes" class="nav-link {{ $active==8?'active':'' }}">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                CARTES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/marchand/promotions" class="nav-link {{ $active==6?'active':'' }}">
              <i class="nav-icon fas fa-blog"></i>
              <p>
                CAMPAGNES
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/marchand/rapports" class="nav-link {{ $active==7?'active':'' }}">
              <i class="nav-icon fas fa-file-excel"></i>
              <p>
                EDITIONS
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link {{ $active==10?'active':'' }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  STATISTIQUES
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/marchand/stats/caisses" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>CAISSES</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/marchand/stats/cohorte" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>COHORTE</p>
                    </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="/marchand/compte" class="nav-link {{ $active==8?'active':'' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Comptes utilisateurs
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
