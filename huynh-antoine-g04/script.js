//Cette fonction permet de basculer entre le thème clair et sombre en ajoutant ou supprimant la classe "dark-theme" sur l'élément body
//Elle change le texte du bouton pour basculer entre "Passer en mode jour" et "Passer en mode nuit" et enregistre le thème actuel dans le localStorage pour le conserver à travers les sessions.
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



// Ajoutez ce code dans votre fichier JavaScript
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



document.getElementById('settings-link').addEventListener('click', function() {
  document.getElementById('settings-modal').style.display = 'block';
});

document.getElementById('search-link').addEventListener('click', function() {
  document.querySelector('.search-form').scrollIntoView({ behavior: 'smooth' });
});

document.getElementById('new-post-link').addEventListener('click', function() {
  document.getElementById('modal').style.display = 'block';
});


function confirmDelete() {
  return confirm("Êtes-vous sûr de vouloir supprimer ce post ?");
}







