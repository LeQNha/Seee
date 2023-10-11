var showLikedListButton = document.querySelector('.show-liked-list');
var showCreatedListButton = document.querySelector('.show-created-list');
var showFollowedListButton = document.querySelector('.show-followed-list');
window.onload = function(){
        showedList = document.getElementById('show-list-text-content').textContent;
        if(showedList == 'liked'){
            showLikedListButton.classList.add('showed-list-button');
        }else if(showedList == 'created'){
            showCreatedListButton.classList.add('showed-list-button');
        }else{
            showFollowedListButton.classList.add('showed-list-button');
        }
}

    // var xhr = new XMLHttpRequest();
    // function ShowList(listShowed){
    //     console.log('click ' + listShowed);
    //     xhr.open('GET',"index.php?controller=PersonalPage&action=GetShowedList&listShowed=" + encodeURIComponent(listShowed));
    //     xhr.onload = function(){
    //         if(xhr.status === 200){
                
                    
    //         }else{}
    //     };
    //     xhr.send();
    // }

// var showedDiv = document.getElementById('liked-created-images');

// function GetShowList(listShowed){
//     xhr.open('GET',"index.php?controller=PersonalPage&action=GetShowedList");

//     xhr.onload = function(){
//         if(xhr.status === 200){
//             console.log(xhr.responseText);
//             if(xhr.responseText.trim() == 'liked' || xhr.responseText.trim() == 'created'){
//                 showedDiv.innerHTML = '<div class="container">'+xhr.responseText+'</div>';
//             }else{
//                 receivedData = JSON.parse(xhr.responseText);
//                 showedDiv.innerHTML = '<div class="container">';
//                 receivedData.forEach(image => {

//                     var paintDiv = document.createElement("div");
//                     paintDiv.classList.add("paint");
//                     paintDiv.setAttribute("onclick", "ShowDetails('" + image.path + "')");

//                     var imageNameP = document.createElement("p");
//                     imageNameP.classList.add("image-name");
//                     imageNameP.innerHTML = image.title;

//                     var img = document.createElement("img");
//                     img.src = "./Public/img/"+image.path;
//                     console.log(img.src);
//                     img.width = "350px";
//                     img.alt = "";
//                     img.setAttribute("loading", "lazy");

//                     paintDiv.appendChild(imageNameP);
//                     paintDiv.appendChild(img);
                    
//                     showedDiv.querySelector(".container").appendChild(paintDiv);
//                 });
//                 showedDiv.innerHTML += "</div>";
//             }
//         }else{
//             alert('Đã có lỗi xảy ra!');
//         }
//     };

//     xhr.send("listShowed="+encodeURIComponent(listShowed));
// }
