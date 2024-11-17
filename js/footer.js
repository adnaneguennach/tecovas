const footerLower = document.querySelector('.right_side_container_ft');
const rightMd = document.querySelector('.right_side_cont_md');

function updateWindowSize() {
    const width = window.innerWidth;
    const height = window.innerHeight;
    console.log(`Width: ${width}px, Height: ${height}px`);

    if (footerLower) {
        if (width <= 1170) {
            footerLower.style.display = "none";
            rightMd.style.display = "block";
        } else if (width > 1170) {
            footerLower.style.display = "flex";
            rightMd.style.display = "none";
        }
    }
}

window.addEventListener('resize', updateWindowSize);

updateWindowSize();



const track = document.querySelector('.carousel-track-fttr');
const slides = Array.from(track.children);
const nextButton = document.querySelector('.carousel-button-next-fttr');
const prevButton = document.querySelector('.carousel-button-prev-fttr');
const slideWidth = slides[0].getBoundingClientRect().width;

// Arrange the slides next to one another
const setSlidePosition = (slide, index) => {
    slide.style.left = slideWidth * index + 'px';
};
slides.forEach(setSlidePosition);

const moveToSlide = (track, currentSlide, targetSlide) => {
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide-fttr');
    targetSlide.classList.add('current-slide-fttr');
};

// When I click left, move slides to the left
prevButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide-fttr');
    const prevSlide = currentSlide.previousElementSibling || slides[slides.length - 1];
    moveToSlide(track, currentSlide, prevSlide);
});

// When I click right, move slides to the right
nextButton.addEventListener('click', e => {
    const currentSlide = track.querySelector('.current-slide-fttr');
    const nextSlide = currentSlide.nextElementSibling || slides[0];
    moveToSlide(track, currentSlide, nextSlide);
});

// Drag functionality
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;
let animationID = 0;
let currentIndex = 0;

slides.forEach((slide, index) => {
    const slideImage = slide.querySelector('img');
    slideImage.addEventListener('dragstart', (e) => e.preventDefault());

    // Touch events
    slide.addEventListener('touchstart', touchStart(index));
    slide.addEventListener('touchend', touchEnd);
    slide.addEventListener('touchmove', touchMove);

    // Mouse events
    slide.addEventListener('mousedown', touchStart(index));
    slide.addEventListener('mouseup', touchEnd);
    slide.addEventListener('mouseleave', touchEnd);
    slide.addEventListener('mousemove', touchMove);
});

function touchStart(index) {
    return function(event) {
        currentIndex = index;
        startPos = getPositionX(event);
        isDragging = true;
        animationID = requestAnimationFrame(animation);
        track.classList.add('grabbing-fttr');
    }
}

function touchEnd() {
    isDragging = false;
    cancelAnimationFrame(animationID);
    track.classList.remove('grabbing-fttr');

    const movedBy = currentTranslate - prevTranslate;

    if (movedBy < -100) {
        currentIndex = (currentIndex + 1) % slides.length;
    }

    if (movedBy > 100) {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    }

    setPositionByIndex();
}

function touchMove(event) {
    if (isDragging) {
        const currentPosition = getPositionX(event);
        currentTranslate = prevTranslate + currentPosition - startPos;
    }
}

function getPositionX(event) {
    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
}

function animation() {
    setSliderPosition();
    if (isDragging) requestAnimationFrame(animation);
}

function setSliderPosition() {
    track.style.transform = `translateX(${currentTranslate}px)`;
}

function setPositionByIndex() {
    currentTranslate = currentIndex * -slideWidth;
    prevTranslate = currentTranslate;
    setSliderPosition();
}