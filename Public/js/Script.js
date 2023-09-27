

/////////

window.addEventListener("scroll", function () {
    const scrollUp = document.querySelector(".scroll-up");
  const header = document.querySelector(".header");
    var scroll = this.window.scrollY;
    if (scroll > 100) {
      scrollUp.style.left = '96%';
    } else {
      scrollUp.style.left = '100%';
    }
  
    //header chuyển về lại white
    if(scroll >50){
      document.querySelector('.top-bar').style.background = "white";
      document.querySelector('.second-bar').style.background = "white";
    }
  });
  
  
  //open submenu by clicking on avatar
  window.onload = function() {
    var submenu = document.getElementById("submenu");
    submenu.style.display = "none";
  };
  function ShowSubmenu() {
    
    var submenu = document.getElementById("submenu");
    var avatar = document.querySelector(".avatar");
   
    if (submenu.style.display === "none") {
      avatar.style.borderColor = "lightgrey";
      submenu.style.display = "block";
    } else {
      avatar.style.borderColor = "transparent";
      submenu.style.display = "none";
    }
  }
  // Ẩn submenu đi
  document.addEventListener('click', function(event) {
    var submenu = document.getElementById("submenu");
    var avatar = document.querySelector(".avatar");
    
    // Kiểm tra xem click có xảy ra bên ngoài avatar và submenu hay không
    if (event.target !== avatar && !avatar.contains(event.target)) {
      // Ẩn submenu nếu click xảy ra bên ngoài
      avatar.style.borderColor = "transparent";
      submenu.style.display = 'none';
  
    }
  });
  
  
  // AJAX DĂNG NHẬP ĐĂNG KÝ
  
  // function submitData() {
  //   $.ajax({
  //     type: "POST",
  //     url: "Login.php",
  //     data: $("#loginForm").serialize(),
  //     success: function(response) {
  //       if(response === "success") {
  //         alert("Đăng nhập thành công!");
  //         window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác
  
  //       }else {
  //         alert("Tên đăng nhập hoặc mật khẩu không đúng!");
  //         window.location.href = "Home.php"; // Điều hướng tới trang chính hoặc trang khác
         
  //       }
  //     }
  //   });
  // }
  
  
  //Show img details
    var showDetailsContainer = document.querySelector('.show-details-container');
    var detailTile = document.querySelector('.detail-title');
    var detailImg = document.querySelector('.detail-img');
    var detailDescription = document.querySelector('.detail-description');
    var dateUploaded = document.querySelector('.detail-date-uploaded');
    var detailUploader = document.querySelector('.detail-uploader');
    var detailUploaderAvatar = document.querySelector('.detail-avatar');
  function ShowDetails(pid){
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?controller=MainPage&action=GetImage');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      console.log(xhr.responseText);
      var receivedData = JSON.parse(xhr.responseText);
      showDetailsContainer.style.display = "block";
      // imgDetailsContainer.innerHTML = receivedData.title;
      detailTile.textContent = receivedData.title;
      detailImg.src = "./Public/img/"+receivedData.path;
      detailDescription.textContent = receivedData.description;
      dateUploaded.textContent = receivedData.dateuploaded
      detailUploader.textContent = receivedData.uploader;
      detailUploaderAvatar.src = "./Public/profileimg/"+receivedData.uploaderAvatar;
    };
  
    xhr.send("pid=" + encodeURIComponent(pid));
  
    //ngăn trang web cuộn
    document.body.style.overflow = "hidden";
  
    //close show details
    var closeShowDetailsButton = document.querySelector('.close-show-details');
    closeShowDetailsButton.addEventListener('click',function(){
      console.log("hksdfuihsdui");
      var showDetailsContainer = document.querySelector('.show-details-container');
      showDetailsContainer.style.display = "none";
      document.body.style.overflow = "auto";
    });
  }
  
  //aslkdfjsladkf
  function ShowPublicUserPage(){
    window.location.href = "PublicUserPage.php?uploader="+detailUploader.textContent;
  }
  
  
  
  