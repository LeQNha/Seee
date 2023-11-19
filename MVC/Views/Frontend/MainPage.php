    <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper -->
    <div class="category-swiper-container">
      <div class="swiper-button prev-swiper"><i class="fa-solid fa-caret-left"></i></div>
      <div class="swiper mySwiper">
          <div class="swiper-wrapper">
              <?php foreach($data['Categories'] as $category): ?>
                  <div class="swiper-slide category" id="<?= $category['category']; ?>" style="background-image: url('./Public/categoryimg/<?= $category['background']; ?>');" onclick="GetCategoryInformation('<?= $category['category']; ?>')">
                      <span class="category-name"><?= $category['category']; ?></span>
                  </div>
              <?php endforeach; ?>
          </div>
      <!-- <div class="swiper-button swiper-button-next"></div>
      <div class="swiper-button swiper-button-prev"></div> -->
      <!-- <div class="swiper-pagination"></div> -->
      </div>
      <div class="swiper-button next-swiper"><i class="fa-solid fa-caret-right"></i></div>
    </div>
  
    <div class="category-introduction">
        <h1 class="category-title" id="category-title">Đề Xuất</h1>
        <p id="category-description">Dành cho bạn</p>
        <button id="follow-category-button">Theo dõi <span class="category-title"></span></button>
    </div>
    <div class="cover-div" id="cover-div"></div>
    <?php include "./MVC/Views/Partitions/ImagesContainer.php"; ?>
    <?php include "./MVC/Views/Partitions/ShowDetailContainer.php"; ?>
    
        
     <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 7,
        spaceBetween: 30,
        loop: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        // nextEl: ".swiper-button-next",
        // prevEl: ".swiper-button-prev",
        nextEl: ".next-swiper",
        prevEl: ".prev-swiper",
        },
    });
    </script>
        