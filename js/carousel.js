const carouselitems = document.querySelectorAll(".carousel-item");
const imgitem = document.querySelectorAll(".list-inline-item");

carouselitems.forEach((e) => {
  if (e.classList.contains("active")) e.style.display = "block";
  else e.style.display = "none";
});

function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

imgitem.forEach((e) => {
  e.addEventListener("click", (item) => {
    carouselitems.forEach((i) => {
      if (i.classList.contains("active")) {
        replace(i, e)
      }
      else
        i.firstElementChild.style.opacity = 0;
    });
  });
});

async function replace(i, e) {
  if (i.classList.contains("active")) 
  {
    i.firstElementChild.style.opacity = 0;
    await sleep(500);
    i.firstElementChild.src = e.firstElementChild.firstElementChild.src;
    i.firstElementChild.style.opacity = 1;
  }
}
