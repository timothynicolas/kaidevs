import {showMobileNavbar, hideMobileNavbar} from './js/toggleMobileNavbar.js';


const track = document.querySelector('.carousel-track');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;

function updateCarousel() {
  // const width = items[0].clientWidth;
  const width = items[0].offsetWidth;
  track.style.transform = `translateX(-${currentIndex * width}px)`;
}

nextBtn.addEventListener('click', () => {
  if (currentIndex < totalItems - 1) {
    currentIndex++;
    updateCarousel();
  }
});

prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    updateCarousel();
  }
});

window.addEventListener('resize', updateCarousel); 

// TOGGLE INCLUSIONS

const toggleBtns = document.querySelectorAll('.expand');
const advancedInclusions = document.querySelectorAll('.advanced-inclusions');

toggleBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    const isExpanded = btn.getAttribute("data-expanded") === "true";

    advancedInclusions.forEach(section => {
      section.classList.toggle('hidden', isExpanded);
    });

    // Update ALL buttons (not just the clicked one)
    toggleBtns.forEach(button => {
      if (isExpanded) {
        button.innerHTML = 'See all inclusions <img src="assets/services-angle-down.svg" alt="arrow icon">';
        button.setAttribute("data-expanded", "false");
      } else {
        button.innerHTML = 'Hide inclusions <img src="assets/services-angle-up.svg" alt="arrow icon">';
        button.setAttribute("data-expanded", "true");
      }
    });
  });
});

// TOGGLE MOBILE NAVBAR

const mobileNavBtn = document.querySelector('.hamburger-button');
const xmarkMobileNav = document.getElementById('mobile-xmark');

    
mobileNavBtn.addEventListener('click', showMobileNavbar);
xmarkMobileNav.addEventListener('click', hideMobileNavbar);

let mobileNavItems = document.querySelectorAll('.mobile-navbar-item');

mobileNavItems.forEach((item) => {
  item.addEventListener('click', hideMobileNavbar)
});



