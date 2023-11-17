const navItems = document.querySelectorAll('.nav-item');
const navbarToggler = document.querySelector('.navbar-toggler');
const maxWidthForScript = 991.11; // Ustaw tutaj maksymalną szerokość, dla której ma działać skrypt

for (const navItem of navItems) {
  navItem.addEventListener('click', () => {
    if (window.innerWidth <= maxWidthForScript) {
      navbarToggler.click();
    }
  });
}
