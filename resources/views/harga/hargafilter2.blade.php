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

@section('title', 'Nama Indekost')

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
    <table class="table table-hover">
        
        <tr>
        
        <?php
        $i="0";

     
        
          $filterrentang = "SELECT * WHERE { ?s rdf:type indekost:Nama_indekost. ?s indekost:Rentang ".$idfilterharga."}";
          $qrfilter = $sparql->query($filterrentang);
          
  
            foreach($qrfilter as $item){
            $tampilfilterrentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());

        ?>
       

        
     
            <td>
              <a href="indekost/{{$tampilfilterrentang}}">
              <div class="card" style="width: 18rem;">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $tampilfilterrentang ?></h5>
                  </div>
              </div>
              </a>
              </td>
       

        <?php
        $i= $i+1;
        if ($i%2==0)
        {
          ?> <tr></tr>  <?php
        }
        
        }
        ?>

</tr>

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