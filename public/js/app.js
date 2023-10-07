import './bootstrap';

const currentPath = window.location.pathname;

// Find the corresponding navigation item and add the "active" class
const navItems = document.querySelectorAll('.navbar-nav .nav-item');
navItems.forEach((item) => {
    const link = item.querySelector('.nav-link');
    if (link && link.getAttribute('href') === currentPath) {
        item.classList.add('active');
    } else {
        item.classList.remove('active');
    }
});