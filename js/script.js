// Mobile Menu Toggle Script
document.addEventListener('DOMContentLoaded', function() {
  const btn = document.getElementById('mobile-menu-btn');
  const menu = document.getElementById('mobile-menu');
  const closeBtn = document.getElementById('close-mobile-menu');
  btn.addEventListener('click', () => {
    menu.classList.remove('hidden');
  });
  closeBtn.addEventListener('click', () => {
    menu.classList.add('hidden');
  });
});