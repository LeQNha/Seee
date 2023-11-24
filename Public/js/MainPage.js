var xhr = new XMLHttpRequest();
//CATEGORY
var imagesContainer = document.querySelector('.container');
var categoryTitles = document.querySelectorAll('.category-title');
var categoryDescription = document.getElementById('category-description');
var category = document.getElementById('Đề Xuất');
var categoryNameSpan = category.querySelector('.category-name');
// var category;
// var categoryNameSpan;

function GetCategoryInformation(cId){
    categoryTitles[0].textContent = cId;
    categoryTitles[1].textContent = cId;

    //CSS alter
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
  
  
  
  
  

  

  
  
  
  
  