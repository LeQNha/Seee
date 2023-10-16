window.addEventListener("scroll", function () {
    const scrollUp = document.querySelector(".scroll-up");
  const header = document.querySelector(".header");
    var scroll = this.window.scrollY;
    if (scroll > 100) {
      scrollUp.style.left = '96%';
    } else {
      scrollUp.style.left = '100%';
    }
  
    //header chuyển về lại white
    if(scroll >50){
      // document.querySelector('.top-bar').style.background = "white";
      document.querySelector('.second-bar').style.background = "white";
    }
  });
