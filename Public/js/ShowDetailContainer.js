var xhr = new XMLHttpRequest();

var likeIcon = document.getElementById('like-icon');
var unlikeIcon = document.getElementById('unlike-icon');
likeIcon.addEventListener('click', ToggleLike);
unlikeIcon.addEventListener('click', ToggleLike);
var saveIcon = document.getElementById('save-icon');
var unsaveIcon = document.getElementById('unsave-icon');
saveIcon.addEventListener('click', ToggleSave);
unsaveIcon.addEventListener('click', ToggleSave);

var behaviorFollowButton = document.getElementById('behavior-follow-button');
behaviorFollowButton.addEventListener('click', ToggleFollow);


//Show img details
var showDetailsContainer = document.querySelector('.show-details-container');
var detailTile = document.querySelector('.detail-title');
var detailImg = document.querySelector('.detail-img');
var detailDescription = document.querySelector('.detail-description');
var dateUploaded = document.querySelector('.detail-date-uploaded');
var detailUploader = document.querySelector('.detail-uploader');
var detailUploaderAvatar = document.querySelector('.detail-avatar');
var paints = document.getElementsByClassName('paint');

var likeNumber = document.querySelector('.image-details .number-like');
// for(i = 0 ; i<paints.length; i++){
//   paints[i].addEventListener('click', GetComments);
// }
var imgId = "";

//FILTER
var nav_sorteds = document.querySelector('.nav-sorteds');

//COMMENT SECTION
var commentNum = document.getElementById('comment-number');
var currentDateParagraph = document.getElementById('currentDate');
var currentDate = new Date();

var day = currentDate.getDate();
var month = currentDate.getMonth() + 1; // Lưu ý rằng tháng bắt đầu từ 0
var year = currentDate.getFullYear();

var formattedDate = day + '/' + month + '/' + year;
currentDateParagraph.textContent = formattedDate;

var comment = document.getElementById('write-com');
var btn = document.getElementById("btn-com");
var post1 = document.getElementById("post-com");
// Hiển thị nhóm nút
comment.addEventListener("click", function() {
  btn.style.display = "block";
});
var close1 = document.getElementById("close-com");
//comment form
var commentImagePath = document.getElementById('comment-image-path');

var getUserAvatar = document.getElementById('get-user-avatar');
var getUsername = document.getElementById('get-user-username');


function ShowDetails(pid){
  //ngăn trang web cuộn
  document.body.style.overflow = "hidden";

  //close show details
  var closeShowDetailsButton = document.querySelector('.close-show-details');
  closeShowDetailsButton.addEventListener('click',function(){

    var showDetailsContainer = document.querySelector('.show-details-container');
    showDetailsContainer.style.display = "none";
    //close filter
    nav_sorteds.style.display = "none";
    showDetailsContainer.classList.add("show-details-container-show-up");
    setTimeout(function () {
      showDetailsContainer.classList.remove("show-details-container-show-up");
    }, 1); // Thời gian đếm ngược (đơn vị: mili giây)
    
    document.body.style.overflow = "auto";
  });

  xhr.open('POST', '/index.php?controller=ShowDetailContainer&action=GetImage');
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function() {
    console.log(xhr.responseText);
    var receivedData = JSON.parse(xhr.responseText);
    showDetailsContainer.style.display = "block";
    setTimeout(function () {
      showDetailsContainer.classList.add("show-details-container-show-up");
    }, 20); // Thời gian đếm ngược (đơn vị: mili giây)
    
    // imgDetailsContainer.innerHTML = receivedData.title;
    detailTile.textContent = receivedData.title;
    detailImg.src = "/Public/img/"+receivedData.path;
    detailDescription.textContent = receivedData.description;
    dateUploaded.textContent = receivedData.dateuploaded
    detailUploader.textContent = receivedData.uploader;
    detailUploaderAvatar.src = "/Public/profileimg/"+receivedData.uploaderAvatar;
    likeNumber.textContent = receivedData.likeNumber;
    document.querySelector('.behavior-list li .follow-button-avatar-container img').src = "/Public/profileimg/"+receivedData.uploaderAvatar;
    

    imgId = receivedData.path;
    commentImagePath.value = imgId;
    CheckLikeSaveFollow(imgId, function() {
      GetComments(imgId);
  });
  };
  

  xhr.send("pid=" + encodeURIComponent(pid));

  
}

var followStatus = document.getElementById('follow-status');

