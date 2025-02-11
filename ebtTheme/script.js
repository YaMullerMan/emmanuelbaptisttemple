// nav menu 

// script for mobile nav functionality
const navClose = document.getElementsByClassName('mobile-nav-x')[0];
const navContainer = document.getElementsByClassName('mobile-nav-container')[0];
const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)

navClose.addEventListener("click", (e) => {
    let target = e.currentTarget;
    if (target.classList.length <= 1) {
        target.classList.toggle('open');
        navContainer.style.padding = "30px 50px 30px 0";
        navContainer.style.width = "100%";
        navContainer.style.opacity = "1";
    } else {
        navContainer.style.width = "0";
        navContainer.style.padding = "30px 0 0 0";
        target.classList.toggle('open');
        navContainer.style.opacity = "0";
    }
});