<?php

$title = 'Sub Kriteria';
include 'src/template/header.php' ;
include 'src/template/navbar.php' ;
include 'src/template/aside.php' ;
if(isset($_GET['m'])){
    if($_GET['m'] == 'add'){
        include 'src/page/kriteria/sub-kriteria/tambah-content.php' ;
    }else if($_GET['m'] == 'edit'){
        include 'src/page/kriteria/sub-kriteria/ubah-content.php' ;
    }
}else{
    include 'src/page/kriteria/sub-kriteria/content.php' ;
}
include 'src/template/footer.php' ;