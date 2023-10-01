var xhr = new XMLHttpRequest();

window.onload = function(){
  likeIcon.style.display = "none";
  unlikeIcon.style.display = "block";
}
//aslkdfjsladkf
function ShowPublicUserPage(){
  window.location.href = "index.php?controller=MainPage&action=PublicUserPage&uploader="+detailUploader.textContent;
}

  var likeIcon = document.getElementById('like-icon');
  var unlikeIcon = document.getElementById('unlike-icon');
  likeIcon.addEventListener('click', ToggleLike);
  unlikeIcon.addEventListener('click', ToggleLike);

  //Toggle like
  function ToggleLike(){
  
      toggle = "like";
      if(likeIcon.style.display == "block"){
        toggle = "unlike";
      }
      var displayStyle = window.getComputedStyle(likeIcon).display;
      if(displayStyle === "none"){
        // likeIcon.style.display = "block";
        // unlikeIcon.style.display = "none";
      }else{
        // likeIcon.style.display = "none";
        // unlikeIcon.style.display = "block";
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
    xhr.send("toggle=" + encodeURIComponent(toggle));
    
  }