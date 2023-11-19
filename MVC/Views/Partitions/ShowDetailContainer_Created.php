<div class="show-details-container-created">
            <ul class="behavior-list-created">
                <li class="close-show-details-created"><i class="fa-solid fa-xmark"></i></li>
                <li>
                    <i class="fa-solid fa-square-check" id="update-button-created"></i>
                    <span>Cập nhật</span>
                </li>
                <li>
                    <i class="fa-solid fa-trash-can" id="delete-button-created"></i>
                    <span>Xóa</span>
                </li>
                <!-- <li>
                    <button id="comment-button-main"><i class="fa-solid fa-comment" id="comment-button"></i></button>
                    <span>Bình luận</span>
                </li> -->
            </ul>
        <div class="show-details-created">
                <div class="uploader-created">
                    <div class="detail-avatar-container-created">
                        <a href="#"><img class="detail-avatar-created" src="./Public/webimg/defaultAvatar.png" alt=""></a>
                    </div>
                    <div>
                        <a href="PublicUserPage.php"><span class="detail-uploader-created">uploader</span></a>
                        <!-- <span>Follow</span> -->
                    </div>
                    <p class="detail-date-uploaded-created">111-111-111</p>
                </div>
                <div class="image-details-created">
                    <div class="separate"></div>
                    <div class="main-see">
                        <div id="created-image-container">
                            <img class="detail-img-created" src="https://vtv1.mediacdn.vn/2018/11/22/photo-3-15428716111551636354706.jpg" alt="">
                        </div>
                        <form action="#" method="post" id="update-image-infor-form">
                            <input type="text" id="detail-title-created" name="detailTitleCreated"></input>
                            <textarea id="description-created" name="descriptionCreated"></textarea>
                        </form>
                    </div>

                    <div class="nav-see">
                        <div class="separate1"></div>
                        <div class="detail-infor">
                            <div class="detail-emotion">
                                <h4>23 lượt like</h4>
                                <i class="fa-solid fa-thumbs-up like-icon-created"></i>
                                <h4>,</h4>&nbsp;
                                <h4>50 lượt yêu thích</h4>
                                <i class="fa-solid fa-heart" id="icon-heart"></i>
                            </div>
                            <div class="detail-comment">
                                <h4>54 bình luận</h4>
                                <i class="fa-solid fa-comment" id="comment-button1"></i>
                                <h4>,</h4>&nbsp;
                                <h4>100 người đã xem</h4>
                                <i class="fa-solid fa-eye"></i>
                            </div>
                        </div>
                        <div class="separate2"></div>
                        <div id="comment-container" class="comments">
                            <!-- Thêm các comment khác ở đây -->
                            <input type="text" value="<?= $_SESSION['avatar']; ?>" id="get-user-avatar-created" hidden>
                            <input type="text" value="<?= $_SESSION['Login']['username']; ?>" id="get-user-username-created" hidden>
                            <div class="comment__card1" style="display: none">
                                <img id="avt-img1" src="https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/6AYY37jfdO6hpXcMjf9Yu5cnmO0/AAAABeNzg-kMHhUBP4AmHnLsrPYzxKHVceLnkwtLhxZlDssj7KjhStloJR6px7EbquZ83uDcygnWkekxysvuNYVzLQ3GyBMRl2PpU7pO.jpg?r=db8" alt="">
                                <div class="comment__info1">
                                    <div class="main-com-fo1">
                                        <small class="nickname1">
                                            sunrisegxg
                                        </small>
                                        <p id="currentDate1">
                                            01/01/2004
                                        </p>
                                    </div>
                                    <p class="comment10">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, in magnam! Libero?
                                    </p>
                                    <div class="comment__bottom1">
                                        <div class="like__icon--comment1">
                                            <i id="like__icon1" class="fa-regular fa-thumbs-up"></i>
                                            <small class="counted">0</small>
                                            <i id="dislike__icon1" class="fa-regular fa-thumbs-down"></i>
                                            <small class="counted1">0</small>
                                        </div>
                                        <button class="reply1">
                                            Phản hồi
                                        </button>
                                        <button onclick="deleteDiv()" class="delete1">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="comment">
                            <form class="comment-form" id="comment-form-created">
                            <input type="text" name="image-path" id="comment-image-path-created" value="" hidden>
                                <textarea placeholder="Viết bình luận..." name="comment" class="comment-input" id="comment-input"></textarea>
                                <i class="fa-solid fa-paper-plane" id="send"></i>
                            </form>
                        </div>
                    </div>                    
                </div>
                
        </div>
    </div>
