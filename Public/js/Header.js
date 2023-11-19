
  searchIcon = document.getElementById('search-icon');
  searchBox = document.getElementById('search-box');

  var submenu = document.getElementById("submenu");
  var avatar = document.querySelector(".avatar");
  
  //open submenu by clicking on avatar
  window.onload = function() {
    submenu.style.display = "none";
  };

  var showSubmenuButton = document.querySelector('.show-submenu-button');
  showSubmenuButton.addEventListener('click',ShowSubmenu);
  function clickCheck(){
    console.log('lklk');
  }

  function ShowSubmenu() {
    console.log('pâppap');
   
    if (submenu.style.display === "none") {
      avatar.style.borderColor = "lightgrey";
      submenu.style.display = "block";
      
      showSubmenuButton.classList.add('show-submenu-button-clicked');
    } else {
      avatar.style.borderColor = "transparent";
      submenu.style.display = "none";

      showSubmenuButton.classList.remove('show-submenu-button-clicked');
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

  searchIcon.addEventListener('click',SearchImages);
  searchBox.addEventListener('keypress',SearchImages);
  function SearchImages(event){
    if (event.keyCode === 13 || event.type === "click") {
      event.preventDefault(); // Ngăn chặn hành động mặc định khi nhấn enter (thường là refresh trang)

      // Thực hiện tác vụ tìm kiếm ở đây
      var searchTerm = document.getElementById("search-box").value;
      // Ví dụ: chuyển đến trang kết quả tìm kiếm
      window.location.href = "index.php?controller=HomePage&action=MainPage&q=" + encodeURIComponent(searchTerm);
  }
  }

