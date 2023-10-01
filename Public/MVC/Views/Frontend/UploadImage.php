
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
                <input type="text" name="title" id="title" placeholder="Tiêu đề">
                <div class="title-bottom-border bottom-border" id="title-bottom-border"></div>
                <p class="alertP">Tiêu đề không hợp lệ!</p>
                <textarea name="description" id="description" placeholder="Mô tả" oninput="autoResize()"></textarea>
                <div class="description-bottom-border bottom-border" id="description-bottom-border"></div>
                <input type="submit" name="submit" value="Đăng tải" id="submit">
            </div>
        </form>
    </div>
    
    <div class="alert-message"><p>Thay đổi thành công!</p></div>
        