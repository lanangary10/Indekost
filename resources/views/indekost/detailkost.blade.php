<?php
require_once '../vendor/autoload.php';

use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('http://127.0.0.1:3030/Ontolgyindekost/query');



?>
@extends('layout/main')

@section('title', 'Detail indekost')

@section('container')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-auto">
          <div class="container">
  <div class="row">
    <div class="col-sm">
    <section class="content">
            

        <div class="container">

          <div class="row">
          
          

            <div class="col-auto">
            <img src="{{ URL::asset('images/001kost.jpg') }}" alt="..." width="150px" height="150px">
              
            </div>
            
            <div class="col-4">
              <table class="table table-striped">
                <tbody>
                
                  <tr>
                    <td>Indekost</td>
                    <td>{{ $iddetail2 }}</td>
                  </tr> 

                  <tr>
                    <td>Fasilitas</td>
                      <td>
                        
                         <?php
                        //  rentang
                        $filterrentang = "SELECT * WHERE { indekost:".$iddetail2." indekost:Rentang ?r}";
                        $qrfilter = $sparql->query($filterrentang);
                        
                
                          foreach($qrfilter as $item){
                          $tampilfilterrentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->r->getValue());
                          
                          }
                          
                          // if ada rentang
                          if ($tampilfilterrentang!=1) {
                            # code...
                          

                          // Tersedia
                          $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Tersedia ?s.}";
                          $qrkost = $sparql->query($qrdetail);
                          $hit=0;
                          foreach($qrkost as $item){
                            $tersedia = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                           
                              
                            
                                    ?>
                            
                        
                           {{ $tersedia }} -

                           <?php
                           }
                            }
                            ?>
                      </td>
                  </tr>

                  <tr>
                    <td>Memiliki </td>
                      <td>
                      <?php
                          $qrdetail = "SELECT DISTINCT * WHERE {indekost:".$iddetail2." indekost:Memiliki ?b  }";
                          $qrkost = $sparql->query($qrdetail);
                          foreach($qrkost as $item){
                            $memiliki = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->b->getUri());

                           
                                    ?>
                            
                            {{ $memiliki }}-

                           <?php
                            }
                            ?>
                       

                         
                      </td>
                  </tr>
                  <tr>
                    <td>Berlokasi </td>
                      <td>
                        
                         <?php
                          $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Berlokasi ?s }";
                          $qrkost = $sparql->query($qrdetail);
                          foreach($qrkost as $item){
                            $lokasi = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                            
                                    ?>
                           {{ $lokasi }} -

                           <?php
                            }
                            ?>
                      </td>
                  </tr>

                  <tr>
                    <td>Rentang </td>
                      <td>
                        
                         <?php
                          $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Rentang ?s }";
                          $qrkost = $sparql->query($qrdetail);
                          foreach($qrkost as $item){
                            $rentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getValue());
                            
                            if ( $rentang  >= "2") {
                              echo "800.000 - 1.000.000";
                         
                            } else {
                              echo "1.000.000-1.500.000";
                            }
                                    ?>
                            
                           

                           <?php
                            }
                            ?>
                      </td>
                  </tr>

                  <tr>
                    <td>Alamat </td>
                      <td>
                        
                         <?php
                          $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Alamat ?s }";
                          $qrkost = $sparql->query($qrdetail);
                          foreach($qrkost as $item){
                            $alamat = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getValue());
                            
                     
                                    ?>
                            {{ $alamat }} 
                           

                           <?php
                            }
                            ?>
                      </td>
                  </tr>
                  
                </tbody>
              </table>

              </div>
                  

                  <!-- tampilnya  -->
                  <?php
                          $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Foto ?o }";
                          $qrkost = $sparql->query($qrdetail);
                          foreach($qrkost as $item){
                            $queryfoto = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->o->getValue());
                            
                  ?>

                            <?php
                            }
                            ?>

                  <div class="card mb-3" style="max-width: auto;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ URL::asset('images/'.$queryfoto) }}" alt="..." width="350px" height="350px">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                      <table>
                      <tr>
                      <td><h5 class="card-title">{{ $iddetail2 }}</h5></td>
                      
                      </tr>

                      <tr>
                          <td>Fasilitas: </td>
                          <td>{{$alamat}}</td>
                      </tr>

                   
                      </table>
                        
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        {{ $alamat }} 
                      </div>
                    </div>
                  </div>
                </div>



            

          </div>
        </div>

    
    
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