<?php
include('php/config.php');
if(isset($_SESSION['id_user'])){
    header('Location: home/');
}else{
    header('Location: login/');
}

