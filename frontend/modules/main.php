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
    else if( $action=='aboutuspage' && $query=='none')
    {
        include("aboutuspage.php");
    }
    else if( $action=='contractpage' && $query=='none')
    {
        include("contractpage.php");
    }
    else if( $action=='menupage')
    {   
        if( $query=='none') include("menupage.php");
    }
    else if( $action=='product')
    {   
        if( $query=='none') include("product.php");
    }
    else if( $action=='cart')
    {
        if($query=='none') include("cart.php");
    }
    else if( $action=='tintucpage')
    {
        if($query=='none') include("tintucpage.php");
    }
    else if( $action=='content')
    {
        if($query=='none') include("content.php");
    }
    else if( $action=='cartnone')
    {
        if($query=='none') include("cartnone.php");
    }
    else if( $action=='search')
    {
        if($query=='none') include("searchpage.php");
    }
    else if( $action=='profile')
    {
        if($query=='none') include("profilepage.php");
    }
    else if( $action=='thankyou')
    {
        if($query=='none') include("thankyoupage.php");
    }
    else include("homepage.php");   

?>