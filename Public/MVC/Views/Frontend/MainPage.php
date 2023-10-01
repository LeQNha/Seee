
    <div class="cover-div" id="cover-div"></div>
    <div class="container">
        <?php
            $rows = $data['QueryResult'];
            
            foreach($rows as $row){ ?>
                    <div class="paint" onclick="ShowDetails('<?php echo $row['path']; ?>')">
                        <p class="image-name"><?php echo $row['path'] ?></p>
                        <img src="Public/img/<?php echo $row["path"] ?> " width="350px" alt="">
                        <!-- <h3> <?php echo $row["title"]; ?> </h3> -->
                        
                    </div>
            <?php }
            ?>
    </div>
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php" ?>
    
        

        