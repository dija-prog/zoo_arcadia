

document.getElementById('reset-form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (password !== confirmPassword) {
        e.preventDefault();
        const errorMessage = document.getElementById('error-message');
        errorMessage.style.display = 'block';
    }
});

document.getElementById('login-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Empêche l'envoi classique du formulaire

    let formData = new FormData(this);
    let emailInput = document.getElementById('username');
    let passwordInput = document.getElementById('password');
    
    // Réinitialiser les erreurs
    emailInput.classList.remove('is-invalid');
    passwordInput.classList.remove('is-invalid');
    document.getElementById('username-error').textContent = '';
    document.getElementById('password-error').textContent = '';

    // Utiliser fetch pour soumettre le formulaire
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
