<?php
    if(isset($_GET['action'])&&isset($_GET['query'])){
        $action=$_GET['action'];
        $query=$_GET['query'];
    }
    else 
    {
        $action='';
        $query='';
    }
    if( $action=='homepage' && $query=='none')
    {
        include("homepage.php");

    }
    else include("homepage.php");

?>