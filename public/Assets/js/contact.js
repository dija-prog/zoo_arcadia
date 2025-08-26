    document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let isValid = true;

        // Récupération des champs
        const titre = document.querySelector("input[name='titre']");
        const email = document.querySelector("input[name='email']");
        const description = document.querySelector("textarea[name='description']");

        // Zones d'erreur
        const titreError = document.getElementById("text_error");
        const emailError = document.getElementById("email_error");
        const descriptionError = document.getElementById("description_error");

        // Réinitialiser les messages d'erreur
        titreError.textContent = "";
        emailError.textContent = "";
        descriptionError.textContent = "";

        // Vérif titre
        if (titre.value.trim() === "") {
        titreError.textContent = "Veuillez entrer un titre.";
        isValid = false;
        }

        // Vérif email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
        emailError.textContent = "Veuillez entrer une adresse e-mail valide.";
        isValid = false;
        }

        // Vérif description
        if (description.value.trim().length < 10) {
        descriptionError.textContent = "La description doit contenir au moins 10 caractères.";
        isValid = false;
        }

        // Si formulaire valide → envoi
        if (isValid) {
        form.submit();
        }
    });
    });
