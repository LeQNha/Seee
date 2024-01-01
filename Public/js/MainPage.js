var xhr = new XMLHttpRequest();
//CATEGORY
var imagesContainer = document.querySelector('.container');
var categoryTitles = document.querySelectorAll('.category-title');
var categoryDescription = document.getElementById('category-description');
var category = document.getElementById('Đề Xuất');
var categoryNameSpan = category.querySelector('.category-name');

// var category;
// var categoryNameSpan;

//LOAD MORE
var loadedImagesNumber = 7;

function GetCategoryInformation(cId){
    // categoryTitles[0].textContent = cId;
    // categoryTitles[1].textContent = cId;
    categoryTitles[0].textContent = cId;

    //CSS alter
    console.log(categoryNameSpan);
    categoryNameSpan.classList.remove('category-chosen');
    category = document.getElementById(cId);
    categoryNameSpan = category.querySelector('.category-name');
    if(categoryNameSpan){
      categoryNameSpan.classList.add('category-chosen');
    }else{
      console.log('Không tồn tại');
    }

  xhr.open('GET','/index.php?controller=MainPage&action=GetCategoryInformation&category='+encodeURIComponent(cId));
  xhr.onload = function(){
    if(xhr.status === 200){

      categoryDescription.textContent = xhr.responseText.trim();

      ShowCategoryImages(cId);

    }else{
      alert('Đã có lỗi xảy ra!');
    }
  };
  xhr.send();
}

function ShowCategoryImages(cId){
  xhr.open('GET','/index.php?controller=MainPage&action=ShowCategoryImages&category='+encodeURIComponent(cId));
  xhr.onload = function(){
    if(xhr.status === 200){
      console.log(xhr.responseText);
      imagesContainer.innerHTML = xhr.responseText;
      LazyLoading();
      // history.pushState(null,null,'index.php?controller=HomePage&action=MainPage&category='+encodeURIComponent(cId));
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  };
  xhr.send();

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

//Hàm kiểm tra khi thanh cuộn chạm tới cuối cùng
function kiemTraCuoiTrang() {
  // Kiểm tra xem vị trí hiện tại của thanh cuộn có bằng hoặc lớn hơn độ dài của trang - chiều cao cửa sổ không
  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
          // LoadMoreImages();
          // Thực hiện các hành động khi cuộn tới cuối trang ở đây
    
  }
}

// Thêm sự kiện scroll vào thanh cuộn của trình duyệt
window.addEventListener('scroll', kiemTraCuoiTrang);

//CUÔN TỚI CUỐI TRANG ĐỂ LOAD THÊM
// window.onscroll = function() {
//   // Kiểm tra xem thanh cuộn đã cuộn tới cuối trang hay chưa
//   if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//       console.log("Đã cuộn tới cuối trang!");
//       LoadMoreImages();
//       // Thực hiện các hành động khi cuộn tới cuối trang ở đây
//   }
// };

//Load thêm khi lướt xuống
function LoadMoreImages(){
  xhr.open('GET', '/index.php?controller=MainPage&action=LoadMoreImages&loadedImagesNumber='+encodeURIComponent(loadedImagesNumber)+'&category=');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function(){
    if(xhr.status == 200){
      if(xhr.responseText.trim() === 'het'){
        
      }else{
        imagesContainer.innerHTML += xhr.responseText;
        // imagesContainer.insertAdjacentElement('beforeend',xhr.responseText);
        // var p = document.createElement("div");
        // p.innerHTML = xhr.responseText;
        // imagesContainer.appendChild(p);
        
        loadedImagesNumber = loadedImagesNumber + 5;
        LazyLoading();
      }
    }else{
        alert('Đã có lỗi xảy ra!');
    }
  };

  xhr.send();
}
  
  
  
  
  

  

  
  
  
  
  