function toggleTheme() {
  const body = document.body;
  const toggleBtn = document.getElementById("toggle-theme");

  body.classList.toggle("dark-theme");

  if (body.classList.contains("dark-theme")) {
    localStorage.setItem("theme", "dark");
    toggleBtn.textContent = "Passer en mode jour";
  } else {
    localStorage.setItem("theme", "light");
    toggleBtn.textContent = "Passer en mode nuit";
  }
}

function loadTheme() {
  const body = document.body;
  const toggleBtn = document.getElementById("toggle-theme");
  const theme = localStorage.getItem("theme");

  if (theme === "dark") {
    body.classList.add("dark-theme");
    toggleBtn.textContent = "Passer en mode jour";
  } else {
    body.classList.remove("dark-theme");
    toggleBtn.textContent = "Passer en mode nuit";
  }
}

document.addEventListener("DOMContentLoaded", () => {
  loadTheme();
  

  // Récupérer les éléments du DOM
  const messageInput = document.getElementById("message-input");
  const tagSelect = document.getElementById("tag-select");

  // Récupérer les données du localStorage au chargement de la page
  const savedMessage = localStorage.getItem("message");
  const savedTag = localStorage.getItem("tag");

  if (savedMessage) {
    messageInput.value = savedMessage;
  }

  if (savedTag) {
    tagSelect.value = savedTag;
  }

  // Fonction pour sauvegarder les données dans le localStorage
  function saveData() {
    localStorage.setItem("message", messageInput.value);
    localStorage.setItem("tag", tagSelect.value);
  }

  // Ajouter des écouteurs d'événements pour détecter les modifications
  messageInput.addEventListener("input", saveData);
  tagSelect.addEventListener("change", saveData);
});

document.getElementById('toggle-theme').addEventListener('click', toggleTheme);

document.addEventListener("DOMContentLoaded", function () {
  const floatingBtn = document.getElementById("floating-btn");
  const modal = document.getElementById("modal");
  const closeBtn = document.querySelector(".close");

  floatingBtn.onclick = function () {
    modal.style.display = "block";
  };

  closeBtn.onclick = function () {
    modal.style.display = "none";
  };
});

document.getElementById('settings-btn').onclick = function() {
  document.getElementById('settings-modal').style.display = 'block';
}

document.querySelector('#settings-modal .close').onclick = function() {
  document.getElementById('settings-modal').style.display = 'none';
}

window.onclick = function (event) {
  if (event.target === modal) {
    modal.style.display = "none";
  } else if (event.target === settingsModal) {
    settingsModal.style.display = "none";
  }
};

const settingsBtn = document.getElementById("settings-btn");
const settingsModal = document.getElementById("settings-modal");
const closeModal = document.getElementsByClassName("close")[0];

settingsBtn.onclick = function () {
  settingsModal.style.display = "block";
};

closeModal.onclick = function () {
  settingsModal.style.display = "none";
};
 
//tags grid
window.addEventListener('DOMContentLoaded', (event) => {
  const buttons = document.querySelectorAll('.tag-button');
  buttons.forEach((button) => {
    button.addEventListener('click', function(event) {
      event.preventDefault(); // empêche le comportement par défaut du bouton
      const tag = this.getAttribute('data-tag');
      const url = "home.php?search=&tag=" + tag; // prépare l'URL finale
      window.location.href = url; // redirige l'utilisateur vers l'URL
    });
  });
});









function confirmDelete() {
  return confirm("Êtes-vous sûr de vouloir supprimer ce post ?");
}


function resetLocalStorage() {
  localStorage.removeItem("message");
  localStorage.removeItem("tag");
}








function showModal() {
  if (!isLoggedIn()) {
    document.getElementById('loginModal').style.display = 'block';
    document.body.classList.add('blur');
    document.querySelector('.page-content').classList.add('blur');
    document.getElementById('loginModal').style.display = 'block';
  }
}

// Ajoutez des écouteurs d'événements pour le bouton de changement de photo de profil et le bouton d'ouverture du modal de post
document.getElementById('settings-btn').addEventListener('click', showModal);
document.getElementById('floating-btn').addEventListener('click', showModal);

// Ajoutez un écouteur d'événements pour détecter le défilement de la page
window.addEventListener('scroll', function() {
  setTimeout(function() {
    showModal();
  }, 1000);
});

function removeBlur() {
  document.body.classList.remove('blur');
  document.querySelector('.page-content').classList.remove('blur');
}


// Ajoutez un écouteur d'événement pour détecter la fermeture du modal
document.getElementById('loginModal').addEventListener('click', function(event) {
  if (event.target.id === 'loginModal') {
    document.body.classList.remove('blur');
    document.querySelector('.page-content').classList.remove('blur');
    document.getElementById('loginModal').style.display = 'none';
  }
});

document.getElementById("profile_picture").addEventListener("change", function(event) {
  var formData = new FormData(document.getElementById("profile-picture-form"));

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "", true);
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

  xhr.onload = function() {
    if (xhr.status === 200) {
      // Mettre à jour la source de l'image de profil avec la nouvelle photo
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        var profilePictureElements = document.getElementsByClassName("profile-picture");
        for (var i = 0; i < profilePictureElements.length; i++) {
          profilePictureElements[i].src = response.profile_picture;
        }
      } else {
        alert("Une erreur s'est produite lors du téléchargement de la photo de profil.");
      }
    } else {
      alert("Une erreur s'est produite lors du téléchargement de la photo de profil.");
    }
  };

  xhr.send(formData);
  event.preventDefault();
});














//changer la couleur du container-wrapper box shadow
window.onload = function() {
  // Récupérer le tag de l'URL
  const urlParams = new URLSearchParams(window.location.search);
  const tag = urlParams.get('tag');

  // Définir les couleurs des tags
  const tagColors = {
    '1': '#F44336',
    '2': '#E91E63',
    '3': '#9C27B0',
    '4': '#673AB7',
    '5': '#3F51B5',
    '6': '#2196F3',
    '7': '#03A9F4',
    '8': '#00BCD4',
    '9': '#009688',
    '10': '#4CAF50',
  };

  // Changer la box-shadow du post-container en fonction du tag
  if (tag && tagColors[tag]) {
    const containerWrapper = document.querySelector('.container-wrapper');
    containerWrapper.style.boxShadow = '0 0 10px ' + tagColors[tag];
  }
};

// Sélectionner tous les boutons de tag
const tagButtons = document.querySelectorAll('.tag-button');

// Pour chaque bouton de tag, ajouter un gestionnaire d'événements click qui redirige vers la page actuelle avec le tag spécifié dans l'URL
tagButtons.forEach(button => {
  button.addEventListener('click', function() {
    window.location.href = "?tag=" + this.dataset.tag;
  });
});





