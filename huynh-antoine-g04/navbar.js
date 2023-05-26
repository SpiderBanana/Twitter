    // Sélectionner le bouton hamburger et le menu déroulant
    var hamburger = document.getElementById("hamburger");
    var dropdown = document.getElementById("dropdown");

    // Ajouter un gestionnaire d'événements au clic sur le bouton hamburger
    hamburger.addEventListener("click", function() {
        // Montrer ou cacher le menu déroulant
        if (dropdown.classList.contains("dropdown-open")) {
            dropdown.classList.remove("dropdown-open");
        } else {
            dropdown.classList.add("dropdown-open");
        }
    });

    // Attacher les fonctions aux liens de menu
    document.getElementById("post-link").addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById("floating-btn").click();
    });

    document.getElementById("choose-picture-link").addEventListener("click", function(e) {
        e.preventDefault();
        document.getElementById("settings-btn").click();
    });