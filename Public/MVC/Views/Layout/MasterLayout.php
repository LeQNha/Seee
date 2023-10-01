<?php require_once './MVC/Core/UserData.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seee</title>
    <link rel="stylesheet" href="Public/css/MasterLayout.css">
    <link rel="stylesheet" href="Public/css/Header.css">
    <link rel="stylesheet" href="Public/css/ScrollUp.css">
    <link rel="stylesheet" href="Public/css/ShowDetailContainer.css">
    <link rel="stylesheet" href="Public/css/<?php echo $data['Page']; ?>.css  ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <?php 
        require_once "./MVC/Views/Partitions/Header.php";
        require_once './MVC/Views/Frontend/'.$data["Page"].'.php';
        require_once './MVC/Views/Partitions/ScrollUp.php'; 
    ?>

        <script src="Public/js/Header.js"></script>
        <script src="Public/js/ScrollUp.js"></script>
        <script src="./Public/js/<?php echo $data['Page']; ?>.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>