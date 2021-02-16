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
            <div class="text-nowrap font-weight-bold" style="width: 8rem;">lokasi Indekost</div>
                <div class="input-group mb-3">
                    <select class="custom-select" id="lokasi" name="lokasi">
                      <option value="kosong">Pilih...</option>
                       <?php
                   
                       $qrlokasi = "SELECT * WHERE {?lokasi rdf:type indekost:Kecamatan}";
                       $lokasi = $sparql->query($qrlokasi);

                       foreach($lokasi as $m){
                           $namalokasi = str_replace('http://www.semanticweb.org/msi/ontologies/2021/0/ta-ontology-23#','',$m->lokasi->getUri());
                       ?>
                       <option value="<?php echo $namalokasi ?>">{{ $namalokasi }}</option>
                       <?php }?>
                  </select>
              </div>

              
             
             <!-- yang baru di edit -->
              <div class="form-check form-check-inline">
                <div class="input-group mb-3">

               
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

                           <!-- <input type="checkbox" name="fasilitas[]" id="fasilitas" value="<?php echo $listfasilitas?>">
                           <label class="form-check-label" for="inlineCheckbox1"><?php echo $listfasilitas ?></label>  -->
                            
                         
                           
           

                       
                       <?php }   ?>

                 
                </div>
              </div>
              <!-- akhir yang baru di edit -->
             
             <!-- status -->
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

            
            <input type="submit" name="cari" value="Cari" class="btn btn-primary">
            <input type="submit" name="reset" value="Reset" class="btn btn-danger" onclick="resetPage()">
        </form>

   

        <?php
        if (isset($_GET['cari']))
        {
          
          
          $hasillokasi = $_GET['lokasi'];
          $hasilstatus = $_GET['status'];
         

          $querydata = 'SELECT * WHERE { ?indekost rdf:type indekost:Nama_indekost';
         
          if ($_GET['lokasi']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Berlokasi indekost:".$_GET['lokasi'];
            
          } 
          if ($_GET['status']!="kosong") {
            $querydata=$querydata.". ?indekost indekost:Khusus indekost:".$_GET['status'];
            
          } 

          if (isset($_GET['fasilitas'])) {
          $hasilFasilitas = $_GET['fasilitas'];   


          foreach($hasilFasilitas as $item){
            $querydata = $querydata.". ?indekost indekost:Tersedia indekost:".$item."";
        }


          // 

            // if ($item=='Ac' && $cekminusfasilitas[$item]['status']!=true) {
            //   $querydata = $querydata.".MINUS {?indekost indekost:Tersedia indekost:Ac}";
            // }
            // if ($item=='Ac' && $cekminusfasilitas[$item]['status']!=true) {
            //   $querydata = $querydata.".MINUS {?indekost indekost:Tersedia indekost:Almari}";
            // } 
            
         



         $cekFasilitasTidakTerpilih = array("Ac" => "Ac", "Almari" => "Almari", "Cleaning_service" => "Cleaning_service", "Meja" =>  "Meja", "Laundry" => "Laundry", "Wifi" => "Wifi");
        foreach($hasilFasilitas as $item){
            unset($cekFasilitasTidakTerpilih[$item]);
        }

        foreach($cekFasilitasTidakTerpilih as $item){
          $querydata = $querydata.". MINUS {?indekost indekost:Tersedia indekost:".$item."}";
        }

 
           }
            
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
                <td><a href="search/{{$id}}" class="text-decoration-none text-muted"><?php echo $arrayuri[$indekost - 1]; ?></a></td>
              </tr>
              <?php
                    }
                  } else { $iteration = $iteration + 1; $id = $arrayuri[$indekost - 1]; ?>
              <tr>
                <th scope="row">{{ $iteration }}</th>
                <td><a href="search/{{$id}}" class="text-decoration-none text-muted"><?php echo $arrayuri[$indekost - 1]; ?></a></td>
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
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection