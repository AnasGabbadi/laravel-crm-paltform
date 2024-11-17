// JavaScript pour gérer le clic sur les éléments du menu
document.addEventListener('DOMContentLoaded', () => {
    const menuItems = document.querySelectorAll('.nav-link');
    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            // Supprime la classe 'active' de tous les éléments du menu
            menuItems.forEach(item => item.classList.remove('active'));
            // Ajoute la classe 'active' à l'élément cliqué
            item.classList.add('active');
        });
    });
});