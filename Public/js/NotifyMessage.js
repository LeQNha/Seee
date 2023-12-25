
//NotifyMessage
function showAndHide(msg){

    var notifyMessage = document.querySelector('.notify-message');
    var message = document.querySelector('.notify-message p');
  
    message.textContent = msg;
    notifyMessage.style.top = "89vh";
    notifyMessage.style.opacity = "0.9";
  
     setTimeout(function () {
         notifyMessage.style.top = "100vh"; // Ẩn thẻ div sau khoảng thời gian
         notifyMessage.style.opacity = "0.3";
       }, 2000); // Thời gian đếm ngược (đơn vị: mili giây)
  }