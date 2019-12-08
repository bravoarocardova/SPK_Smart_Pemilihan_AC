<?php 
    $conn = mysqli_connect('localhost', 'root', 'popo', 'smart_spk');

    if(isset($_GET['hapus']) && isset($_GET['id'])){
        if($_GET['hapus'] == 'alternatif'){
            $id = $_GET['id'];
            $query = "DELETE FROM alternatif WHERE id_alternatif=$id";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<script>
                    alert('Data Alternatif Berhasil Dihapus');
                    document.location.href = 'data-alternatif.php';
                    </script>";
            }
        }else if($_GET['hapus'] == 'kriteria'){
            $id = $_GET['id'];
            $query = "DELETE FROM kriteria WHERE id_kriteria=$id";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<script>
                    alert('Data Kriteria Berhasil Dihapus');
                    document.location.href = 'data-kriteria.php';
                    </script>";
            }
        }else if($_GET['hapus'] == 'subkriteria'){
            $id = $_GET['id'];
            $query = "DELETE FROM sub_kriteria WHERE id_subkriteria=$id";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<script>
                    alert('Data Sub Kriteria Berhasil Dihapus');
                    document.location.href = 'sub-kriteria.php';
                    </script>";
            }
        }else if($_GET['hapus'] == 'nilaialternatif'){
            $id = $_GET['id'];
            $query = "DELETE FROM nilai_alternatif WHERE id_alternatif=$id";
            $result = mysqli_query($conn,$query);
            if($result){
                echo "<script>
                    alert('Data Nilai Alternatif Berhasil Dihapus');
                    document.location.href = 'nilai-alternatif.php';
                    </script>";
            }
        }
    }

    function query($query){
        global $conn;
        $rows=[];
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;

    }

    function insertAlternatif($data){
        global $conn;
        $nmAlternatif = htmlspecialchars($data['alternatif']);
        $query = "INSERT INTO alternatif VALUE(NULL,'$nmAlternatif')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function updateAlternatif($data){
        global $conn;
        
        $idAlternatif = $data['id'];
        $nmAlternatif = htmlspecialchars($data['alternatif']);
        $query = "UPDATE alternatif SET nm_alternatif='$nmAlternatif' WHERE id_alternatif=$idAlternatif";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function insertKriteria($data){
        global $conn;

        $nmKriteria = htmlspecialchars($data['kriteria']);
        $bobot = htmlspecialchars($data['bobot']);

        $query = "INSERT INTO kriteria VALUE(NULL,'$nmKriteria','$bobot')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function updateKriteria($data){
        global $conn;

        $idKriteria = $data['id'];
        $nmKriteria = htmlspecialchars($data['kriteria']);
        $bobot = htmlspecialchars($data['bobot']);

        $query = "UPDATE kriteria SET nm_kriteria = '$nmKriteria', bobot = '$bobot' WHERE id_kriteria = $idKriteria";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }


    function insertSubKriteria($data){
        global $conn;

        $idKriteria = htmlspecialchars($data['kriteria']);
        $nmSubKriteria = htmlspecialchars($data['sub_kriteria']);
        $nilaiSubKriteria = htmlspecialchars($data['nilai']);

        $query = "INSERT INTO sub_kriteria VALUE(NULL,'$idKriteria','$nmSubKriteria','$nilaiSubKriteria')";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function updateSubKriteria($data){
        global $conn;

        $idSubKriteria = $data['id'];
        $idKriteria = htmlspecialchars($data['kriteria']);
        $nmSubKriteria = htmlspecialchars($data['sub_kriteria']);
        $nilaiSubKriteria = htmlspecialchars($data['nilai']);

        $query = "UPDATE sub_kriteria SET id_kriteria = '$idKriteria', nm_subkriteria = '$nmSubKriteria', nilai = '$nilaiSubKriteria' WHERE id_subkriteria = $idSubKriteria";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function insertNilaiAlternatif($data){
        global $conn;

        $idAlternatif = htmlspecialchars($data['idalternatif']);
        
        $kriteria = count($data['idkriteria']);
        for($i=0; $i<$kriteria; $i++){
            // $idKriteria = $data['idkriteria'][$i];
            // $idSubKriteria = $data['idsubkriteria'][$i];
            $idKriteria = htmlspecialchars($data['idkriteria'][$i]);
            $idSubKriteria = htmlspecialchars($data['idsubkriteria'][$i]);
            if($idSubKriteria != ''){
                $query = "INSERT INTO nilai_alternatif VALUE(NULL,'$idAlternatif','$idKriteria','$idSubKriteria',0)";
                mysqli_query($conn,$query);
            }
            // var_dump($idSubKriteria);
        }
        return mysqli_affected_rows($conn);
    }

    function updateNilaiAlternatif($data){
        global $conn;

        $idAlternatif = htmlspecialchars($data['idalternatif']);
        
        // $idKriteria = $data['idkriteria'];
        // $idSubKriteria = $data['idsubkriteria'];
        $idKriteria = htmlspecialchars($data['idkriteria']);
        $idSubKriteria = htmlspecialchars($data['idsubkriteria']);
        $query = "UPDATE nilai_alternatif SET id_subkriteria = $idSubKriteria WHERE id_alternatif = $idAlternatif AND id_kriteria = $idKriteria";
        mysqli_query($conn,$query);
        return mysqli_affected_rows($conn);
    }

    function ranking(){
        global $conn;
        $alternatif = query("SELECT * FROM alternatif");
        $cAlternatif = count($alternatif);
        $jmlbobot = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(bobot) as normalisasi FROM kriteria"));
        $dataKriteria = mysqli_query($conn, "SELECT * FROM kriteria");
        $dataranking = mysqli_query($conn,"SELECT * FROM ranking");
        
        if(mysqli_num_rows($dataranking)>0){
            mysqli_query($conn,"DELETE FROM ranking");
        }

        foreach($alternatif as $alternatif){
            $idAlternatif = $alternatif['id_alternatif'];
            $dataNilaiAlternatif = query( "SELECT * FROM nilai_alternatif LEFT JOIN kriteria ON nilai_alternatif.id_kriteria = kriteria.id_kriteria JOIN sub_kriteria ON nilai_alternatif.id_subkriteria = sub_kriteria.id_subkriteria WHERE id_alternatif = $idAlternatif");
            $cdataNilaiAlternatif = count($dataNilaiAlternatif);

            $nilai=[];
            foreach($dataNilaiAlternatif as $dataNilaiAlternatif){
                $normalisasi = $dataNilaiAlternatif['bobot'] / $jmlbobot['normalisasi'];
                $nilai[] = $dataNilaiAlternatif['nilai'] * $normalisasi;
            }
            
            $hasil = array_sum($nilai);
            mysqli_query($conn,"INSERT INTO ranking VALUE('$idAlternatif','$hasil')");
        }
    }
?>

