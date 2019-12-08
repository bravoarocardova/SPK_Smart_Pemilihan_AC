<?php 
  $dataAlternatif = mysqli_query($conn, "SELECT * FROM alternatif");
?>

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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9 col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="col">
                  <h3 class="card-title"><?= $title ?> </h3>
                </div>
                <div class="col text-right">
                <a href="?m=add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th style="width:5%;"></th>
                      <!-- <th>Kode Alternatif</th> -->
                      <th>Alternatif</th>
                      <th>Kriteria</th>
                      <!-- <th>Nilai</th> -->
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; while($dn = mysqli_fetch_assoc($dataAlternatif)): ?>
                    <tr>
                      <td><?= ++$i ?></td>
                      <!-- <td><?= $dn['id_alternatif'] ?></td> -->
                      <td><?= $dn['nm_alternatif'] ?></td>
                      <td>
                        <table>
                          <thead>
                            <tr>
                              <th>Kriteria</th>
                              <th>Nilai</th>
                              <!-- <th>Aksi</th> -->
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            $idAlternatif = $dn['id_alternatif'];
                            $dataNilaiAlternatif = mysqli_query($conn, "SELECT * FROM nilai_alternatif INNER JOIN alternatif ON nilai_alternatif.id_alternatif = alternatif.id_alternatif INNER JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria INNER JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE alternatif.id_alternatif = $idAlternatif");
                            while($dna = mysqli_fetch_assoc($dataNilaiAlternatif)):
                          ?>
                            <tr>
                              <td><?= $dna['nm_kriteria'] ?></td>
                              <td><?= $dna['nm_subkriteria'] ?></td>
                              <td>
                                <a href="?m=edit&id=<?=$dna['id_alternatif'] ?>&idk=<?= $dna['id_kriteria'] ?>&idsk=<?= $dna['id_subkriteria'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                                <!-- <a href="?hapus=nilaialternatif&id=<?= $dna['id_nilaialternatif'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a> -->
                              </td>
                            </tr>
                          <?php endwhile ?>
                          </tbody>
                        </table>
                      </td>
                          <td><a href="?hapus=nilaialternatif&id=<?= $dn['id_alternatif'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a></td>
                        <!-- <td><a href="?m=edit&id=<?= $dn['id_alternatif'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a></td> -->
                    </tr>
                    <?php endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- Tamplilan Kriteria -->
          <!-- <div class="col-lg-3 col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="col">
                  <h3 class="card-title">Kriteria </h3>
                </div>
              </div>
              <!-- /.card-header
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table id="criteria" class="table table-condensed">
                    <thead>
                    <tr>
                      <!-- <th>#</th>
                      <th>Kode Kriteria</th>
                      <th>Kriteria</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; while($c = mysqli_fetch_assoc($dataKriteria)): ?>
                    <tr>
                      <!-- <td><?= ++$i ?></td> 
                      <td><?= $c['id_kriteria'] ?></td>
                      <td><?= $c['nm_kriteria'] ?></td>
                    </tr>
                    <?php endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body
            </div>
            <!-- /.card
          </div> -->
          <!-- End Tampilan Kriteria -->

          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
