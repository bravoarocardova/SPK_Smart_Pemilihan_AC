<?php 
    $idAlternatif = $_GET['id'];
    $idKriteria = $_GET['idk'];
    $idSubKriteria = $_GET['idsk'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM alternatif WHERE id_alternatif = $idAlternatif"));
    $rownilai = mysqli_query($conn, "SELECT * FROM nilai_alternatif WHERE id_alternatif = $idAlternatif");
    $dataAlternatif = mysqli_query($conn,"SELECT * FROM alternatif");
    $dataKriteria = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kriteria WHERE id_kriteria = $idKriteria"));
    $subKriteria = mysqli_query($conn,"SELECT * FROM sub_kriteria");

    if(isset($_POST['simpan'])){
        // var_dump($_POST);
        // updateNilaiAlternatif($_POST);
        if(updateNilaiAlternatif($_POST) > 0){
            echo "<script>
                alert('Nilai Alternatif Berhasil Diubah');
                document.location.href = 'nilai-alternatif.php';
                </script>";
        }else{
            echo "<script>
                alert('Nilai Alternatif Gagal Diubah');
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



    <?php 
        while($rsk = mysqli_fetch_assoc($subKriteria)){
            $sk[] = $rsk;
        }
        while($r = mysqli_fetch_assoc($rownilai)){
            $rn[] = $r;
        }
        // var_dump($rn);
        // var_dump($dataKriteria['nm_kriteria']);
    ?>

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
                                <input type="hidden" name="idalternatif" value="<?= $idAlternatif ?>">
                                <div class="form-group">
                                    <label for="alternatif">Alternatif</label>
                                    <select class="form-control select2" name="idalternatif" style="width: 100%;" disabled>
                                        <option value=""></option>
                                        <?php while($da = mysqli_fetch_assoc($dataAlternatif)): ?>
                                        <option value="<?= $da['id_alternatif'] ?>" <?php if($row['id_alternatif'] == $da['id_alternatif']) echo "selected" ?> disabled><?= $da['nm_alternatif'] ?></option>
                                        <?php endwhile ?>
                                    </select>
                                </div>
                                <!--  -->

                                <!-- <?php 
                                //while($dk = mysqli_fetch_assoc($dataKriteria)): 
                                    //$idSub = $dk['id_kriteria'];
                                    //$dataSubKriteria = mysqli_query($conn,"SELECT * FROM sub_kriteria WHERE id_kriteria = $idSub")    
                                ?>
                                <div class="form-group">
                                    <label><?//= $dk['nm_kriteria'] ?></label>
                                    <input type="hidden" name="idkriteria[]" value="<?//= $dk['id_kriteria'] ?>">
                                    <select class="form-control select2" name="idsubkriteria[]" style="width: 100%;">
                                        <option value=""></option>
                                        <?php //$i=0; while($dsb = mysqli_fetch_assoc($dataSubKriteria)): ?>
                                        <option value="<?//= $dsb['id_subkriteria'] ?>"><?//= $dsb['nm_subkriteria'] ?></option>
                                        <?php //$i++; endwhile ?>
                                        </select>
                                </div>
                                <?php //endwhile ?> -->

                                <?php 
                                    // $idSub = $dk['id_kriteria'];
                                    $dataSubKriteria = mysqli_query($conn,"SELECT * FROM sub_kriteria INNER JOIN kriteria ON sub_kriteria.id_kriteria = kriteria.id_kriteria WHERE sub_kriteria.id_kriteria = $idKriteria");    
                                    // while($dk = mysqli_fetch_assoc($dataKriteria)): 
                                        // var_dump($dataSubKriteria);
                                        ?>
                                <div class="form-group">
                                    <label><?= $dataKriteria['nm_kriteria'] ?></label>
                                    <input type="hidden" name="idkriteria" value="<?= $dataKriteria['id_kriteria'] ?>">
                                    <select class="form-control select2" name="idsubkriteria" style="width: 100%;">
                                        <option value=""></option>
                                        <?php while($dsb = mysqli_fetch_assoc($dataSubKriteria)): ?>
                                        <option value="<?= $dsb['id_subkriteria'] ?>" <?= ($dsb['id_subkriteria'] == $idSubKriteria) ? 'selected' : '' ?>><?= $dsb['nm_subkriteria'] ?></option>
                                        <!-- <?php var_dump($dsb); ?> -->
                                        <?php endwhile ?>
                                        </select>
                                </div>
                                <!-- <?php //endwhile ?> -->
                                
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
