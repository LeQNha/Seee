  var xhr = new XMLHttpRequest();

  var publicUser = document.getElementById('public-user');
  var followButton = document.getElementById('bt1');
  followButton.addEventListener('click', ToggleFollowButton);

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
  function ToggleFollowButton(){
  
    toggle = "follow";
    if(followButton.textContent === "Hủy theo dõi"){
      toggle = "unfollow";
    }
    
    xhr.open('POST', '/index.php?controller=PublicUserPage&action=ToggleFollow');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status == 200){
      console.log(xhr.responseText);
        if(xhr.responseText.trim() === "follow"){
          followButton.style.background = 'rgb(217, 222, 228)';
          followButton.style.color = 'rgb(80, 78, 103)';
          followButton.textContent = 'Hủy theo dõi';
        }
        if(xhr.responseText.trim() === 'unfollow'){
          followButton.style.background = 'rgb(0, 115, 255)';
          followButton.style.color = 'white';
          followButton.textContent = 'Theo dõi';
        } 
    }else{
        alert('Đã có lỗi xảy ra!');
    }
  };

  xhr.send("toggle=" + encodeURIComponent(toggle) + "&publicUser=" + encodeURIComponent(publicUser.textContent));
  
}
  









