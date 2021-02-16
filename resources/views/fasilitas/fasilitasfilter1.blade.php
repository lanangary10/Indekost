@extends('layout/main')

@section('title', 'Browsing')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Browsing</h1>
          </div><!-- /.col -->
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
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Primer</h3>
                <p>Lanjutkan</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <?php 
              $idfilter1 = "primer";
              ?>
               
              <a href=fasilitas/{{$idfilter1}} class="small-box-footer"> primer <i class="fas fa-arrow-circle-right"></i></a>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Sekunder<sup style="font-size: 20px">%</sup></h3>

                <p>Sekunder</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <?php 
              $idfilter1 = "sekunder";
              ?>
               
              <a href=fasilitas/{{$idfilter1}} class="small-box-footer"> primer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>By Fasilitas</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cog"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection