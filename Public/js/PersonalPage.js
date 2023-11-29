var showLikedListButton = document.querySelector('.show-liked-list');
var showCreatedListButton = document.querySelector('.show-created-list');
var showFollowedListButton = document.querySelector('.show-followed-list');

var listShowedContainer = document.getElementById('liked-created-images');

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


    document.getElementById('sub-search-icon').addEventListener('click',SubSearchList);
    function SubSearchList(){
        xhr.open('GET',"/index.php?controller=PersonalPage&action=GetShowedList&listShowed="+showListTextContent.textContent+"&q="+subSearch.value);
        xhr.onload = function(){
            if(xhr.status === 200){
                console.log(xhr.responseText);
                listShowedContainer.innerHTML='<div class="container"></div>';
                    imagesContainer = document.querySelector('.container');
                    imagesContainer.innerHTML = '';
        
                    imagesContainer.innerHTML=xhr.responseText; // Thêm các phần tử con của div mới vào .container
                LazyLoading();
            }else{
                alert ('Đã có lỗi xảy ra');
            }
        };
        xhr.send();
    }
