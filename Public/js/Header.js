
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