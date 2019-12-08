
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
      
      $alternatif = query("SELECT * FROM alternatif LEFT JOIN ranking ON alternatif.id_alternatif = ranking.id_alternatif ORDER BY skor DESC");
      $cAlternatif = count($alternatif);
      $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) as normalisasi FROM kriteria"));
      $dataKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
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
                      <!-- <th></th> -->
                      <th>Alternatif</th>
                        <?php while($kriteria = mysqli_fetch_assoc($dataKriteria)): ?>
                        <?php //var_dump($kriteria); ?>
                          <th><?= $kriteria['nm_kriteria'] ?></th>
                        <?php endwhile ?>
                        <th>Total</th>
                        <th>Rank</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $r=1;for($a=0; $a<$cAlternatif; $a++): ?>
                        <tr>
                          <td><?= $alternatif[$a]['nm_alternatif'] ?></td>
                          <?php 
                            $idAlternatif = $alternatif[$a]['id_alternatif'];
                            $dataNilaiAlternatif = query( "SELECT * FROM nilai_alternatif LEFT JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE id_alternatif = $idAlternatif");
                            $cdataNilaiAlternatif = count($dataNilaiAlternatif);
                            // var_dump($alternatif);

                            $hasil = [];
                            $hasilrank = [];
                            $nilai=[];
                            for($i=0;$i<$cdataNilaiAlternatif; $i++):
                          ?>
                          <?php
                            $normalisasi = $dataNilaiAlternatif[$i]['bobot'] / $jmlbobot['normalisasi'];
                            $nilai[$i] = $dataNilaiAlternatif[$i]['nilai'] * $normalisasi
                            // var_dump($normalisasi);
                            //var_dump($nilaiAlternatif); 
                          ?>
                          <td><?= $nilai[$i]  ?></td>
                          <?php endfor ?>
                          <?php
                              $rank=[];
                              $hasil[$a] = array_sum($nilai);
                            ?>
                          <td><?= $hasil[$a] ?></td>
                          <td><?= $r++ ?></td>
                        </tr>
                      <?php endfor ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!--  -->
            <!--  -->
            <!--  -->
          </div>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
