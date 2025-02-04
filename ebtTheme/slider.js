// logic for the slider component

// safari is making me put this outside the block or else i get an error
if (document.getElementById('slider-special')) {
    const interval = 1200;
    const slideContainer = document.querySelector('.container');
    const slide = document.querySelector('.slides');
    const forward = document.getElementById('next-btn');
    const back = document.getElementById('prev-btn');
    let slides = document.querySelectorAll('.slide');
    let index = 2;
    let slideId;

    const firstClone = slides[0].cloneNode(true);
    const lastClone = slides[slides.length - 1].cloneNode(true);
    const secondClone = slides[1].cloneNode(true);
    const thirdClone = slides[2].cloneNode(true);

    firstClone.id = 'first-clone';
    secondClone.id = 'second-clone'
    lastClone.id = 'last-clone';

    slide.append(firstClone, secondClone, thirdClone);
    slide.prepend(lastClone);

    const slideWidth = slides[index].clientWidth;

    slide.style.transform = `translateX(${-slideWidth * index}px)`;

    const startSlide = () => {
        slideId = setInterval(() => {
            moveToNextSlide()
        }, interval);
    };
    function hello() {
        slideId = setInterval(() => {
            moveToNextSlide()
        }, interval);
    };

    const getSlides = () => document.querySelectorAll('.slide');

    // this where we move the slides forward
    slide.addEventListener('transitionend', () => {
        // when it reaches the second cloned slide, it instantly brings the whole slide bar forward
        if (slides[index].id === secondClone.id) {
            // console.log("reset the slides")
            slide.style.transition = 'none';
            index = 2;
            slide.style.transform = `translateX(${-slideWidth * index}px)`;
        }
    });

    // changed "const" to var for safari
    // handles the movement to the next slide with css transform property
    var moveToNextSlide = () => {
        slides = getSlides()
        if (index >= slides.length - 1) return;
        index++;
        slide.style.transform = `translateX(${-slideWidth * index}px)`;
        slide.style.transition = '.7s';
    }

    // handles the movement to the previous slide with css transform property
    var moveToPreviousSlide = () => {
        if (index <= 0) return;
        slides = getSlides()
        index--;
        slide.style.transform = `translateX(${-slideWidth * index}px)`;
        slide.style.transition = '.7s';
    }

    function myFunction(x) {
        if (x.matches) { // If media query matches
            hello();
            // console.log(startSlide);
            // startSlide;
        } else {
            // when the mouse enters the .container div, start moving the slides
            slideContainer.addEventListener('mouseenter', startSlide);
            // when the mouse leaves the .container div, stop the slides
            slideContainer.addEventListener('mouseleave', () => {
                clearInterval(slideId);
            })
        }
    }

    var x = window.matchMedia("(max-width: 1020px)")
    myFunction(x)

    forward.addEventListener("pointerdown", () => {
        moveToNextSlide()
    })

    back.addEventListener("pointerdown", () => {
        moveToPreviousSlide()
    })
}