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
          <div class="col-8">
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
                      <th></th>
                      <!-- <th>Kode Kriteria</th> -->
                      <th>Kriteria</th>
                      <th>Bobot (%)</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; while($d = mysqli_fetch_assoc($dataKriteria)): ?>
                    <tr>
                      <td><?= ++$i ?></td>
                      <!-- <td><?= $d['id_kriteria'] ?></td> -->
                      <td><?= $d['nm_kriteria'] ?></td>
                      <td><?= $d['bobot'] ?></td>
                      <td>
                        <a href="?m=edit&id=<?= $d['id_kriteria'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="?hapus=kriteria&id=<?= $d['id_kriteria'] ?>" onclick="return confirm('Hapus Data Kriteria?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
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
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
