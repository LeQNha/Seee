window.onload = function(){
    document.querySelector('.scroll-up').style.zIndex = '4';
}

//LAZY LOADING IMAGES
var observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      // entry.target.classList.toggle("show", entry.isIntersecting);
      if(entry.isIntersecting){
          preloadImage(entry.target);
          observer.unobserve(entry.target);
      }
    })
  },
  {
    threshold: 1,
  }
  
  );
function ObserseImges(images){
    images.forEach(img => {
        console.log('obsees');
        observer.observe(img);
    });
}
function preloadImage(img){
    const src = img.getAttribute("data-src");
    if(!src){
        return;
    }
    img.src = src;
    
}
function LazyLoading(){
    var images = document.querySelectorAll(".main-image");
    ObserseImges(images);
    console.log('colacz');
    observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          // entry.target.classList.toggle("show", entry.isIntersecting);
          if(entry.isIntersecting){
              preloadImage(entry.target);
              observer.unobserve(entry.target);
          }
        })
      },
      {
        threshold: 1,
      }
      
      );
}
LazyLoading();

// var observer;

// function ObserveImages(images){
//     images.forEach(img => {
//         observer.observe(img);
//     });
// }

// function preloadImage(img){
//     const src = img.getAttribute("data-src");
//     if(!src){
//         return;
//     }
//     img.src = src;
//     img.style.filter = "brightness(100%)"; // Đảm bảo hình ảnh được hiển thị đúng sau khi preload
// }
// function notInter(img){
//   img.style.filter = "brightness(10%)";
// }

// function LazyLoading(){
//     observer = new IntersectionObserver(entries => {
//         entries.forEach(entry => {
//             if(entry.isIntersecting){
//                 preloadImage(entry.target);
//                 observer.unobserve(entry.target); // Di chuyển unobserve sau khi preload hình ảnh
//             }else{
//               notInter(entry.target);
//             }
//         });
//     }, { threshold: 1 });

//     var images = document.querySelectorAll(".main-image");
//     ObserveImages(images);
// }

// LazyLoading(); // Gọi hàm LazyLoading ban đầu




