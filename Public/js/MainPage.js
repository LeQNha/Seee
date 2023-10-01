  
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

    var xhr = new XMLHttpRequest();

    var imgId = "";
  function ShowDetails(pid){

   

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

      imgId = receivedData.path
      CheckLikeImage(imgId);
    };
  
    xhr.send("pid=" + encodeURIComponent(pid));
  
    //ngăn trang web cuộn
    document.body.style.overflow = "hidden";
  
    //close show details
    var closeShowDetailsButton = document.querySelector('.close-show-details');
    closeShowDetailsButton.addEventListener('click',function(){

      var showDetailsContainer = document.querySelector('.show-details-container');
      showDetailsContainer.style.display = "none";
      document.body.style.overflow = "auto";
    });
  }
  
  

  

  
  
  
  
  