@extends('layout/main')

@section('title', 'Browsing')

@section('container')
  <div class="content-wrapper">
   

  <!-- Jumbotron -->
 
    <div class="jumbotron text-center text-black jumbotron-image shadow" style="background-image: url(https://ecs7.tokopedia.net/blog-tokopedia-com/uploads/2015/10/Blog_Buat-Anak-Kos-Barang-Ini-Wajib-Ada-di-Kamar-Kos-Kamu.jpg); background-position: center center;  background-repeat: no-repeat; background-size: cover;">
      <h1 class="mb-4">
        Sistem Pencarian Indekos
      </h1>
      <p class="mb-4">
        Sistem ini dibangun untuk membuat sistem pencarian dengan Domain "Indekos" dengan menggunakan <i>Semantic Ontology</i> 
      </p>
      <a href="{{ url ('/browsing') }}" class="btn btn-primary">Mulai Browsing</a>
    </div>

 
<!-- end jumbo tron -->


      

  <ul class="nav nav-tabs" id="myTab" role="tablist" style="text-align: center;">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Info</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Quesioner</button>
  </li>
</ul>
<div class="card bg-gray-light">
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<!-- card1 -->
<div class="row">
<div class="col-4">
<a href="https://forms.gle/8NTjhyoi6p8rMKhG9" class="nav-link link-dark">
<div class="card">
        <img src="https://png.pngtree.com/element_our/20200702/ourlarge/pngtree-simple-questionnaire-vector-icon-free-drawing-image_2291780.jpg" class="card-img-top rounded mx-auto d-block" alt="..." style="height: 280px;">
        <div class="card-body">
         <p class=" text-center fs-2">Quesioner</p>
          <p class="card-text">Kuesioner yang diisi akan penulis gunkanan sebagai data untuk menentukan tingkat kemudahan atau TAM dalam sistem</p>
        </div>
      </div>
      </a>

</div>
  <div class="col-4">
  <a href="{{ url ('/browsing') }}" class="nav-link link-dark">
      <div class="card">
        <img src="https://cdn3.iconfinder.com/data/icons/smashicons-real-estate-retro/60/31_-House_Browsing-_house_real_estate_property_building-512.png" class="card-img-top rounded mx-auto d-block" alt="..." style=" height: 280px;">
        <div class="card-body">
         <p class=" text-center fs-2">Browsing</p>
          <p class="card-text">Mencari indekost dengan cara menjelajah sistem hingga mendapatkan informasi atau data tentang indekost yang sesuai dengan keinginan</p>
        </div>
      </div>
  </a>
    </div>

  <div class="col-4">
  <a href="{{ url ('/searching') }}" class="nav-link link-dark">
    <div class="card">
      <img src="https://cdn4.iconfinder.com/data/icons/property-real-estate/128/4-512.png" class="card-img-top rounded mx-auto d-block" alt="..." style=" height: 280px;">
      <div class="card-body">
        <p class=" text-center fs-2">Searching</p>
        <p class="card-text">Mencari indekost dengan cara memberikan filter-filter kriteri sehingga membuat pencarian indekost menjadi lebih spesifik</p>
      </div>
    </div>
    </a>
  </div>
    
  </div>
<!-- end card1 -->

  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <!-- FAQ -->
  <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Harga</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Fasilitas</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Status indekost</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
      <b>Menggunakan rentang harga dimana</b><br>
      Rentang 1 memiliki harga dikisaran 0 - 800.000 <br>
      Rentang 2 memiliki harga dikisara 800.001 - 1.500.000<br>
      Rentang 3 memiliki harga dikisara > 1.500.000 <br>
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      
      <div class="row">
        <!-- <div class="col">
        <b>individu berdasarkan fasiltias</b><br>
        </div> -->
        <div class="col-2">
       <b> Fasilitas primer</b><br>
        1. Tempat tidur<br>
        2. WC<br>
        3. Dapur pribadi <br>
        
        </div>
        <div class="col-3">
        <b>Fasilitas sekunder</b><br>
         1. Ac<br>
         2. Laundry<br>
         3. Almari<br>
         4. Cleaning Service<br>
         5. Meja<br>
         6. Wifi<br>
        </div>
        

      </div>

      <br>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
      <b>Dimana memiliki 3 status idekost</b><br>
      indekost khusus laki-laki <br>
      indekost khusus perempuan<br>
      indekost campur <br>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>
    </div>
  </div>
</div>
  <!-- end FAQ -->
 
  </div>

  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  ...
  </div>
  </div>
  </div>

</div>

  </div>

  
@endsection