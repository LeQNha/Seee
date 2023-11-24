const cards = document.querySelectorAll(".card");
// console.log('fdf');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    entry.target.classList.toggle("show", entry.isIntersecting);
    if(entry.isIntersecting){
      observer.unobserve(entry.target);
    }
  })
},
{
  threshold: 1,
}

);

cards.forEach(card => {
  observer.observe(card);
});

