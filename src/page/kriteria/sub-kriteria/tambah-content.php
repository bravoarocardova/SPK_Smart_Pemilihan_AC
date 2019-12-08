<?php 
    $kriteria = mysqli_query($conn,"SELECT * FROM kriteria");

    if(isset($_POST['simpan'])){
        if(insertSubKriteria($_POST) > 0){
            echo "<script>
                alert('Data Sub Kriteria Berhasil Ditambah');
                document.location.href = 'sub-kriteria.php';
                </script>";
        }else{
            echo "<script>
                alert('Data Sub Kriteria Gagal Ditambah');
                document.location.href = 'sub-kriteria.php?m=add';
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
                    <a href="sub-kriteria.php" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-angle-double-left"></i> Kembali</a>
                    <div class="card card-primary">
                        <div class="card-header">
                            <div class="col">
                                <h3 class="card-title">Tambah <?= $title ?> </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kriteria">Kriteria</label>
                                    <select class="form-control select2" name="kriteria">
                                        <option value=""></option>
                                        <?php while($k = mysqli_fetch_assoc($kriteria)): ?>
                                        <option value="<?= $k['id_kriteria'] ?>"><?= $k['nm_kriteria'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_riteria">Sub Kriteria</label>
                                    <input type="text" class="form-control" id="sub_kriteria" name="sub_kriteria">
                                </div>
                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" class="form-control" id="nilai" name="nilai">
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
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->