<link rel="stylesheet" href="./Public/css/ImagesContainer.css">
<div class="container">
        <?php
            $rows = $data['Rows'];
            
            foreach($rows as $row){ ?>
                    <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                        <p class="image-name"><?php echo $row['path'] ?></p>
                        <img src="Public/img/<?php echo $row["path"] ?> " width="350px" alt="" loading="lazy">
                        <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                        
                    </div>
            <?php }
        ?>
</div>