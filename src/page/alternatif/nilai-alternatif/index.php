<?php

$title = 'Nilai Alternatif';
include 'src/template/header.php' ;
include 'src/template/navbar.php' ;
include 'src/template/aside.php' ;
if(isset($_GET['m'])){
    if($_GET['m'] == 'add'){
        include 'src/page/alternatif/nilai-alternatif/tambah-content.php' ;
    }else if($_GET['m'] == 'edit'){
        include 'src/page/alternatif/nilai-alternatif/ubah-content.php' ;
    }
}else{
    include 'src/page/alternatif/nilai-alternatif/content.php' ;
}
include 'src/template/footer.php' ;