//Show img details
var showDetailsContainer = document.querySelector('.show-details-container');
var detailTile = document.querySelector('.detail-title');
var detailImg = document.querySelector('.detail-img');
var detailDescription = document.querySelector('.detail-description');
var dateUploaded = document.querySelector('.detail-date-uploaded');
var detailUploader = document.querySelector('.detail-uploader');
var detailUploaderAvatar = document.querySelector('.detail-avatar');
function ShowDetails(pid){

var xhr = new XMLHttpRequest();
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
};

xhr.send("pid=" + encodeURIComponent(pid));

//ngăn trang web cuộn
document.body.style.overflow = "hidden";

//close show details
var closeShowDetailsButton = document.querySelector('.close-show-details');
closeShowDetailsButton.addEventListener('click',function(){
  console.log("hksdfuihsdui");
  var showDetailsContainer = document.querySelector('.show-details-container');
  showDetailsContainer.style.display = "none";
  document.body.style.overflow = "auto";
});
}

//aslkdfjsladkf
function ShowPublicUserPage(){
window.location.href = "index.php?controller=MainPage&action=PublicUserPage&uploader="+detailUploader.textContent;
}