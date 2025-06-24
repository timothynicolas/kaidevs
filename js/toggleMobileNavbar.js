const mobileNavbar = document.querySelector('.mobile-navbar');

export function showMobileNavbar(){
    mobileNavbar.classList.add('active');
     document.body.classList.add('no-scroll'); // ⛔ disables scroll
};

export function hideMobileNavbar(){
    mobileNavbar.classList.remove('active');
    document.body.classList.remove('no-scroll'); // ✅ enables scroll
}