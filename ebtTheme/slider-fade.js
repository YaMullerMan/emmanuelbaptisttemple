
class CustomSlider extends HTMLElement {
    constructor() {
        super();
        this.slides = this.querySelectorAll('.slider__slide');
        this.dots = this.querySelectorAll('.slider__dot');
        this.nextButton = this.querySelector('.slider__next');
        this.prevButton = this.querySelector('.slider__previous');
        this.index = 1;
        this.interval;

        this.makeDots();
        this.slideStart();

        this.nextButton.addEventListener('click', this.nextSlide.bind(this));
        this.prevButton.addEventListener('click', this.prevSlide.bind(this));
        this.addEventListener('mouseleave', this.slideStart);
        this.addEventListener('mouseenter', this.slideStop);

        // make sure initial active dot and slide are set
    }

    makeDots() {
        // loop through slides, create a dot for each one, add eventListeners 
        for (let i = 0; i < this.slides.length; i++) {
            let dot = document.createElement("span");
            dot.className = "slider__dot";
            if (i == 0) dot.classList.add('active');
            dot.addEventListener("click", (event) => {
                this.dotSlide(event, i);
            });
            document.querySelector('.slider__dots-container').appendChild(dot);
        }
    }

    slideStart() {
        this.interval = setInterval(this.nextSlide.bind(this), 5000);
    }

    slideStop() {
        clearInterval(this.interval);
    }

    dotSlide(event, index) {
        if (!event.target.classList.contains('active')) {
            this.querySelector('.slider__slide.active').classList.remove('active');
            this.slides[index].classList.add('active');
            this.querySelector('.slider__dot.active').classList.remove('active');
            this.querySelectorAll('.slider__dot')[index].classList.add('active');
        }
    }

    nextSlide() {
        // get the next item in the array, add the active class
        // remove active class from current slide
        let active = this.querySelector('.slider__slide.active');
        let activeDot = this.querySelector('.slider__dot.active');
        let index = Number(active.getAttribute('data-index'));
        let next, nextDot;
        if (this.slides.length > index + 1) { // length is greater than 1-based index
            //next = this.querySelector(`.slider__slide[data-index="${++index}"]`);
            next = this.slides[index + 1];
            nextDot = this.querySelectorAll('.slider__dot')[index + 1];
        } else { // loop back to the beginning
            next = this.querySelector('.slider__slide[data-index="0"]');
            nextDot = this.querySelectorAll('.slider__dot')[0];
        }
        active.classList.remove('active');
        activeDot.classList.remove('active');
        next.classList.add('active');
        nextDot.classList.add('active');
    }

    prevSlide() {

    }
}
customElements.define('custom-slider', CustomSlider);