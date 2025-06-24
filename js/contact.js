import {showMobileNavbar, hideMobileNavbar} from './toggleMobileNavbar.js';




// TOGGLE MOBILE NAVBAR

const mobileNavBtn = document.querySelector('.hamburger-button');
const xmarkMobileNav = document.getElementById('mobile-xmark');

    
mobileNavBtn.addEventListener('click', showMobileNavbar);
xmarkMobileNav.addEventListener('click', hideMobileNavbar);

let mobileNavItems = document.querySelectorAll('.mobile-navbar-item');

mobileNavItems.forEach((item) => {
  item.addEventListener('click', hideMobileNavbar)
});



document.querySelectorAll('select.form-input').forEach(select => {
  const placeholderOption = select.querySelector('option[value=""]');

  // Initial check on load
  if (select.selectedIndex > 0) {
    select.classList.add('filled');
  }

  // On change
  select.addEventListener('change', function () {
    if (this.selectedIndex > 0) {
      this.classList.add('filled');
    } else {
      this.classList.remove('filled');
    }
  });
});





