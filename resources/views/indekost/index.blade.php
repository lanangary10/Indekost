<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('https://jena.balidigitalheritage.com/fuseki/Ontolgyindekost/query');

$lokasi = $sparql->query("SELECT * WHERE {?s rdf:type indekost:Kabupaten}");

?>
@extends('layout/main')

@section('title', 'Kabupaten')

@section('container')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <div class="container">
  <div class="row">
    <div class="col-sm">
    <section class="content">
       <table>
        
          <?php
          
          $i=0;
            foreach($lokasi as $item){
              $carikecamatan = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());

              $bd=$i;
              if ($bd % 4 ==0) {
                $bd="#ff7b54";
              }elseif ($bd % 4 ==1) {
                $bd="#cdfffc";
              }elseif ($bd % 4 ==2) {
                $bd="#fde8cd";
              }elseif ($bd % 4 ==3) {
              $bd="#ff4646";
            }
          ?>
          
       

        <!-- <td>
        
          <a href="kecamatan/{{$carikecamatan}}">
          
          <div class="card text-end" style="width: 19rem;">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $carikecamatan ?></h5>
              </div>
          </div>
          
          </a>
        </td> -->
  
  <!-- Nampilin BOX dan isinya -->
  <td>
  <div class="col-lg-3 col-6">
    <div class="small-box   mb-3" style="width: 18rem; background-color: <?php echo $bd ?>;" >
      <div class="card-header text-center">
        <?php echo $carikecamatan ?>
        </div>
      
          <div class="card-body">
          <!-- query buat tau berapa jumlah kecamatan di kabupatennya -->
          <?php
                $jmlkost = $sparql->query("SELECT * WHERE {?k indekost:Bagiandari indekost:".$carikecamatan."}");
                
                $j=0;
                  foreach($jmlkost as $item){
                    $jmlh = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->k->getUri());
                    $j++; 
          ?>
                

            <p class="card-text"><?php }  echo "Kecamatan : "; echo $j ?></p>
            <div class="icon">
                <i class="ion ion-ios-home"></i>
            </div>
              <a href="{{ route ('lokasi.kecamatan',[$carikecamatan]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
       </div>
    </div>
  </td>

          <?php
          $i++;
          if ($i%4==0) {
            
          
          ?>
          <tr></tr>
          <?php
           }//tutup if
          }
        
          ?>
        </table>
    </section>
    </div>
    
  </div>
</div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
@endsection