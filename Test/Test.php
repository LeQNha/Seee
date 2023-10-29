<?php 
     
        
            if(isset($_GET['pid'])){
                $pid = $_GET['pid'];
                $detailTitleCreated = $_POST['detailTitleCreated'];
                $descriptionCreated = $_POST['descriptionCreated'];

                echo 'success';
            }else{
                echo 'ko nhận';
            }
        
           
        
        // if(isset($_POST['username'])){
        //     $detailTitleCreated = $_POST['username'];
        //     $descriptionCreated = $_POST['password'];
        //     echo 'nhan dc post';
        // }else{
        //     if(isset($_GET['pid'])){
        //         $pid = $_GET['pid'];
        //         $detailTitleCreated = $_POST['username'];
        //         $descriptionCreated = $_POST['password'];


        //         echo 'success';
        //     }else{
        //         echo 'ko nhận';
        //     }
        // }
?>