//aslkdfjsladkf
function ShowPublicUserPage(){
  window.location.href = "/index.php?controller=Imey&action=PublicUserPage&uploader="+detailUploader.textContent;
}

  //Toggle like
  function ToggleLike(){
  
      toggle = "like";
      if(likeIcon.style.display == "block"){
        toggle = "unlike";
      }
      var displayStyle = window.getComputedStyle(likeIcon).display;
      if(displayStyle === "none"){
      
      }else{
        toggle = "unlike";
      }
      
      xhr.open('POST', '/index.php?controller=ShowDetailContainer&action=ToggleLike');
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function(){
      if(xhr.status == 200){
        console.log(xhr.responseText);
          if(xhr.responseText.trim() === "like"){
            likeIcon.style.display = "block";
            unlikeIcon.style.display = "none";
            likeNumber.textContent = parseInt(likeNumber.textContent) +1;
          }
          if(xhr.responseText.trim() === 'unlike'){
            likeIcon.style.display = "none";
            unlikeIcon.style.display = "block";
            likeNumber.textContent = parseInt(likeNumber.textContent) -1;
          } 
      }else{
          alert('Đã có lỗi xảy ra!');
      }
    };

    xhr.send("toggle=" + encodeURIComponent(toggle) + "&imgId=" + encodeURIComponent(imgId));
  }

  //Toggle save
  function ToggleSave(){
  
    toggle = "save";
    if(saveIcon.style.display == "block"){
      toggle = "unsave";
    }
    var displayStyle = window.getComputedStyle(saveIcon).display;
    if(displayStyle === "none"){
    
    }else{
      toggle = "unsave";
    }
    
    xhr.open('POST', '/index.php?controller=ShowDetailContainer&action=ToggleSave');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status == 200){
      console.log(xhr.responseText);
        if(xhr.responseText.trim() === "save"){
          saveIcon.style.display = "block";
          unsaveIcon.style.display = "none";
          // likeNumber.textContent = parseInt(likeNumber.textContent) +1;
        }
        if(xhr.responseText.trim() === 'unsave'){
          saveIcon.style.display = "none";
          unsaveIcon.style.display = "block";
          // likeNumber.textContent = parseInt(likeNumber.textContent) -1;
        } 
    }else{
        alert('Đã có lỗi xảy ra!');
    }
  };

  xhr.send("toggle=" + encodeURIComponent(toggle) + "&imgId=" + encodeURIComponent(imgId));
}

  function CheckLikeSaveFollow(imgId, callback){
    console.log('check like n');
    xhr.open('POST', '/index.php?controller=ShowDetailContainer&action=CheckLikeSaveFollow');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
      console.log(xhr.responseText);
      receivedData = JSON.parse(xhr.responseText);
      if(xhr.status === 200){
        console.log('che: '+ xhr.responseText);
        if(receivedData.Like === 'liked'){
          likeIcon.style.display = "block";
          unlikeIcon.style.display = "none";
        }else{
          likeIcon.style.display = "none";
          unlikeIcon.style.display = "block";
        }

        if(receivedData.Save === 'saved'){
          saveIcon.style.display = "block";
          unsaveIcon.style.display = "none";
        }else{
          saveIcon.style.display = "none";
          unsaveIcon.style.display = "block";
        }

        if(receivedData.Follow === 'following'){
          followStatus.textContent = 'Bỏ theo dõi';
          console.log('bỏ theo');
        }else{
          followStatus.textContent = 'Theo dõi'
          console.log('theo');
        }
      }else{
        alert('Đã có lỗi xảy ra!');
      }

      if (typeof callback === 'function') {
        callback();
      }
      
    };
    xhr.send("imgId=" + encodeURIComponent(imgId)+'&uploaderName='+encodeURIComponent(detailUploader.textContent));

  }

  //Toggle follow
  function ToggleFollow(){
  
    toggle = "follow";
    if(followStatus.textContent === "Bỏ theo dõi"){
      toggle = "unfollow";
    }
    
    xhr.open('POST', '/index.php?controller=ShowDetailContainer&action=ToggleFollow');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status == 200){
      console.log(xhr.responseText);
        if(xhr.responseText.trim() === "follow"){
          followStatus.textContent = 'Bỏ theo dõi';
          followButton.style.background = 'rgb(217, 222, 228)';
          followButton.style.color = 'rgb(80, 78, 103)';
          followButton.textContent = 'Hủy theo dõi';
          
        }
        if(xhr.responseText.trim() === 'unfollow'){
          followStatus.textContent = 'Theo dõi';
          followButton.style.background = 'rgb(0, 115, 255)';
          followButton.style.color = 'white';
          followButton.textContent = 'Theo dõi';
        } 
    }else{
        alert('Đã có lỗi xảy ra!');
    }
  };

  xhr.send("toggle=" + encodeURIComponent(toggle) + "&uploaderName=" + encodeURIComponent(detailUploader.textContent));
  
}



// Hủy khi click vào
close1.addEventListener("click", function(e) {
  btn.style.display = "none";
  e.preventDefault();
});
// Thêm sự kiện khi thay đổi giá trị trong thẻ input
comment.addEventListener("input", function(e) {
  // Kiểm tra nếu thẻ input có giá trị
  if (comment.value.trim().length > 0) {
      // Thêm lớp CSS khi thẻ input có giá trị
      post1.classList.add("input-filled");
      post1.classList.add("hovered-button");
      e.preventDefault();
  } else {
      // Loại bỏ lớp CSS khi thẻ input rỗng
      post1.classList.remove("input-filled");
      post1.classList.remove("hovered-button");
      e.preventDefault();
  }
});

feedbackArr = [];
const commentsCont= document.querySelector('.comments__container');

comment.addEventListener('keypress',submitFeedback);

post1.addEventListener('click', submitFeedback);
function submitFeedback(e){
  if (e.keyCode === 13 || e.type === "click") {
    console.log('addfeed');
    AddComment();
    console.log('addfeed2');

    post1.classList.remove("input-filled");
        post1.classList.remove("hovered-button");
        e.preventDefault();

    const userForm = getUsername.value;
    const userAvatar = getUserAvatar.value
    const commentForm = comment.value;
    const date = currentDateParagraph.textContent;
    // if inputs are not empty
    if(commentForm !== ''){
        // create new feedback
        newFeedback = {
            "id": Math.floor((Math.random() * 1000)+ 1),
            "userName": userForm,
            "userAvatar": userAvatar,
            "userComment": commentForm,
            "dated": date
        };
        // add new feedback to array
        feedbackArr.push(newFeedback);
        // clear inputs 
        resetForm();
        // add feedback to list
        addFeedback(newFeedback);
    }
    e.preventDefault();
  }
};
function resetForm(){
  comment.value = '';
  // positiveFeedback = false
};

function addFeedback(item){
    // create new div
    const div = document.createElement('div');
    // add class
    div.classList = 'comment__card';
    // add id
    div.id = item.id;
    // add html
    div.innerHTML = `
                    <img id="avt-img" src="/Public/profileimg/${item.userAvatar}" alt="">
                    <div class="comment__info">
                        <div class="main-com-fo">
                          <span class="nickname">
                            ${item.userName}
                          </span>
                          <span class="currentDate">
                            1 giây trước
                          </span>
                        </div>
                        
                        <p class="comment">
                            ${item.userComment}
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
    `;

    //tăng hiển thị số bình luận
    commentNum.textContent = parseInt(commentNum.textContent) + 1;
    console.log(parseInt(commentNum.textContent) + 1);
    
    // insert feedback into the list
    commentsCont.insertAdjacentElement('afterbegin', div);

    // Lấy tham chiếu đến các phần tử bên trong div
    const count = div.querySelector('.count');
    const count1 = div.querySelector('.count1');
    var likeic = div.querySelector("#like__icon");
    var dislikeic = div.querySelector("#dislike__icon");

    // Gắn kết lại sự kiện cho likeic và dislikeic
    likeic.addEventListener("click", likeComment(likeic, dislikeic, count, count1));
    dislikeic.addEventListener("click", dislikeComment(dislikeic, likeic, count1, count));
};

        const count = document.querySelector('.count');
        const count1 = document.querySelector('.count1');
        let likesCount = 0;
        let dislikeCount = 0;
        // function addLikes(){
        // likesCount++;
        // count.innerHTML = likesCount;
        // };
        // function removeLikes(){
        // likesCount--;
        // count.innerHTML = likesCount;
        // };
        // function addDislikes(){
        // dislikeCount++;
        // count1.innerHTML = dislikeCount;
        // };
        // function removeDislikes(){
        // dislikeCount--;
        // count1.innerHTML = dislikeCount;
        // };
        var likeic = document.getElementById('like__icon'); // Lấy tham chiếu đến phần tử like__icon
        var dislikeic = document.getElementById('dislike__icon'); // Lấy tham chiếu đến phần tử dislike__icon
        var isLiked = false; // Biến theo dõi trạng thái like
        var isDisliked = false; // Biến theo dõi trạng thái dislike 
      function likeComment(likeic, dislikeic, count, count1) {
        return function() {
            if (!isLiked) {
                likeic.classList.remove("fa-regular");
                likeic.classList.add("fa-solid");
                likeic.classList.add("liked1");
                isLiked = true;
                likesCount++;
                count.innerHTML = likesCount;
    
                // Kiểm tra nếu dislike đã được chọn thì hủy chọn nó
                if (isDisliked) {
                    dislikeic.classList.remove("fa-solid");
                    dislikeic.classList.add("fa-regular");
                    isDisliked = false;
                    dislikeic.classList.remove("disliked");
                    dislikeCount--;
                    count1.innerHTML = dislikeCount;
                }
            } else {
                likeic.classList.remove("fa-solid");
                likeic.classList.add("fa-regular");
                isLiked = false;
                likeic.classList.remove("liked1");
                likesCount--;
                count.innerHTML = likesCount;
            }
        };
    }
    
    function dislikeComment(dislikeic, likeic, count1, count) {
        return function() {
            if (!isDisliked) {
                dislikeic.classList.remove("fa-regular");
                dislikeic.classList.add("fa-solid");
                isDisliked = true;
                dislikeic.classList.add("disliked");
                dislikeCount++;
                count1.innerHTML = dislikeCount;
    
                // Kiểm tra nếu like đã được chọn thì hủy chọn nó
                if (isLiked) {
                    likeic.classList.remove("fa-solid");
                    likeic.classList.add("fa-regular");
                    isLiked = false;
                    likeic.classList.remove("liked1");
                    likesCount--;
                    count.innerHTML = likesCount;
                }
            } else {
                dislikeic.classList.remove("fa-solid");
                dislikeic.classList.add("fa-regular");
                isDisliked = false;
                dislikeic.classList.remove("disliked");
                dislikeCount--;
                count1.innerHTML = dislikeCount;
            }
        };
    }

    //ADD COMMENT
    function AddComment(){
      console.log('come');
      xhr.open('POST','/index.php?controller=ShowDetailContainer&action=Comment');
      var commentFormData = new FormData(document.getElementById('comment-form'));
      xhr.onload = function(){
        if(xhr.status === 200){
          console.log(xhr.responseText);
          console.log(document.getElementById('comment-image-path').value);
        }else{
          alert('Đã có lỗi xảy ra');
        }
      }
      xhr.send(commentFormData);
      // xhr.send();
    }

    //GET COMMENTS
    function GetComments(pid){
      xhr.open('POST','/index.php?controller=ShowDetailContainer&action=GetComments');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function(){
        if(xhr.status === 200){
          commentsCont.innerHTML = xhr.responseText;
          GetCommentNumber(pid);
        }else{
          alert('Đã có lỗi xảy ra! get com');
        }
      }

      xhr.send('pid='+encodeURIComponent(pid));
    }

    function GetCommentNumber(pid){
      xhr.open('GET','/index.php?controller=ShowDetailContainer&action=GetCommentNumber&pid='+encodeURIComponent(pid));
      xhr.onload = function(){
        if(xhr.status === 200){
          commentNum.textContent = xhr.responseText.trim();
        }else{
          alert('Đã có lỗi xảy ra!');
        }
      }

      xhr.send();
    }

    //FILTER
    function togglenav_sorteds() {
      nav_sorteds.style.display = nav_sorteds.style.display === 'block' ? 'none' : 'block';
      // if (nav_sorteds.style.display === 'block') {
      //   nav_sorteds.style.display = 'none';
      // } else {
      //   nav_sorteds.style.display = 'block';
      // }
      console.log('aaaaa');
    }
    function selectnav_sorted(optionIndex, comFilter) {
      var nav_sorted = document.querySelectorAll('.nav-sorted');
      nav_sorted.forEach(function(option, index) {
          if (index === optionIndex - 1) {
            option.classList.add('selected');
          } else {
            option.classList.remove('selected');
          }
        });
        togglenav_sorteds();

        FilterComment(comFilter);
    }

    function FilterComment(comFilter){
      console.log('filterc');
      xhr.open('GET','/index.php?controller=ShowDetailContainer&action=FilterComment&pid='+encodeURIComponent(imgId)+'&comFilter='+encodeURIComponent(comFilter));
      xhr.onload = function(){
        if(xhr.status === 200){
          console.log('fil: '+xhr.responseText);
          // commentsCont.innerHTML("");
          // commentsCont.append(xhr.responseText) ;
          commentsCont.innerHTML = xhr.responseText;
        }else{
          alert('Đã có lỗi xảy ra!');
        }
      };
      xhr.send();
    }