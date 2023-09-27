
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MasterLayout</title>
    <link rel="stylesheet" href="Public/css/MasterLayout.css">
</head>
<body>
    <?php 
        require_once "./MVC/Views/Partitions/Header.php";
        require_once './MVC/Views/Frontend/'.$data["Page"].'.php'; 
    ?>
</body>
</html>