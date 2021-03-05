<?php


use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
RdfNamespace::set('indekost', 'http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#');
$sparql = new Client('https://jena.balidigitalheritage.com/fuseki/Ontolgyindekost/query');


$primersekunder = $sparql->query("SELECT * WHERE {?s indekost:Tersedia indekost:Ac. ?s indekost:Tersedia indekost:Wifi. ?s indekost:Tersedia indekost:Laundry }");

?>
@extends('layout/main')

@section('title', 'Searching')

@section('container')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Searching</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <!-- Hide Div clas col-lg-3 col-6 buat dia jadi 1 layer -->
          <!-- <div class="col-lg-3 col-6"> -->
          <!-- end hide div -->

            <!-- small box -->
            <form action="" method="GET">
            
            <div class="row">  <!-- row1 -->
            <!-- Lokasi -->
            <div class="row">
            <div class="col-6">
            <div class="text-nowrap font-weight-bold" style="width: 8rem;">lokasi Indekost</div>
                <div class="input-group mb-3">
                    <select class="custom-select" id="lokasi" name="lokasi">
                      <option value="kosong">Pilih...</option>
                       <?php
                   
                       $qrlokasi = "SELECT * WHERE {?lokasi rdf:type indekost:Desa}";
                       $lokasi = $sparql->query($qrlokasi);

                       foreach($lokasi as $m){
                           $namalokasi = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$m->lokasi->getUri());
                       ?>
                       <option value="<?php echo $namalokasi ?>">{{ $namalokasi }}</option>
                       <?php }?>
                  </select>
              </div>
              </div>
              <!-- end lokasi -->
              
               <!-- Menghadap -->
              <div class="col-6">
              <div class="text-nowrap font-weight-bold" style="width: 8rem;">Menghadap Arah </div>
              <div class="input-group mb-3">
                    <select class="custom-select" id="arah" name="arah">
                      <option value="kosong">Indekost menghadap...</option>
                       <?php
                   
                       $qrarah = "SELECT * WHERE {?hdp rdf:type indekost:Arah}";
                       $hdp = $sparql->query($qrarah);

                       foreach($hdp as $st){
                           $namaarah = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$st->hdp->getUri());
                       ?>
                       <option value="<?php echo $namaarah ?>">{{ $namaarah }}</option>
                       <?php }?>
                  </select>
              </div>
              </div>
              <!-- end menghadap -->
              </div>  <!-- end row1 -->


              <div class="row"> <!-- row 3 -->
             <!-- status -->
             <div class="col-6">
             <div class="text-nowrap font-weight-bold" style="width: 8rem;">Indekos Status</div>
              <div class="input-group mb-3">
                    <select class="custom-select" id="status" name="status">
                      <option value="kosong">Indekost Khusus...</option>
                       <?php
                   
                       $qrstatus = "SELECT * WHERE {?stat rdf:type indekost:Status}";
                       $stat = $sparql->query($qrstatus);

                       foreach($stat as $st){
                           $namastatus = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$st->stat->getUri());
                       ?>
                       <option value="<?php echo $namastatus ?>">{{ $namastatus }}</option>
                       <?php }?>
                  </select>
              </div>
              </div>
              <!-- end status -->

               <!-- Rentang -->
             <div class="col-6">
             <div class="text-nowrap font-weight-bold" style="width: 8rem;">Rentang Harga indekos</div>
              <div class="input-group mb-3">
                    <select class="custom-select" id="rentang" name="rentang">
                      <option value="kosong">Rentang</option>
                       <?php
                   
                       $qrrentang = "SELECT DISTINCT ?rentang  WHERE { ?kost indekost:Rentang ?rentang . FILTER (?rentang in (1,2,3))}";
                       $rtg = $sparql->query($qrrentang);

                       foreach($rtg as $st){
                           $namarentang = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$st->rentang->getValue());
                       ?>
                       <option value="<?php echo $namarentang ?>">{{ $namarentang }}</option>
                       <?php }?>
                  </select>
              </div>
              </div>
              <!-- end Rentang -->
              </div> <!-- end row3 -->





            <div class="row"><!-- row2 -->
           
             <!-- Fasilitas sekunder-->
             <div class="col-2">
            
             <div class="text-nowrap font-weight-bold" style="width: 8rem;">Fasilitas Sekunder</div>
              <div class="form-check form-check-inline">
                <div class="input-group row">

               
                       <?php
                    
                       $qrfasilitas = "SELECT * WHERE {?fasilitas rdf:type indekost:Sekunder}";
                       $fasilitas = $sparql->query($qrfasilitas);
                       $fhit=0;
                       $fnumber=[];
                       $cekminusfasilitas=[];
                      
                       
                       foreach($fasilitas as $f){
                          $listfasilitas = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$f->fasilitas->getUri());
                          $fnumber[$fhit]=0;
                          $fhit++;
                          $cekminusfasilitas[$listfasilitas]['status']=false;

                         
                           ?> 
                    
                           <div class="form-check form-check-inline">
                            <input class="form-check-input" name="fasilitas[]" type="checkbox" id="fasilitas" value="<?php echo $listfasilitas?>">
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo $listfasilitas ?></label>
                          </div>
                     
                       
                       <?php }   ?>

                </div>
              </div>
              </div>
               <!-- end fasilitas sekunder-->

              
               <!-- Fasilitas Primer-->
             <div class="col-3">
             <div class="text-nowrap font-weight-bold" style="width: 8rem;">Fasilitas Primer</div>
              <div class="form-check form-check-inline">
                <div class="input-group eow">

               
                       <?php
                    
                       $qrfasilitasprimer = "SELECT * WHERE {?fasilitasprimer rdf:type indekost:Primer}";
                       $fasilitasprimer = $sparql->query($qrfasilitasprimer);
                       $fhitprimer=0;
                       $fnumberprimer=[];
                       $cekminusfasilitasprimer=[];

                       foreach($fasilitasprimer as $f){
                           $listfasilitasprimer = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$f->fasilitasprimer->getUri());
                          $fnumberprimer[$fhitprimer]=0;
                          $fhitprimer++;
                          $cekminusfasilitasprimer[$listfasilitasprimer]['status']=false;

                         
                           ?> 
                    
                          
                           <div class="form-check form-check-inline">
                            <input class="form-check-input" name="fasilitasprimer[]" type="checkbox" id="fasilitasprimer" value="<?php echo $listfasilitasprimer?>">
                            <label class="form-check-label" for="inlineCheckbox1"><?php echo $listfasilitasprimer ?></label>
                          </div>
                       
                       <?php }   ?>

                </div>
              </div>
              
              </div>
              <!-- end fasilitasprimer-->

              </div>  <!-- end row2-->
            
              <div class="col">
            <input type="submit" name="cari" value="Cari" class="btn btn-primary">
            <input type="submit" name="reset" value="Reset" class="btn btn-danger" onclick="resetPage()">
            </div>

            </div>

        </form>

   

        <?php
        if (isset($_GET['cari']))
        {
          
          
          $hasillokasi = $_GET['lokasi'];
          $hasilstatus = $_GET['status'];
          $hasilarah = $_GET['arah'];
          $hasirentang = $_GET['rentang'];
         

          $querydata = 'SELECT * WHERE { ?indekost rdf:type indekost:Nama_indekost';
         
          if ($_GET['lokasi']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Berlokasididesa indekost:".$_GET['lokasi'];
            
          } 
          if ($_GET['status']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Khusus indekost:".$_GET['status'];
            
          } 
          if ($_GET['arah']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Menghadap indekost:".$_GET['arah'];
            
          } 
          if ($_GET['rentang']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Rentang ".$_GET['rentang'];
            
          } 
        


           // Fasilitas primer
           if (isset($_GET['fasilitasprimer'])) {
            $hasilFasilitasprimer = $_GET['fasilitasprimer'];   
            
  
            foreach($hasilFasilitasprimer as $item){
              $querydata = $querydata.". ?indekost indekost:Memiliki indekost:".$item."";
          }
  
          // Spesifik
          //  $cekFasilitasTidakTerpilihprimer = array("Kamar_mandi_dalam" => "Kamar_mandi_dalam", "Dapur_pribadi" => "Dapur_pribadi", "Tempat_tidur" => "Tempat_tidur");
          // foreach($hasilFasilitasprimer as $item){
          //     unset($cekFasilitasTidakTerpilihprimer[$item]);
          // }
  
          // foreach($cekFasilitasTidakTerpilihprimer as $item){
          //   $querydata = $querydata.". MINUS {?indekost indekost:Memiliki indekost:".$item."}";
          // }
  
   
             }
            //  else {
            //   $cekFasilitasTidakTerpilihprimer = array("Kamar_mandi_dalam" => "Kamar_mandi_dalam", "Dapur_pribadi" => "Dapur_pribadi", "Tempat_tidur" => "Tempat_tidur");
            //   foreach($cekFasilitasTidakTerpilihprimer as $item){
            //     $querydata = $querydata.". MINUS {?indekost indekost:Memiliki indekost:".$item."}";
            // }
             
            //  }
            //  end fasilitas primer

          // Fasilitas Sekunder
          if (isset($_GET['fasilitas'])) {
          $hasilFasilitas = $_GET['fasilitas'];   


          foreach($hasilFasilitas as $item){
            $querydata = $querydata.". ?indekost indekost:Tersedia indekost:".$item."";
        }

        // Spesifik
        //  $cekFasilitasTidakTerpilih = array("Ac" => "Ac", "Almari" => "Almari", "Cleaning_service" => "Cleaning_service", "Meja" =>  "Meja", "Laundry" => "Laundry", "Wifi" => "Wifi");
        // foreach($hasilFasilitas as $item){
        //     unset($cekFasilitasTidakTerpilih[$item]);
        // }

        // foreach($cekFasilitasTidakTerpilih as $item){
        //   $querydata = $querydata.". MINUS {?indekost indekost:Tersedia indekost:".$item."}";
        // }

 
       }
    //    else {
    //     $cekFasilitasTidakTerpilih = array("Ac" => "Ac", "Almari" => "Almari", "Cleaning_service" => "Cleaning_service", "Meja" =>  "Meja", "Laundry" => "Laundry", "Wifi" => "Wifi");
    //     foreach($cekFasilitasTidakTerpilih as $item){
    //       $querydata = $querydata.". MINUS {?indekost indekost:Tersedia indekost:".$item."}";
    //   }
    // }
          //  end fasilitas sekunder
            
           $querydata = $querydata."}";
           $query=$sparql->query($querydata);
          
          $jumlah = 0;
          foreach($query as $getjumlah){
            $jumlah = $jumlah + 1;
          
          }
          
          $arrayuri = array();
          $iterasikost = 0;
          foreach($query as $item){
            $idkost = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$item->indekost->getUri());
            
            
            $arrayuri[$iterasikost] = $idkost;

            $iterasikost++;
            
          }
         
        ?>

