
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--  -->

    <?php 
      $dataAlternatif = mysqli_query($conn,"SELECT * FROM alternatif");
      $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) FROM kriteria"));
    ?>


    <!--  -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-10">
            <div class="card">
              <div class="card-header">
                <div class="col">
                  <h3 class="card-title"><?= $title ?> </h3>
                </div>
                <div class="col text-right">
                <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table table-bordered ">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Alternatif</th>
                        <th>Kriteria</th>
                        <th>Input</th>
                        <th>Utility</th>
                        <th>Normalisasi</th>
                        <th>Hasil</th>
                      <!-- <th>Hasil Akhir</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $j=0; while($da = mysqli_fetch_assoc($dataAlternatif)): ?>
                    <?php 
                      $idAlternatif = $da['id_alternatif'];
                      $kriteria = mysqli_query($conn, "SELECT * FROM nilai_alternatif INNER JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria INNER JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE id_alternatif = $idAlternatif");
                      $rowspan = $kriteria->num_rows + 1;
                      $hasilakhir = mysqli_query($conn, "SELECT * FROM nilai_alternatif INNER JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria INNER JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE id_alternatif = $idAlternatif");
                    ?>
                    <tr>
                      <td rowspan="<?= $rowspan ?>"><?= ++$j  ?></td>
                      <td rowspan="<?= $rowspan ?>"><?= $da['nm_alternatif'] ?></td>
                      <!--  -->
                      <?php 
                        $jmlhsil = $hasilakhir->num_rows;
                        $ha = 0;
                        $hakhir = 0;
                        
                        for ($i=0; $i < $jmlhsil; $i++){
                          $r[$i] = mysqli_fetch_assoc($hasilakhir); 
                          $normalisasi1[$i] = $r[$i]['bobot'] / $jmlbobot['SUM(bobot)'];
                          $ha = $r[$i]['nilai'] * $normalisasi1[$i];
                          $hakhir =  $hakhir + $ha;
                        }
                        // var_dump($hakhir);
                        
                        // var_dump($r);
                        // var_dump($ha);
                        // var_dump($r[0]['nilai']);
                        // var_dump($r[1]['nilai']);
                        
                      ?>
                      <?php $i=0;
                        while($nk = mysqli_fetch_assoc($kriteria)):
                      ?>
                      <!-- <td colspan=6> -->
                      <tr>
                        <td><?= $nk['nm_kriteria'] ?></td>
                        <td><?= $nk['nm_subkriteria'] ?></td>
                        <td><?= $nk['nilai'] ?></td>
                        <td><?php $normalisasi = $nk['bobot'] / $jmlbobot['SUM(bobot)']; echo $normalisasi; ?></td>
                        <td><?php $hasil = $nk['nilai'] * $normalisasi; echo $hasil; ?></td>
                      </tr>
                      <?php endwhile ?>
                      <!-- </td> -->
                      <td></td>
                      <th colspan=5 class="text-red">Hasil Akhir</th><th class="text-red"><?= $hakhir; ?></th>
                    </tr>
                    <?php endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!--  -->
            <!--  -->
            <!--  -->
            <!-- /.card -->
            <div class="card col-6">
              <div class="card-header">
                <div class="col">
                  <h3 class="card-title">Ranking </h3>
                </div>
                <div class="col text-right">
                <!-- <a href="" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a> -->
                </div>
              </div>
              <!--  -->

              <?php
                $dataAlternatif = mysqli_query($conn,"SELECT * FROM alternatif");
                $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) FROM kriteria"));
                
              ?>

              <!--  -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatableranking" class="table table-bordered ">
                  <thead>
                    <tr>
                      <th width="20">Rank</th>
                      <th>Alternatif</th>
                      <th>Hasil</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      //var_dump($dataAlternatif);
                      $jmlalternatif = $dataAlternatif->num_rows;
                      // var_dump($jmlalternatif);
                    ?>
                    <?php $j=0; while($rk = mysqli_fetch_assoc($dataAlternatif)): ?>
                    <?php 
                      $idAlternatif = $rk['id_alternatif'];
                      $hasilakhir1 = mysqli_query($conn, "SELECT * FROM nilai_alternatif INNER JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria INNER JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria INNER JOIN alternatif ON nilai_alternatif.id_alternatif = alternatif.id_alternatif WHERE nilai_alternatif.id_alternatif = $idAlternatif");
                      // var_dump($hasilakhir1);
                      $jmlhsil = $hasilakhir1->num_rows;
                      $ha = 0;
                      $hakhir = 0;
                      $hakhir1 = [];
                      
                      for ($i=0; $i < $jmlhsil; $i++){
                        $r[$i] = mysqli_fetch_assoc($hasilakhir1); 

                        $normalisasi1[$i] = $r[$i]['bobot'] / $jmlbobot['SUM(bobot)'];
                        $ha = $r[$i]['nilai'] * $normalisasi1[$i];
                        $hakhir =  $hakhir + $ha;
                        // var_dump($hakhir);
                      }
                      for($i=0; $i<$jmlalternatif; $i++){
                        $hakhir1[$i]=$hakhir;
                      }
                      ?>
                    <tr>
                      <td><?= ++$j ?></td>
                      <td><?= $rk['nm_alternatif'] ?></td>
                      <td><?= $hakhir ?></td>
                    </tr>
                    <?php endwhile ?>
                      <?php //var_dump($hakhir1); ?>
                  </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
