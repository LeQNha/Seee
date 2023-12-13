<?php require_once './MVC/Core/UserData.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imey</title>

    <link rel="stylesheet" href="/Public/css/MasterLayout.css">
    <link rel="stylesheet" href="/Public/css/Header.css">
    <link rel="stylesheet" href="/Public/css/Footer.css">
    <link rel="stylesheet" href="/Public/css/ScrollUp.css">
    <link rel="stylesheet" href="/Public/css/ShowDetailContainer.css">
    <link rel="stylesheet" href="/Public/css/NotifyMessage.css">
    <link rel="stylesheet" href="/Public/css/Paint.css">
    <?php
        if($data["Page"] == 'PersonalPage'){ ?>
            <link rel="stylesheet" href="/Public/css/ShowDetailContainer_Created.css">
        <?php }
    ?>
    
    <link rel="stylesheet" href="/Public/css/<?php echo $data['Page']; ?>.css  ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php 
        require_once "./MVC/Views/Partitions/Header.php";
        require_once './MVC/Views/Frontend/'.$data["Page"].'.php';
        // if($data["Page"] == 'PersonalPage'){
        //     require_once './MVC/Views/Partitions/ShowDetailContainer_Created.php';
        // }
        require_once './MVC/Views/Partitions/ScrollUp.php';
        // if($data["Page"] != 'MainPage'){
        //     require_once './MVC/Views/Partitions/Footer.php';
        // }
        require_once './MVC/Views/Partitions/NotifyMessage.php'
    ?>

        <script src="/Public/js/MasterLayout.js"></script>
        <script src="/Public/js/Header.js"></script>
        <script src="/Public/js/ScrollUp.js"></script>
        <script src="/Public/js/<?php echo $data['Page']; ?>.js"></script>
        <script src="/Public/js/ShowDetailContainer.js"></script>
        <script src="/Public/js/NotifyMessage.js"></script>
        </script>
        <?php
            if($data['Page'] == 'PersonalPage'){ ?>
                <script src="/Public/js/ShowDetailContainer_Created.js"></script>
            <?php }
        ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>