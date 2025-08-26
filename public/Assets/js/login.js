

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById('reset-form');

    if (form) {
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;

            if (password !== confirmPassword) {
                e.preventDefault();
                const errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'block';
            }
        });
    }
});
;


document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('login-form');

    if (!form) {
        console.error("Formulaire login introuvable !");
        return;
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('/login/authenticate', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Connexion réussie, redirection selon le rôle
                if (data.role === 1) {
                    window.location.href = '/admin';
                } else if (data.role === 2) {
                    window.location.href = '/employe';
                } else if (data.role === 3) {
                    window.location.href = '/veterinaire';
                }
            } else {
                // Réinitialiser les erreurs avant d'afficher
                document.getElementById('email_error').textContent = "";
                document.getElementById('password_error').textContent = "";

                // Afficher les erreurs sous les champs correspondants
                if (data.message.includes('Mot de passe incorrect') || data.message.includes('Utilisateur non trouvé')) {
                    document.getElementById('password_error').textContent = data.message;
                } else if (data.message.includes('Veuillez remplir tous les champs')) {
                    document.getElementById('email_error').textContent = data.message;
                }
            }
        })
        .catch(error => {
            console.error('Erreur de soumission du formulaire:', error);
        });
    });
});
