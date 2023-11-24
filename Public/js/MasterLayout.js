window.onload = function(){
    document.querySelector('.scroll-up').style.zIndex = '4';
    
}

//LAZY LOADING IMAGES
var observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      // entry.target.classList.toggle("show", entry.isIntersecting);
      if(entry.isIntersecting){
        console.log('lzl');
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
    images = document.querySelectorAll(".main-image");
    ObserseImges(images);

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



