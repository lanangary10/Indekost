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
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Lokasi</h3>
                <p>9 Kabupaten</p>
              </div>
              <div class="icon">
              <iconify-icon data-icon="dashicons:location"></iconify-icon>
              </div>
              <a href="{{ url ('/kabupaten') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Fasiltias<sup style="font-size: 20px"></sup></h3>

                <p>Primer-Sekunder</p>
              </div>
              <div class="icon">
                <iconify-icon data-icon="ant-design:wifi-outlined"></iconify-icon>
              </div>
              <a href="{{ url ('/filterkebutuhan') }}" class="small-box-footer">Browsing Fasilitas <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- Harga -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background-color: #ffda77;">

              <div class="inner">
                <h3>Harga</h3>
                <p>Rentang Harga</p>
              </div>

              <div class="icon">
                <iconify-icon data-icon="fa-solid:money-bill-wave"></iconify-icon>
              </div>

              <a href="{{ url ('/filterharga') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
        <!-- ./col -->

        <!-- Status -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background-color: #ffda77;">

              <div class="inner">
                <h3>Status</h3>
                <p>Indekost Status khusus </p>
              </div>

              <div class="icon">
                <iconify-icon data-icon="fa-solid:money-bill-wave"></iconify-icon>
              </div>

              <a href="{{ url ('/filterstatus') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
        <!-- ./col -->

        <!-- Arah -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background-color: #ffda77;">

              <div class="inner">
                <h3>Arah</h3>
                <p>Arah hadap indeKost</p>
              </div>

              <div class="icon">
                <iconify-icon data-icon="fa-solid:money-bill-wave"></iconify-icon>
              </div>

              <a href="{{ url ('/filterarah') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection