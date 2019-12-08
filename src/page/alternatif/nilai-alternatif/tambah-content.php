<?php 
    $dataAlternatif = mysqli_query($conn,"SELECT * FROM alternatif");
    $dataKriteria = mysqli_query($conn,"SELECT * FROM kriteria");

    if(isset($_POST['simpan'])){
        // var_dump($_POST);
        // insertNilaiAlternatif($_POST);
        if(insertNilaiAlternatif($_POST) > 0){
            echo "<script>
                alert('Nilai Alternatif Berhasil Ditambah');
                document.location.href = 'nilai-alternatif.php';
                </script>";
        }else{
            echo "<script>
                alert('Nilai Alternatif Gagal Ditambah');
                document.location.href = 'nilai-alternatif.php?m=add';
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
    <!--  -->


    <!--  -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <!-- general form elements -->
                    <a href="nilai-alternatif.php" class="btn btn-primary btn-sm mb-2"><i
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
                                <!-- <div class="form-group">
                                    <label for="kd_alternatif">Kode Alternatif</label>
                                    <input type="text" class="form-control" id="kd_alternatif" name="kd_alternatif">
                                </div> -->
                                <div class="form-group">
                                    <label for="alternatif">Alternatif</label>
                                    <select class="form-control select2" name="idalternatif" style="width: 100%;">
                                        <option value=""></option>
                                        <?php while($da = mysqli_fetch_assoc($dataAlternatif)): ?>
                                        <option value="<?= $da['id_alternatif'] ?>"><?= $da['nm_alternatif'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                                <!--  -->

                                <?php 
                                while($dk = mysqli_fetch_assoc($dataKriteria)): 
                                    $idSub = $dk['id_kriteria'];
                                    $dataSubKriteria = mysqli_query($conn,"SELECT * FROM sub_kriteria WHERE id_kriteria = $idSub")    
                                ?>
                                <div class="form-group">
                                    <label><?= $dk['nm_kriteria'] ?></label>
                                    <input type="hidden" name="idkriteria[]" value="<?= $dk['id_kriteria'] ?>">
                                    <select class="form-control select2" name="idsubkriteria[]" style="width: 100%;">
                                        <option value=""></option>
                                        <?php while($dsb = mysqli_fetch_assoc($dataSubKriteria)): ?>
                                        <option value="<?= $dsb['id_subkriteria'] ?>"><?= $dsb['nm_subkriteria'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                        <!-- <input type="hidden" name="nilai" value="<?= $d['nilai_kriteria'] ?>"> -->
                                </div>
                                <?php endwhile ?>
                                
                                <!--  -->
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
