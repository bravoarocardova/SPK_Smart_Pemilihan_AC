<?php 
  $dataKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
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
                      <!-- <th>Kode Sub Kriteria</th> -->
                      <th>Kriteria</th>
                      <th>Sub Kriteria</th>
                      <!-- <th>Nilai</th> -->
                      <!-- <th>Aksi</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; while($d = mysqli_fetch_assoc($dataKriteria)): ?>
                    <tr>
                      <td><?= ++$i ?></td>
                      <!-- <td><?= $d['id_subkriteria'] ?></td> -->
                      <td><?= $d['nm_kriteria'] ?></td>
                      <td>
                      <table>
                        <thead>
                          <tr>
                            <th>Sub Kriteria</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $idKriteria = $d['id_kriteria'];
                          $dataSubKriteria = mysqli_query($conn, "SELECT * FROM sub_kriteria INNER JOIN kriteria ON sub_kriteria.id_kriteria = kriteria.id_kriteria WHERE kriteria.id_kriteria = $idKriteria"); 

                          while($ds = mysqli_fetch_assoc($dataSubKriteria)): 
                        ?>
                          <tr>
                            <td><?= $ds['nm_subkriteria'] ?></td>
                            <td><?= $ds['nilai'] ?></td>
                            <td>
                              <a href="?m=edit&idk=<?= $idKriteria ?>&ids=<?= $ds['id_subkriteria'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                              <a href="?hapus=subkriteria&id=<?= $ds['id_subkriteria'] ?>" onclick="return confirm('Hapus Data Subkriteria?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                          </tr>
                          <?php endwhile ?> 
                        </tbody>
                      </table>
                      </td>
                      <!-- <td><?= $d['nm_subkriteria'] ?></td> -->
                      <!-- <td><?= $d['nilai'] ?></td> -->
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
                    <?php $i=0; while($d = mysqli_fetch_assoc($dataKriteria)): ?>
                    <tr>
                      <!-- <td><?= ++$i ?></td>
                      <td><?= $d['id_kriteria'] ?></td>
                      <td><?= $d['nm_kriteria'] ?></td>
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
