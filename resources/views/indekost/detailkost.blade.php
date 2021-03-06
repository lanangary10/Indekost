<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;
use phpDocumentor\Reflection\PseudoTypes\True_;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('http://127.0.0.1:3030/Ontolgyindekos/query');



?>
@extends('layout/main')

@section('title', 'Detail indekost')

@section('container')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
        
          <!-- <div class="col-auto"> -->
          
             <div class="container">
                <section class="content">

                  <!-- tampilnya  -->


       <div class="row">

          <div class="col-lg-4" >
            <div class="card mb-3 border-warning" style="width:auto;">
                <div class="card-header text-center" style="background-color:  #F8EEE7;"><b>Foto Indekost</b></div>
                  <div class="card-body " >
                      <?php
                                $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Foto ?o. indekost:".$iddetail2." rdfs:label ?label }";
                                $qrkost = $sparql->query($qrdetail);
                                foreach($qrkost as $item){
                                  $queryfoto = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->o->getValue());
                                  $showlabel = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->label->getValue());
   
                                          
                            ?>

                          <?php
                          }
                          ?>
                  <div class="text-center">
                    <img src="{{ URL::asset('images/'.$queryfoto) }}" alt="{{ URL::asset('images/'.$queryfoto) }}" width="320px" height="290px" class="rounded">
                  </div>
                </div>
            </div>
       </div>
       
                    
                    <div class="col">
                    <div class="card mb-3 border-warning" style="max-width: auto;">
                      <div class="card-header text-center card-border border-warning" style="background-color:  #F8EEE7;"> <b>Detail Instance</b></div>
                         <div class="card-body">                
                          <table class="table table-bordered border-warning">
                            <thead>
                              <tr>
                                <th scope="col">Properti</th>
                                <th scope="col">{{ $showlabel }}</th>
                                <th colspan="3">Harga</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <th scope="row">Lokasii</th>
                                <td>
                                <!-- Desa -->
                                <?php
                              $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Berlokasididesa ?s }";
                              $qrkost = $sparql->query($qrdetail);
                              foreach($qrkost as $item){
                                $lokasi = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                
                                        ?>

                              <?php
                                }
                                ?>
                                <!-- end desa -->
                                <a href="{{ route ('konten.lokasi',[$lokasi]) }}" >{{ $lokasi }}</a>

                                   <!-- kecamatan -->
                                   <?php
                              $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Berlokasidikecamatan ?s. ?s rdfs:label ?labelkecamatan }";
                              $qrkost = $sparql->query($qrdetail);
                              foreach($qrkost as $item){
                                $lokasikecamatan = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                $showlabelkecamatan = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->labelkecamatan->getValue());
   
                                
                                        ?>

                              <?php
                                }
                                ?>
                                <!-- end desa -->
                                <a href="{{ route ('konten.lokasikecamatan',[$lokasikecamatan]) }}" >{{ $showlabelkecamatan }}</a>

                           
                                </td>

                                <td colspan="2">

                                    <?php
                                      $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Harga ?s. indekost:".$iddetail2." indekost:Rentang ?r}";
                                      $qrkost = $sparql->query($qrdetail);
                                      foreach($qrkost as $item){
                                        $harga = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getvalue());
                                        $rentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->r->getvalue());
                                        
                                        if ($rentang==1) {
                                          $tambah0='00';
                                        }else {
                                          $tambah0='';
                                        }
                                    ?>
                                    
                                      <a href="{{ route ('harga.show',[$rentang]) }}" >Rp.{{ $harga }}{{ $tambah0 }}</a>
                                      
                                    <?php
                                      }
                                      ?>
                                
                                </td>
                              </tr>

                              <tr>
                                <th scope="row">Fasilitas Sekunder</th>
                                <td colspan="3">
                                <div class="container">
                                <div class="row">
                                
                              <!-- sekunder -->
                              <?php
                              // Fasilitas tersedia di kost
                              $fasilitassekunder = "SELECT DISTINCT * WHERE {indekost:".$iddetail2." indekost:Tersedia ?kost }";
                              $fsekunder = $sparql->query($fasilitassekunder);
                              $hitsekunder=0;
                                foreach($fsekunder as $item){
                                  $tersediasekunder = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->kost->getUri());
                                  $simpansekunder[strtolower($tersediasekunder)]=$tersediasekunder;
                                  $hitsekunder++;
                                  
                                }
                            
                              ?>

                              <?php
                              $chek='disabled';
                              $qrdetail = "SELECT DISTINCT * WHERE {?s rdf:type indekost:Sekunder}";
                              $qrkost = $sparql->query($qrdetail);
                              
                              foreach($qrkost as $item){
                                $tersedia = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                
                                // check jika dia tidak memiliki fasilitas
                                if ($hitsekunder!=0) {                           
                                foreach($simpansekunder as $item2){
                                
                                  if ($simpansekunder[strtolower($item2)]!=$tersedia) {
                                      $chek='disabled';
                                      ($simpansekunder[strtolower($item2)]);

                                  }else {
                                      $chek='checked disabled';
                                      break;
                                  }
                                } //end foreach
                              } //end if  
                              ?>
                                  
                                <div class="col-sm"> 
                                  <input class="form-check-input" type="checkbox" value="<?php echo $tersedia?>" id="fasilitassekunder" name="fasilitassekunder[]" <?php echo $chek?>>
                                  <label class="form-check-label" for="flexCheckCheckedDisabled">
                                  <a href="{{ route ('fs.show',[$tersedia]) }}" >{{ $tersedia }}</a>
                                  
                                  </label>
                                </div>  

                              <?php
                                }
                                ?>

                                </div>
                                </div>
                                </td>
                                
                              </tr>

                              <tr>
                                <th scope="row">Fasilitas Primer</th>
                                <td colspan="3">
                                <div class="container">
                                <div class="row">
                                <!-- Primer -->
                              <?php
                              $fasilitasprimer = "SELECT DISTINCT * WHERE {indekost:".$iddetail2." indekost:Memiliki ?kost }";
                              $fprimer = $sparql->query($fasilitasprimer);

                              foreach($fprimer as $item){
                                $tersediaprimer = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->kost->getUri());
                                $simpanprimer[$tersediaprimer]=$tersediaprimer;
                                
                              }
                      
                              ?>
                
                              <?php
                              $qrdetail = "SELECT DISTINCT * WHERE {?s rdf:type indekost:Primer}";
                              $qrkost = $sparql->query($qrdetail);
                              
                              foreach($qrkost as $item){
                                $memiliki = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                
                                foreach($simpanprimer as $item2){
                                
                                  if ($simpanprimer[$item2]==$memiliki) {
                                    $chek='checked disabled';
                                    unset($simpanprimer[$item2]);
                                    break;
                                                              
                                  }else {
                                    $chek='disabled';
                                  }
                                }
                              ?>
                                  
                            <div class="col-sm"> 
                              <input class="form-check-input" type="checkbox" value="<?php echo $memiliki?>" id="fasilitasprimer" name="fasilitasprimer[]" <?php echo $chek?>>
                              <label class="form-check-label" for="flexCheckCheckedDisabled">

                            
                              <a href="{{ route ('fp.show',[$memiliki]) }}" >{{ $memiliki }}</a>
                              </label>
                            </div>  
                            

                              <?php
                                }
                                ?>
                                  </div>
                                </div>
                              </td>  
                              </tr>

                              <tr>
                                <th scope="row">Khusus</th>
                                <td colspan="3"> <?php
                              $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Khusus ?s }";
                              $qrkost = $sparql->query($qrdetail);
                              foreach($qrkost as $item){
                                $khusus = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                
                                        ?>

                                <a href="{{ route ('stts.show',[$khusus]) }}" >{{ $khusus }}</a>
                                
                              <?php
                                }
                                ?>
                                </td>
                                
                              </tr>

                              <tr>
                                <th scope="row">Menghadap</th>
                                <td colspan="3">
                                
                                <?php
                                  $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Menghadap ?s }";
                                  $qrkost = $sparql->query($qrdetail);
                                    foreach($qrkost as $item){
                                      $menghadap = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                  ?>
      
                                      <a href="{{ route ('hadap.show',[$menghadap]) }}" >{{ $menghadap }}</a>
                                
                                <?php
                                  }
                                  ?>
                                </td>
                              </tr>

                              <tr>
                                <th scope="row">Alamat</th>
                                <td colspan="3">
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

                              <tr>
                                <th scope="row">Kontak</th>
                                <td colspan="3">
                                <?php
                                    $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Nomer_kontak ?s }";
                                    $qrkost = $sparql->query($qrdetail);
                                      foreach($qrkost as $item){
                                        $nomerkontak = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getValue());
                                      
                              
                                              ?>
                                      {{ $nomerkontak }} 

                                    <?php
                                      }
                                      ?>
                                </td>
                    
                              </tr>

                            </tbody>
                      </table>                               

                   
                      
                   
                      </div>
                      </div>
                  
                  
                </div>
                </div> 
                <!-- end row -->
                <!-- alert -->
                <div class="row">             
                  <div class="col">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Browsing<br></strong>"Dengan Cara mengklik salah satu hyperlink yang ada pada Detail Instance maka anda bisa menjelajahi indekos yang memiliki kriteria yang sama dengan hyperlink tersebut".
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                  </div>
                </div>
                <!-- end alert -->
                </div>
              
  
    </section>  
 
 
            </div> <!--container -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
   
    <!-- /.content -->
  </div>
@endsection