@extends('layout/main')

@section('title', 'Fasilitas')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0 text-dark">Browsing</h1>
          </div>/.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>Primer</h3>
                <p></p>
              </div>
              <div class="icon">
              <i class="fas fa-fan"></i>
                
              </div>
              <?php 
              $idfilter1 = "primer";
              ?>
               
              <a href="{{ route ('fasilitas.filter',[$idfilter1]) }}" class="small-box-footer"> More info primer <i class="fas fa-arrow-circle-right"></i></a>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>Sekunder<sup style="font-size: 20px"></sup></h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <?php 
              $idfilter1 = "sekunder";
              ?>
               
              <a href="{{ route ('fasilitas.filter',[$idfilter1]) }}" class="small-box-footer"> More info Sekunder <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
        </div>
        <!-- /.row -->
         <!-- alert -->
  <div class="row">
  <div class="col-8"></div>
  
   <div class="col">

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>INFO<br></strong>"Untuk melihat anggota masing-masing fasilitas bisa klik Tombol <h7 class="text-black"> <a href="/" class="text-danger">More info! </a></h7>.
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
  </div>
  
  </div>
  </div>
  <!-- end alert -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection