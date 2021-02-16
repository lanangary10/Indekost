<?php
require_once '../vendor/autoload.php';

use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('http://127.0.0.1:3030/Ontolgyindekost/query');

$arah = $sparql->query("SELECT * WHERE {?s rdf:type indekost:Arah}");

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
            foreach($arah as $item){
              $cariarah = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());

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
        
          <a href="kecamatan/{{$cariarah}}">
          
          <div class="card text-end" style="width: 19rem;">
              <div class="card-body">
                  <h5 class="card-title"><?php echo $cariarah ?></h5>
              </div>
          </div>
          
          </a>
        </td> -->
  
  <!-- Nampilin BOX dan isinya -->
  <td>
  <div class="col-lg-3 col-6">

    <!-- warna box -->
             <!-- query buat tau berapa jumlah kecamatan di kabupatennya -->
          <?php
                $jmlkost = $sparql->query("SELECT * WHERE {?k indekost:Menghadap indekost:".$cariarah."}");
                
                $j=0;
                  foreach($jmlkost as $item){
                    $jmlh = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->k->getUri());
                    $j++; 

                   
          ?>
                
            <!-- nentuin warna -->
            <?php 
            $w=$j;
            if ($w<=3) {
                $bd="#cdfffc";
            }elseif ($w>=4 && $w <=6) {
                $bd="#fde8cd";
            }elseif ($w>=6 && $w <=7) {
                $bd='red';
            }elseif ($w>=8 && $w <=10) {
                $bd="#ff4646";
            }
        } //tutup foreach  
            ?>
    <div class="small-box   mb-3" style="width: 18rem; background-color: <?php echo $bd ?>;" >
      <div class="card-header text-center">
        <?php echo $cariarah ?>
        </div>
      
          <div class="card-body">
         
            <p class="card-text"><?php  echo "Indekost : "; echo $j ?></?php>
            <div class="icon">
                <i class="ion ion-ios-home"></i>
            </div>
              <a href="arah/{{$cariarah}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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