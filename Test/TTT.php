<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    

    <style>
        .modal{
            width: 100%;
            
        }
    </style>


  </head>
  <body>
    
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    hiện 1
</button>
<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
    hiện 2
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-body">


    <div class="show-details-container">
            <ul class="behavior-list">
                <li class=" close-show-details"><i class="fa-solid fa-xmark"></i></li>
                <li id="behavior-follow-button">
                    <div class="follow-button-avatar-container">
                        <img src="Public/webimg/defaultAvatar.png" alt="">
                    </div>
                    <span id="follow-status">Follow</span>
                </li>
                <li>
                    <i class="fa-regular fa-thumbs-up" id="unlike-icon"></i>
                    <i class="fa-solid fa-thumbs-up" id="like-icon"></i>
                    <span>Yêu thích</span>
                </li>
                <li>
                    <i class="fa-regular fa-heart" id="save-button"></i>
                    <span>Lưu</span>
                </li>
                <li>
                    <i class="fa-solid fa-share" id="share-icon"></i>
                    <span>Chia sẻ</span>
                </li>
            </ul>
        <div class="show-details">
                <div class="uploader">
                    <div class="detail-avatar-container">
                        <a href="#" onclick="ShowPublicUserPage()"><img class="detail-avatar" src="Public/webimg/defaultAvatar.png" alt=""></a>
                    </div>
                    <div style="display: flex; align-items: center;">   
                        <a href="#"><span class="detail-uploader">uploader</span></a>
                        <!-- <span>Follow</span> -->
                    </div>
                    <p class="detail-date-uploaded">111-111-111</p>
                </div>
                <div class="image-details">
                    <img class="detail-img" src="" alt="">
                    <h1 class="detail-title">tes</h1>
                    <p class="detail-description">ádadada</p>
                </div>
        </div>
    </div>


    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
</div>
</div>


<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>