<?php

$title = 'Data Alternatif';
include 'src/template/header.php' ;
include 'src/template/navbar.php' ;
include 'src/template/aside.php' ;
if(isset($_GET['m'])){
    if($_GET['m'] == 'add'){
        include 'src/page/alternatif/data-alternatif/tambah-content.php' ;
    }else if($_GET['m'] == 'edit'){
        include 'src/page/alternatif/data-alternatif/ubah-content.php' ;
    }
}else{
    include 'src/page/alternatif/data-alternatif/content.php' ;
}
include 'src/template/footer.php' ;