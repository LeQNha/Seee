var xhr = new XMLHttpRequest();
var updateImageButton = document.getElementById('update-button-created');
updateImageButton.addEventListener('click',UpdateImage);
function UpdateImage(){
  imgId = 'nan.jpg';
  xhr.open('POST','Test.php?pid=' + encodeURIComponent(imgId));
  // xhr.open('POST','Test.php',true);
  event.preventDefault();
  // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  var formData = new FormData(document.getElementById('update-image-infor-form'));
  xhr.onload = function(){
    if(xhr.status === 200){
      console.log('có nhân = ' + xhr.responseText +' ' + imgId );
      if(xhr.responseText.trim() == 'update success'){
        alert('Cập nhật thành công');
      }else{
        alert(xhr.responseText.trim());
      }
    }else{
      alert('Đã có lỗi xảy ra!');
    }
  }
  xhr.send(formData);
  // xhr.send();
}

// var xhr = new XMLHttpRequest();
// var updateImageButton = document.getElementById('update-button-created');
// updateImageButton.addEventListener('click',UpdateImage);
// function UpdateImage(){
//   formData = new FormData(document.getElementById('update-image-infor-form'));
//     xhr.open('POST','Test.php',true);
//     event.preventDefault();
//     xhr.onload = function(){
//         if(xhr.status == 200){
//             if(xhr.responseText.trim() == "success"){

//               alert('success')  
                
//             }else{
                
//                 alert(xhr.responseText);
//             }
//         }else{
//             alert('ko nhan');
//         }
//     }
//     xhr.send(formData);
// }
