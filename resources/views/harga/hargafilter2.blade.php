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
    <table class="table">
        
        
        
        <?php
        $i=0;

     
        
            $filterrentang = "SELECT * WHERE { ?s rdf:type indekost:Nama_indekost. ?s indekost:Rentang ".$idfilterharga.". ?s indekost:Foto ?o. ?s indekost:Harga ?p. ?s indekost:Alamat ?q. ?s rdfs:label ?label}";
           
            $qrfilter = $sparql->query($filterrentang);

            foreach($qrfilter as $item){
            $tampilfilterrentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
            $queryfoto = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->o->getValue());
            $querytampilharga = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->p->getValue());
            $querytampilalamat = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->q->getValue());
            $showlabel = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->label->getValue());

        ?>
       

        
     
        <td>
        <div class="col-lg-3 col-6">
         <div class="card" style="width: 18rem;">

           <img src="{{ URL::asset('images/'.$queryfoto) }}" class="card-img-top" alt="..." width="150px" height="200px">
           
             <div class="card-body">
                <h5 class="card-title"><?php echo $showlabel?></h5>       
            </div>

            <ul class="list-group list-group-flush">
              <li class="list-group-item">Harga : Rp <?php echo $querytampilharga ?> </li>
              <!-- yang buat kata jadi .... span text-truncate -->
              <li class="list-group-item"> <span class="d-inline-block text-truncate" style="max-width: 250px;"><?php echo $querytampilalamat ?> </span> </li>
            </ul>

            <div class="card-body">
                 <a href="{{ route ('detaillokasi.show',[$tampilfilterrentang]) }}" class="card-link">Detail Indekost--> </a>
            </div>
            
         </div>
         </div>
         </td>

        <?php
        $i++;
        if ($i%4==0)
        {
          ?> 
          <tr></tr> 
           <?php
        }
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