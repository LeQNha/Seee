  var xhr = new XMLHttpRequest();

  var publicUser = document.getElementById('public-user');
  var followButton = document.getElementById('bt1');

  window.onload = function(){
    
  };

  // function CheckFollow(){
  //   console.log('co folww');
  //   xhr.open('POST', 'index?controller=PublicUserPage&action=CheckFollow');
  //   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  //   xhr.onload = function(){
  //     if(xhr.responseText.trim() === 'followed'){
  //       followButton.textContent = 'Hủy theo dõi';
  //       followButton.classList.add(".follow-btn-status");
  //     }else{
  //       followButton.textContent.trim() = 'Theo dõi';
  //       followButton.classList.remove("follow-btn-status");
  //     }
  //   }
  //   xhr.send('publicUser='+encodeURIComponent(publicUser.textContent));
  // }
  
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
        }
        if(xhr.responseText.trim() === 'unfollow'){
          followStatus.textContent = 'Theo dõi';
        } 
    }else{
        alert('Đã có lỗi xảy ra!');
    }
  };

  xhr.send("toggle=" + encodeURIComponent(toggle) + "&uploaderName=" + encodeURIComponent(detailUploader.textContent));
  
}
  









