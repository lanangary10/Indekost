<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('https://jena.balidigitalheritage.com/fuseki/Ontolgyindekost/query');




?>
@extends('layout/main')

@section('title', 'Desa')

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
          $desaquery = "SELECT * WHERE {?s indekost:Bagiandari indekost:".$iddesa.". ?s rdfs:label ?label }";
          $desa = $sparql->query($desaquery);
          foreach($desa as $item){
            $caridetailkost = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
            $showlabel = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->label->getValue());
   
            $bd=$i;
            if ($bd % 3 ==0) {
              $bd="purple";
            }elseif ($bd % 3 ==1) {
              $bd="warning";
            }elseif ($bd % 3 ==2) {
              $bd="navy";
            }
        ?>
       

        <!-- Nampilin BOX dan isinya -->
          <td>
          <div class="col-lg-3 col-6">
            <div class="small-box  bg-<?php echo $bd ?> mb-3" style="width: 18rem;">
              <div class="card-header text-center">
                <h4><?php echo $showlabel ?></h4>
                </div>
              
                <a href="{{ route ('pilih.indekost',[$caridetailkost]) }}" class="small-box-footer">
                  <div class="card-body">
                  <!-- query buat tau berapa jumlah kecamatan di kabupatennya -->
                  <?php
                        $jmlkost = $sparql->query("SELECT * WHERE {?k indekost:Berlokasididesa indekost:".$caridetailkost."}");
                        
                        $j=0;
                          foreach($jmlkost as $item){
                            $jmlh = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->k->getUri());
                            $j++; 
                  ?>
                        

                    <p class="card-text"><h5><?php }  echo "Indekost : "; echo $j ?> </h5></p>
                    <div class="icon">
                        <i class="ion ion-ios-home"></i>
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
        }
      }
        ?>

    </table>
    </section>
    </div>
    


    <div class="col-sm">
  
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