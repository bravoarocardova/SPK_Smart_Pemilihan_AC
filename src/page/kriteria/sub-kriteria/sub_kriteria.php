<?php
    include "koneksi.php";

    $query=mysqli_query($conn,"SELECT * FROM krieria");
    $hasil=[];
    while($d = mysqli_fetch_assoc($dataKriteria)){
        $idKriteria=$d['id_kriteria'];
        $query2=mysqli_query($conn,"SELECT * FROM sub_kriteria INNER JOIN kriteria ON sub_kriteria.id_kriteria = kriteria.id_kriteria WHERE kriteria.id_kriteria = $idKriteria");
        while($ds = mysqli_fetch_assoc($query2)){
            $hasil[]=$ds;
        }
    }

    json_encode($hasil);
?>