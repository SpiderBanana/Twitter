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
  const tweets = document.getElementsByClassName('tweet-content');
  for (let tweet of tweets) {
    tweet.innerHTML = entourerMotsAvecHashtag(tweet.textContent);
  }

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
 

function resetLocalStorage() {
  localStorage.removeItem("message");
  localStorage.removeItem("tag");
}

function confirmDelete() {
  return confirm("Êtes-vous sûr de vouloir supprimer ce post ?");
}
