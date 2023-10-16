<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button id="test-btn">Ấn vào đây</button>
    <div id="content">
        <h1>buâlla</h1>
    </div>
</body>
    <script>
        var xhr = new XMLHttpRequest();
        document.getElementById('test-btn').addEventListener('click', function(){
            xhr.open('GET', 'Test.php');
            xhr.onload = function(){
                console.log(xhr.responseText);
                document.getElementById('content').innerHTML = xhr.responseText;
            };
            xhr.send();
        });

    </script>
</html>