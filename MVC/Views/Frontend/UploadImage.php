
<div class="cover-div" id="cover-div"></div>
    
    <div class="container">
        <form action="#" method="post" id="upload-form" enctype="multipart/form-data">
            <div class="image-container">
            <div id="trash-can"><i class="fa-solid fa-trash-can"></i></div>
                <div class="image-show">
                    <img id="selected-image" src="" alt="">
                    <p>Nhấp vào để tải lên</p>
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
            </div>
            <div class="image-infor">
                <input type="file" name="myImage" class="myImage">
                <div class="upload-date"> <?php echo date('d/m/Y') ?> </div>
                <div class="category-img" onclick="toggleOptions2()">
                    <input type="text" name="category" class="categories" id="categories" placeholder="Chọn thể loại">
                    <i class="fa-solid fa-caret-down down-click1"></i>
                </div>
                <div class="cate-others">
                    <?php
                        $count = 0;
                        foreach($data['Categories'] as $category){ ?>
                            <div class="cate-other" onclick="selectOption2(<?= ++$count; ?>)"><?= $category['category']; ?></div>
                        <?php }
                    ?>
                </div>
                <input type="text" name="title" id="title" placeholder="Tiêu đề">
                <div class="title-bottom-border bottom-border" id="title-bottom-border"></div>
                <p class="alertP">Tiêu đề không hợp lệ!</p>
                <textarea name="description" id="description" placeholder="Mô tả" oninput="autoResize()"></textarea>
                <div class="description-bottom-border bottom-border" id="description-bottom-border"></div>
                <input type="submit" name="submit" value="Đăng tải" id="submit">

                <input type="text" name="keywords" placeholder="keyword">
                <!-- <input style="width: 100px; height: 20px; margin-left: 130px;" type="text" name="category" placeholder="category"> -->
            </div>
        </form>
    </div>
                
           
    
        