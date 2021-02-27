@extends('layout/main')

@section('title', 'Browsing')

@section('container')
  <div class="content-wrapper">
   
      <!-- <div class="card bg-dark text-white">
      <a href="#">
        <img
          src="https://mdbootstrap.com/img/new/slides/017.jpg"
          class="card-img"
          alt="indekost"
          style="width: auto;"
        />
        </a>
      <div class="card-img-overlay">
        <h5 class="card-title">Semantic Web Indekost Ontology</h5>
        <p class="card-text">
          I Gusti Lanang Ary Kresnawan-
          1708561031-
          Management Pengetahuan
        </p>
        <p class="card-text">Go somewhere</p>
      </div>
    </div> -->
   
  <ul class="nav nav-tabs" id="myTab" role="tablist" style="text-align: center;">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <a>Browsing adalah menjelajah di situs situs internet yang bertujuan untuk mendapatkan informasi atau data. </a>
  </div>

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <a>Searching adalah kegiatan mencari atau memperoleh informasi yang kita inginkan dengan bantuan mesin pencari (search engine).</a>
  <button type="button" class="btn btn-primary">Primary</button>
  </div>

  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  ...
  </div>
  </div>

</div>

  </div>

  
@endsection