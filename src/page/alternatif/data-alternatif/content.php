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
                      <th style="width:5%;"></th>
                      <!-- <th>Kode Alternatif</th> -->
                      <th>Alternatif</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; while($d = mysqli_fetch_assoc($dataAlternatif)): ?>
                    <tr>
                      <td><?= ++$i ?></td>
                      <!-- <td><?= $d["id_alternatif"] ?></td> -->
                      <td><?= $d["nm_alternatif"] ?></td>
                      <td>
                        <a href="?m=edit&id=<?= $d['id_alternatif'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="?hapus=alternatif&id=<?= $d['id_alternatif'] ?>" onclick="return confirm('Hapus Data Alternatif?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</a>
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
