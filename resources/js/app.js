import './bootstrap';
// ==================== MENU MOBILE ====================
document.addEventListener('DOMContentLoaded', function() {

    const toggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');

    if (toggle && navLinks) {
        toggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    }

    // ==================== ALERTES FLASH AUTO-DISPARITION ====================
    const flashMessage = document.getElementById('flashMessage');
    if (flashMessage) {
        // Disparition automatique après 5 secondes
        setTimeout(function() {
            flashMessage.style.transition = 'opacity 0.5s';
            flashMessage.style.opacity = '0';
            setTimeout(function() {
                flashMessage.style.display = 'none';
            }, 500);
        }, 5000);

        // Le bouton de fermeture est déjà géré dans le HTML (onclick)
    }

});