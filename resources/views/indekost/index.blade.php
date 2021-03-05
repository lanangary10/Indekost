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
                $bd="purple";
              }elseif ($bd % 4 ==1) {
                $bd="warning";
              }elseif ($bd % 4 ==2) {
                $bd="navy";
              }elseif ($bd % 4 ==3) {
              $bd="#9E9E9E";
            }
          ?>
          
       

  
  <!-- Nampilin BOX dan isinya -->
  <td>
  <div class="col-lg-3 col-6">
    <div class="small-box   mb-3 bg-purple" style="width: 18rem; background-color: <?php echo $bd ?>;" >
      <div class="card-header text-center">
        <?php echo $carikecamatan ?>
        </div>
      
        <a href="{{ route ('lokasi.kecamatan',[$carikecamatan]) }}" class="small-box-footer">
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
                 <i class="fas fa-chart-area"></i>
            </div>
           
          </div>
          <i class="fas fa-arrow-circle-right"></i></a>
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