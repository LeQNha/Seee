var showLikedListButton = document.querySelector('.show-liked-list');
var showCreatedListButton = document.querySelector('.show-created-list');
var showFollowedListButton = document.querySelector('.show-followed-list');

var listShowedContainer = document.getElementById('liked-created-images');

//LOAD MORE
var loadedImagesNumber = 7;

//SEARCH IN LIST
var subSearch = document.getElementById('sub-search');
showListTextContent = document.getElementById('show-list-text-content');
window.onload = function(){

        document.querySelector('.user-avatar-container img').click();

        // showLikedListButton.click();
        showedList = showListTextContent.textContent;
        if(showedList == 'saved'){
            showLikedListButton.classList.add('showed-list-button');
        }else if(showedList == 'created'){
            showCreatedListButton.classList.add('showed-list-button');
        }else{
            showFollowedListButton.classList.add('showed-list-button');
        }
}

    var xhr = new XMLHttpRequest();
    function ShowList(listShowed){
        //Đổi css cảu các Btn
        ToggleShowListButton(listShowed);

        console.log('click ' + listShowed);
        showListTextContent.textContent = listShowed;
        xhr.open('GET',"/index.php?controller=PersonalPage&action=GetShowedList&listShowed="+listShowed);
        // xhr.open('GET',"/index.php?controller=AdminPage&action=SwitchManagement");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function(){
            if(xhr.status === 200){
                if(listShowed == 'saved' || listShowed == 'created'){
                    listShowedContainer.innerHTML='<div class="container"></div>';
                    imagesContainer = document.querySelector('.container');
                    imagesContainer.innerHTML = '';
        
                        imagesContainer.innerHTML=xhr.responseText; // Thêm các phần tử con của div mới vào .container
                    
                }else{
                    listShowedContainer.innerHTML = '<div class="follow-list"></div>';
                    followListContainer = document.querySelector('.follow-list'); // Lấy phần tử .container

                    followListContainer.innerHTML = xhr.responseText;
                }
                LazyLoading();
                
            }else{
                alert ('Đã có lỗi xảy ra');
            }
        };
        // xhr.send("listShowed="+encodeURIComponent(listShowed));
        xhr.send();
    }

    function ToggleShowListButton(showedList){
        if(showedList == 'saved'){
            showLikedListButton.classList.add('showed-list-button');
            history.pushState(null,null,'/index.php?controller=Imey&action=PersonalPage&listShowed=saved');

            showCreatedListButton.classList.remove('showed-list-button');
            showFollowedListButton.classList.remove('showed-list-button');
        }else if(showedList == 'created'){
            showCreatedListButton.classList.add('showed-list-button');
            history.pushState(null,null,'/index.php?controller=Imey&action=PersonalPage&listShowed=created');

            showLikedListButton.classList.remove('showed-list-button');
            showFollowedListButton.classList.remove('showed-list-button');
        }else{
            showFollowedListButton.classList.add('showed-list-button');
            history.pushState(null,null,'/index.php?controller=Imey&action=PersonalPage&listShowed=following');

            showLikedListButton.classList.remove('showed-list-button');
            showCreatedListButton.classList.remove('showed-list-button');
        }
    }

    subSearch.addEventListener('keypress',SubSearchList);
    document.getElementById('sub-search-icon').addEventListener('click',SubSearchList);
    function SubSearchList(e){
        if (e.keyCode === 13 || e.type === "click") { 
            e.preventDefault();
            xhr.open('GET',"/index.php?controller=PersonalPage&action=GetShowedList&listShowed="+showListTextContent.textContent+"&q="+subSearch.value);
            xhr.onload = function(){
                if(xhr.status === 200){
                    console.log(showListTextContent.textContent+' dang sho');
                    if(showListTextContent.textContent == 'following'){
                        listShowedContainer.innerHTML='<div class="follow-list"></div>';
                        followList = document.querySelector('.follow-list');
                        followList.innerHTML = '';
            
                        followList.innerHTML=xhr.responseText; // Thêm các phần tử con của div mới vào .container
                    }else{
                        listShowedContainer.innerHTML='<div class="container"></div>';
                            imagesContainer = document.querySelector('.container');
                            imagesContainer.innerHTML = '';
                
                            imagesContainer.innerHTML=xhr.responseText; // Thêm các phần tử con của div mới vào .container
                    }
                    LazyLoading();
                }else{
                    alert ('Đã có lỗi xảy ra');
                }
            };
            xhr.send();
        }
    }

//     //Hàm kiểm tra khi thanh cuộn chạm tới cuối cùng
// function kiemTraCuoiTrang() {
//     // Kiểm tra xem vị trí hiện tại của thanh cuộn có bằng hoặc lớn hơn độ dài của trang - chiều cao cửa sổ không
//     if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//       console.log("Đã cuộn tới cuối trang!");
//             LoadMoreImages();
//             // Thực hiện các hành động khi cuộn tới cuối trang ở đây
      
//     }
//   }
  
//   // Thêm sự kiện scroll vào thanh cuộn của trình duyệt
//   window.addEventListener('scroll', kiemTraCuoiTrang);
  
//   //CUÔN TỚI CUỐI TRANG ĐỂ LOAD THÊM
//   // window.onscroll = function() {
//   //   // Kiểm tra xem thanh cuộn đã cuộn tới cuối trang hay chưa
//   //   if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
//   //       console.log("Đã cuộn tới cuối trang!");
//   //       LoadMoreImages();
//   //       // Thực hiện các hành động khi cuộn tới cuối trang ở đây
//   //   }
//   // };
  
//   //Load thêm khi lướt xuống
//   function LoadMoreImages(){
//     xhr.open('GET', '/index.php?controller=PersonalPage&action=LoadMoreImages&loadedImagesNumber='+encodeURIComponent(loadedImagesNumber)+'listShowed='+encodeURIComponent(showListTextContent.textContent));
//       xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//       xhr.onload = function(){
//       if(xhr.status == 200){
//         if(xhr.responseText.trim() === 'het'){
//           console.log('het');
//         }else{
//           imagesContainer.innerHTML += xhr.responseText;
//           // imagesContainer.insertAdjacentElement('beforeend',xhr.responseText);
//           // var p = document.createElement("div");
//           // p.innerHTML = xhr.responseText;
//           // imagesContainer.appendChild(p);
//           loadedImagesNumber = loadedImagesNumber + 3;
//           LazyLoading();
//           console.log('lmore');
          
//           console.log(loadedImagesNumber);
//         }
//       }else{
//           alert('Đã có lỗi xảy ra!');
//       }
//     };
  
//     xhr.send();
//   }
