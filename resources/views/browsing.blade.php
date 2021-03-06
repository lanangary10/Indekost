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
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div style="background-color: #E0E0E0;" class="small-box bg-purple">
              <div class="inner">
              <?php $lokasi='lokasi'; ?>
                <h3>Lokasi</h3>
                <p>9 Kabupaten</p>
              </div>
              <div class="icon">
              <i class="far fa-map"></i>
              </div>
              <a href="{{ route ('lokasi.kabupaten',[$lokasi]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div style="background-color: #E0E0E0;" class="small-box bg-purple">
              <div class="inner">
                <h3>Fasiltias<sup style="font-size: 20px"></sup></h3>

                <p>Primer-Sekunder</p>
              </div>
              <div class="icon">
                <i class="fas fa-bed"></i>
              </div>
              <a href="{{ url ('/filterkebutuhan') }}" class="small-box-footer">Browsing Fasilitas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- Harga -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box  bg-purple" style="background-color: #E0E0E0;">

              <div class="inner">
                <h3>Harga</h3>
                <p>Rentang Harga</p>
              </div>

              <div class="icon">
                <!-- <iconify-icon data-icon="fa-solid:money-bill-wave"></iconify-icon> -->
                <i class="fas fa-hand-holding-usd"></i>
              </div>

              <a href="{{ url ('/filterharga') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
        <!-- ./col -->

        <!-- Status -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-purple" style="background-color: #E0E0E0;" data-bs-toggle="tooltip" data-bs-placement="top" title="Status Indekost">

              <div class="inner">
                <h3>Status</h3>
                <p>Indekost Status khusus </p>
              </div>

              <div class="icon">
                <i class="fas fa-users"></i>
              </div>

              <a href="{{ url ('/filterstatus') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
        <!-- ./col -->


        <!-- Arah -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            

            <div class="small-box bg-purple" style="background-color: #E0E0E0;" data-bs-toggle="tooltip" data-bs-placement="top" title="Arah Hadap Indekost">
               <?php $direction='arah'; ?>
              <div class="inner">
                <h3>Arah</h3>
                <p>Arah hadap indeKost</p>
              </div>

              

              <div class="icon">
              <i class="far fa-compass"></i>
              </div>

              <a href="{{ route ('arah.index',[$direction]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
          </div>

        </div>
 <!-- alert -->
  <div class="row">
  <div class="col-8"></div>
  
   <div class="col">
 
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Browsing<br></strong>"Dengan Cara mengklik salah satu hyperlink yang tersedia maka anda bisa menjelajahi hal baru yang berkaitan dengan hyperlink tersebut".
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
  </div>
  </div>
  </div>
  <!-- end alert -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection