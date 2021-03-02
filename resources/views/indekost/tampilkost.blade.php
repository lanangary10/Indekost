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

@section('title', 'tampil kost')

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
          $qrdetail = "SELECT * WHERE {?s indekost:Berlokasididesa indekost:".$iddetail.". ?s indekost:Foto ?o. ?s indekost:Harga ?harga. ?s indekost:Alamat ?alamat}";
          $qrkost = $sparql->query($qrdetail);
          foreach($qrkost as $item){
            $querydetail = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
            $queryfoto = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->o->getValue());
            $queryharga = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->harga->getValue());
            $queryalamat = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->alamat->getValue());
        ?>

        <!-- <a href="konten/{{$querydetail}}">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $querydetail ?></h5>
            </div>
        </div>
        </a> -->

        <td>
        <div class="col-lg-3 col-6">
         <div class="card" style="width: 18rem;">

           <img src="{{ URL::asset('images/'.$queryfoto) }}" class="card-img-top" alt="..." width="150px" height="200px">
           
             <div class="card-body">
                <h5 class="card-title"><?php echo $querydetail ?></h5>       
            </div>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">Rp. <?php echo $queryharga ?></li>
              <li class="list-group-item"><span class="d-inline-block text-truncate" style="max-width: 250px;"><?php echo $queryalamat ?></span></li>
            </ul>

            <div class="card-body">
              <a href="{{ route ('detaillokasi.show',[$querydetail]) }}" class="card-link">Another link</a>
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