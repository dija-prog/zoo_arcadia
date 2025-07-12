

const titre = document.getElementById('text'); 
const email = document.getElementById('email');
const description = document.getElementById('description');
const form = document.getElementById('contactForm');
const titre_error = document.getElementById('text_error');
const email_error = document.getElementById('email_error');
const description_error = document.getElementById('description_error');

// Expression régulière pour valider l'email
const email_check = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;

form.addEventListener('submit', async (e) => {
    // Réinitialiser les messages d'erreur
    titre_error.innerHTML = "";
    email_error.innerHTML = "";
    description_error.innerHTML = "";

    let isValid = true;

    // Validation du pseudo
    if (titre.value === '' || titre.value == null) {
        titre_error.innerHTML = "Le pseudo est obligatoire.";
        isValid = false;
    }

    // Validation de l'email
    if (email.value === '' || email.value == null) {
        email_error.innerHTML = "L'email est obligatoire.";
        isValid = false;
    } else if (!email.value.match(email_check)) {
        email_error.innerHTML = "Veuillez entrer une adresse email valide.";
        isValid = false;
    }

    // Validation du message
    if (description.value === '' || description.value == null) {
        description_error.innerHTML = "Le message est obligatoire.";
        isValid = false;
    }

    // Si le formulaire est valide, envoyer les données via fetch
    if (isValid) {
        const formData = {
            titre: titre.value,
            email: email.value,
            description: description.value
        };

        try {
            const response = await fetch('/ContactController', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            if (!response.ok) {
                throw new Error('Erreur lors de la soumission du formulaire');
            }

            const result = await response.json();
            console.log('Succès:', result);
            alert('Formulaire soumis avec succès !');
            form.reset(); // Réinitialiser le formulaire après la soumission
        } catch (error) {
            console.error('Erreur:', error);
            alert('Une erreur est survenue lors de la soumission du formulaire.');
        }
    }
});
