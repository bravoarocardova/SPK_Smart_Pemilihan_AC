<?php 
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM alternatif WHERE id_alternatif = $id"));
  if(isset($_POST['simpan'])){
    // updateAlternatif($_POST);
    if(updateAlternatif($_POST) > 0){
      echo "<script>
            alert('Data Alternatif Berhasil Diubah');
            document.location.href = 'data-alternatif.php';
          </script>";
    }else{
      echo "<script>
            alert('Data Alternatif Gagal Diubah');
            document.location.href = 'data-alternatif.php?m=edit&id=$id';
          </script>";
    }
  }
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
            <!-- general form elements -->
            <a href="data-alternatif.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-angle-double-left"></i> Kembali</a>
            <div class="card card-primary">
              <div class="card-header">
                <div class="col">
                  <h3 class="card-title">Ubah <?= $title ?> </h3>
                </div>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form role="form" action="" method="POST">
                <div class="card-body">
                  <!-- <div class="form-group">
                    <label for="kd_alternatif">Kode Alternatif</label>
                    <input type="text" class="form-control" id="kd_alternatif" name="kd_alternatif">
                  </div> -->
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <label for="alternatif">Alternatif</label>
                    <input type="text" class="form-control" id="alternatif" name="alternatif" value="<?= $row['nm_alternatif'] ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </div>
              </form>
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
