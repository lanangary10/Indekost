<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;
use phpDocumentor\Reflection\PseudoTypes\True_;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('https://jena.balidigitalheritage.com/fuseki/Ontolgyindekost/query');



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


               

      <!-- <div class="row">

      <?php
            $qreq = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Foto ?eq }";
            $qrekost = $sparql->query($qreq);
            foreach($qrekost as $item){
              $queryfotoreq = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->eq->getValue());
                      
        ?>

      <?php
      }
      ?>

      <div class="col">
      <div class="card mb-3" >
                  
    
                    <div class="col-md-4">
                      <img src="{{ URL::asset('images/'.$queryfotoreq) }}" alt="..." style="max-width: 100px;">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                 
                </div>
                </div>

      <div class="col">
                <div class="card mb-3" >
                  
                    <div class="col-md-4">
                      <img src="..." alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                 
                </div>
                </div>

                

      </div> -->

       <div class="row">

          <div class="col-lg-4" >
            <div class="card mb-3 border-info">
                <div class="card-header text-center">Foto Indekost</div>
                  <div class="card-body " >
                      <?php
                                $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Foto ?o }";
                                $qrkost = $sparql->query($qrdetail);
                                foreach($qrkost as $item){
                                  $queryfoto = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->o->getValue());
                                          
                            ?>

                          <?php
                          }
                          ?>
                  <div class="text-center">
                    <img src="{{ URL::asset('images/'.$queryfoto) }}" alt="{{ URL::asset('images/'.$queryfoto) }}" width="290px" height="290px" class="rounded">
                  </div>
                </div>
            </div>
       </div>
       

                    <div class="col">
                      <div class="card mb-3" style="max-width: auto;">
                        <div class="card-body">                
                          <table class="table table-bordered border-info">
                            <thead>
                              <tr>
                                <th scope="col">Properti</th>
                                <th scope="col">{{ $iddetail2 }}</th>
                                <th colspan="3">Harga</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                  <th scope="row">Lokasi</th>
                                <td>
                                <?php
                              $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Berlokasi ?s }";
                              $qrkost = $sparql->query($qrdetail);
                              foreach($qrkost as $item){
                                $lokasi = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getUri());
                                
                                        ?>

                                <a href="{{ route ('konten.lokasi',[$lokasi]) }}" >{{ $lokasi }}</a>
                                
                              <?php
                                }
                                ?>
                                
                                </td>

                                <td colspan="2">

                                    <?php
                                      $qrdetail = "SELECT DISTINCT * WHERE { indekost:".$iddetail2." indekost:Harga ?s }";
                                      $qrkost = $sparql->query($qrdetail);
                                      foreach($qrkost as $item){
                                        $harga = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->s->getvalue());
                                    ?>
    
                                      <a href="#" >Rp.{{ $harga }}</a>
                                      
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

                                <a href="#" >{{ $khusus }}</a>
                                
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