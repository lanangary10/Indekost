@extends('layout/main')

@section('title', 'Filter harga')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1 class="m-0 text-dark">Filter Harga</h1>
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
                <h3>Rentang 1</h3>
                <p>0-999.999</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-home"></i>
              </div>
              <?php 
              $idfilterharga = "1";
              ?>
               
              <a href="{{ route ('harga.filter',[$idfilterharga]) }}" class="small-box-footer"> Rentang 1 <i class="fas fa-arrow-circle-right"></i></a>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>Rentang 2<sup style="font-size: 20px"></sup></h3>

                <p>1.000.000 - 1.500.000</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
              <?php 
              $idfilterharga = "2";
              ?>
               
              <a href="{{ route ('harga.filter',[$idfilterharga]) }}" class="small-box-footer"> Rentang 2<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>Rentang 3</h3>

                <p>1.500.001-2.000.000</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cog"></i>
              </div>
              <?php 
              $idfilterharga = "3";
              ?>
              <a href="{{ route ('harga.filter',[$idfilterharga]) }}" class="small-box-footer">Rentang 3<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection