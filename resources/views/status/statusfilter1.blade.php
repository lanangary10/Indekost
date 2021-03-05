<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('https://jena.balidigitalheritage.com/fuseki/Ontolgyindekost/query');

$status = $sparql->query("SELECT * WHERE {?s rdf:type indekost:Status}");

?>
@extends('layout/main')

@section('title', 'Filter Status Indekost')

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
            foreach($status as $item){
              $caristatus = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());

            //   $bd=$i;
            //   if ($bd % 4 ==0) {
            //     $bd="#ff7b54";
            //   }elseif ($bd % 4 ==1) {
            //     $bd="#cdfffc";
            //   }elseif ($bd % 4 ==2) {
            //     $bd="#fde8cd";
            //   }elseif ($bd % 4 ==3) {
            //   $bd="#ff4646";
            // }
          ?>
          
       

  
  <!-- Nampilin BOX dan isinya -->
  <td>
  <div class="col-lg-3 col-6">

    <!-- warna box -->
             <!-- query buat tau berapa jumlah kecamatan di kabupatennya -->
          <?php
                $jmlkost = $sparql->query("SELECT * WHERE {?k indekost:Khusus indekost:".$caristatus."}");
                
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


 <!-- small box -->
 <div class="small-box bg-purple" style="width: 18rem; background-color: <?php echo $bd ?>;">
              <div class="inner">
                <h3> <?php echo $caristatus ?><sup style="font-size: 20px"></sup></h3>

                <p><?php  echo "Indekost : "; echo $j ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
           
               
              <a href="status/{{$caristatus}}" class="small-box-footer"> More info  <?php echo $caristatus ?> <i class="fas fa-arrow-circle-right"></i></a>
       </div>
       <!-- end small box -->




    <!-- card box -->
    <!-- <div class="small-box   mb-3" style="width: 18rem; background-color: <?php echo $bd ?>;" >
      <div class="card-header text-center">
        <?php echo $caristatus ?>
        </div>
      
          <div class="card-body">
         
            <p class="card-text"><?php  echo "Indekost : "; echo $j ?></?php>
            <div class="icon">
                <i class="ion ion-ios-home"></i>
            </div>
              <a href="status/{{$caristatus}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
       </div> -->

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