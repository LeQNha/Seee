<div class="show-details-container">
        <ul class="behavior-list">
            <li class=" close-show-details"><i class="fa-solid fa-xmark"></i></li>
            <li id="behavior-follow-button">
                <div class="follow-button-avatar-container">
                    <img src="/Public/webimg/defaultAvatar.png" alt="">
                </div>
                <span id="follow-status">Theo dõi</span>
            </li>
            <li>
                <i class="fa-regular fa-thumbs-up" id="unlike-icon"></i>
                <i class="fa-solid fa-thumbs-up" id="like-icon"></i>
                <span>Yêu thích</span>
            </li>
            <li>
                <i class="fa-solid fa-heart" id="save-icon"></i>
                <i class="fa-regular fa-heart" id="unsave-icon"></i>
                <span>Lưu</span>
            </li>
            <li>
                <i class="fa-solid fa-share" id="share-icon"></i>
                <span>Chia sẻ</span>
            </li>
            <li class="other-behaviors"><span>...</span></li>
        </ul>
        <div class="show-details">
            <div class="uploader">
                <div class="detail-avatar-container">
                    <a href="#" onclick="ShowPublicUserPage()"><img class="detail-avatar" src="/Public/webimg/defaultAvatar.png" alt=""></a>
                </div>
                <div style="display: flex; align-items: center;">
                    <a href="#"><span class="detail-uploader">uploader</span></a>
                    <!-- <span>Follow</span> -->
                </div>
                <p class="detail-date-uploaded">111-111-111</p>
            </div>
            <div class="image-details">
                <div class="num-like-love">
                    <i class="fa-solid fa-thumbs-up"></i>
                    <span class="number-like">0</span>
                    <i class="fa-solid fa-eye"></i>
                    <span class="number-view">342</span>
                </div>
                <img class="detail-img" src="" alt="">
                <h1 class="detail-title">tes</h1>
                <p class="detail-description">ádadada</p>
            </div>
        </div>
        <div class="comment-form1">
            <div class="comment-sta">
            <h2 class="num-com"><span id="comment-number">46</span> bình luận</h2>
                <div class="sorted" onclick="togglenav_sorteds()">
                    <i class="fa-solid fa-sort-down"></i>
                    <div class="sorted-com">Sắp xếp theo</div>
                </div>
                <div class="nav-sorteds">
                    <div class="nav-sorted selected" onclick="selectnav_sorted(1, 'newestComment')">Bình luận mới nhất</div>
                    <div class="nav-sorted" onclick="selectnav_sorted(2, 'oldestComment')">Bình luận cũ nhất</div>
                    <div class="nav-sorted" onclick="selectnav_sorted(3, 'topComment')">Bình luận hàng đầu</div>
                </div>
            </div>
            <form class="main-form" id="comment-form">
                <div id="user-comment-avt-img-container">
                    <img id="user-comment-avt-img" src="/Public/profileimg/<?= $_SESSION['avatar']; ?>" alt="">
                </div>
                <div class="part-com">
                    <input type="text" name="image-path" id="comment-image-path" value="" hidden>
                    <input id="write-com" name="comment" type="text" placeholder="Viết bình luận...">
                    <div id="btn-com" style="display: none">
                        <button class="close-com" id="close-com">Hủy</button>
                        <button class="post-com" id="post-com">Đăng</button>
                    </div>
                </div>
            </form>
            <div class="comments__container center__display">
                <input type="text" value="<?= $_SESSION['avatar']; ?>" id="get-user-avatar" hidden>
                <input type="text" value="<?= $_SESSION['Login']['username']; ?>" id="get-user-username" hidden>
                <div class="comment__card" style="display: none;">
                    <img id="avt-img" src="https://occ-0-2794-2219.1.nflxso.net/dnm/api/v6/6AYY37jfdO6hpXcMjf9Yu5cnmO0/AAAABeNzg-kMHhUBP4AmHnLsrPYzxKHVceLnkwtLhxZlDssj7KjhStloJR6px7EbquZ83uDcygnWkekxysvuNYVzLQ3GyBMRl2PpU7pO.jpg?r=db8" alt="">
                    <div class="comment__info">
                        <div class="main-com-fo">
                            <span class="nickname">
                                sunrisegxg
                            </span>
                            <p id="currentDate">
                                01/01/2004
                            </p>
                        </div>
                        <p class="comment">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, in magnam! Libero?
                        </p>
                        <div class="comment__bottom">
                            <div class="like__icon--comment">
                                <i id="like__icon" class="fa-regular fa-thumbs-up"></i>
                                <small class="count">0</small>
                                <i id="dislike__icon" class="fa-regular fa-thumbs-down"></i>
                                <small class="count1">0</small>
                            </div>
                            <button class="reply">
                                Phản hồi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
