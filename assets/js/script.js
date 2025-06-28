// assets/js/script.js

document.addEventListener('DOMContentLoaded', function () {
  const toggles = document.querySelectorAll('.sidebar-toggle');

  toggles.forEach(toggle => {
    toggle.addEventListener('click', function () {
      const target = document.querySelector(this.dataset.bsTarget);
      if (target) {
        target.classList.toggle('show');
      }
    });
  });
});