<!-- TAMPILAN HASIL SEARCHING -->
<div class="col">
<div class="container-fluid">
          <div class="text-nowrap font-weight-bold mt-3"><h2>Hasil</h2></div>
          <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Kost</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $iteration = 0;
              if($jumlah > 0){
                for($indekost = 1; $indekost <= $jumlah; $indekost++){
                  if($indekost < $jumlah){
                    if($arrayuri[$indekost - 1] != $arrayuri[$indekost]){
                      $iteration = $iteration + 1;
                      $id = $arrayuri[$indekost - 1];
              ?>
              <tr>
                <th scope="row">{{ $iteration }}</th>
                <td><a href="{{ route ('detaillokasi.show',[$id]) }}" class="text-decoration-none text-muted"><?php echo $arrayuri[$indekost - 1]; ?></a></td>
              </tr>
              <?php
                    }
                  } else { $iteration = $iteration + 1; $id = $arrayuri[$indekost - 1]; ?>
              <tr>
                <th scope="row">{{ $iteration }}</th>
                <td><a href="{{ route ('detaillokasi.show',[$id]) }}" class="text-decoration-none text-muted"><?php echo $arrayuri[$indekost - 1]; ?></a></td>
              </tr>
              <?php
                  }
                } 
              } else { ?>
              <tr>
                <th scope="row"></th>
                <td>Tidak ada data Indekost dengan kriteria tersebut.</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php } ?>
        </div>
        <?php 
        if (isset($_GET['cari'])){
          
        
        ?>
        <div class="col">
        <div class="alert alert-info alert-dismissable">
        <p style="font-size: 20px;"><b>QUERY</b></p>
        <?php 
       echo $querydata;
        }
        ?>
      
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection