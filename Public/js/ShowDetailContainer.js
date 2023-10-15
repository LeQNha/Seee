var xhr = new XMLHttpRequest();

var likeIcon = document.getElementById('like-icon');
var unlikeIcon = document.getElementById('unlike-icon');
likeIcon.addEventListener('click', ToggleLike);
unlikeIcon.addEventListener('click', ToggleLike);

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

var imgId = "";
function ShowDetails(pid){

  //ngăn trang web cuộn
  document.body.style.overflow = "hidden";

  //close show details
  var closeShowDetailsButton = document.querySelector('.close-show-details');
  closeShowDetailsButton.addEventListener('click',function(){

    var showDetailsContainer = document.querySelector('.show-details-container');
    showDetailsContainer.style.display = "none";
    showDetailsContainer.classList.add("show-details-container-show-up");
    setTimeout(function () {
      showDetailsContainer.classList.remove("show-details-container-show-up");
    }, 20); // Thời gian đếm ngược (đơn vị: mili giây)
    
    document.body.style.overflow = "auto";
  });

  xhr.open('POST', 'index.php?controller=ShowDetailContainer&action=GetImage');
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
    detailImg.src = "./Public/img/"+receivedData.path;
    detailDescription.textContent = receivedData.description;
    dateUploaded.textContent = receivedData.dateuploaded
    detailUploader.textContent = receivedData.uploader;
    detailUploaderAvatar.src = "./Public/profileimg/"+receivedData.uploaderAvatar;
    document.querySelector('.behavior-list li .follow-button-avatar-container img').src = "./Public/profileimg/"+receivedData.uploaderAvatar;

    imgId = receivedData.path;
    CheckLikeAndFollow(imgId);
    
  };

  xhr.send("pid=" + encodeURIComponent(pid));

  
}

var followStatus = document.getElementById('follow-status');

//aslkdfjsladkf
function ShowPublicUserPage(){
  window.location.href = "index.php?controller=PublicUserPage&action=PublicUserPage&uploader="+detailUploader.textContent;
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
      
      xhr.open('POST', 'index.php?controller=ShowDetailContainer&action=ToggleLike');
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = function(){
      if(xhr.status == 200){
        console.log(xhr.responseText);
          if(xhr.responseText.trim() === "like"){
            likeIcon.style.display = "block";
            unlikeIcon.style.display = "none";
          }
          if(xhr.responseText.trim() === 'unlike'){
            likeIcon.style.display = "none";
            unlikeIcon.style.display = "block";
          } 
      }else{
          alert('Đã có lỗi xảy ra!');
      }
    };

    xhr.send("toggle=" + encodeURIComponent(toggle) + "&imgId=" + encodeURIComponent(imgId));
    
  }

  function CheckLikeAndFollow(imgId){

    xhr.open('POST', 'index.php?controller=ShowDetailContainer&action=CheckLikeAndFollow');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
      receivedData = JSON.parse(xhr.responseText);
      if(xhr.status === 200){
        console.log(xhr.responseText);
        console.log(receivedData.Like);
        if(receivedData.Like === 'liked'){
          likeIcon.style.display = "block";
          unlikeIcon.style.display = "none";
        }else{
          likeIcon.style.display = "none";
          unlikeIcon.style.display = "block";
        }

        if(receivedData.Follow === 'following'){
          followStatus.textContent = 'Bỏ theo dõi';
        }else{
          followStatus.textContent = 'Theo dõi'
        }
      }else{
        alert('Đã có lỗi xảy ra!');
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
    
    xhr.open('POST', 'index.php?controller=ShowDetailContainer&action=ToggleFollow');
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
  