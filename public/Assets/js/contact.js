document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const alertBox = document.getElementById("AlertForm");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        // Récupération des valeurs
        const titre = document.querySelector("input[name='titre']").value.trim();
        const email = document.querySelector("input[name='email']").value.trim();
        const description = document.getElementById("description").value.trim();

        // Réinitialiser erreurs
        document.getElementById("text_error").textContent = "";
        document.getElementById("email_error").textContent = "";
        document.getElementById("description_error").textContent = "";
        alertBox.innerHTML = "";

        let hasError = false;

        // Validation front
        if (titre === "") {
            document.getElementById("text_error").textContent = "Veuillez entrer un titre.";
            hasError = true;
        }

        if (email === "") {
            document.getElementById("email_error").textContent = "Veuillez entrer une adresse email.";
            hasError = true;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            document.getElementById("email_error").textContent = "Adresse email invalide.";
            hasError = true;
        }

        if (description === "") {
            document.getElementById("description_error").textContent = "Veuillez entrer une description.";
            hasError = true;
        }

        if (hasError) return;

        try {
            const response = await fetch("/handle-contact", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ titre, email, description }),
            });

            const result = await response.json();

            if (result.success) {
                alertBox.innerHTML = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${result.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                    </div>
                `;
                form.reset();
                setTimeout(() => {
                    alertBox.innerHTML = "";
                }, 5000);
            } else {
                // Affichage d'erreur  sous les champs
                if (result.errors.titre) {
                    document.getElementById("text_error").textContent = result.errors.titre;
                }
                if (result.errors.email) {
                    document.getElementById("email_error").textContent = result.errors.email;
                }
                if (result.errors.description) {
                    document.getElementById("description_error").textContent = result.errors.description;
                }
                // Si erreur BDD, on l’affiche sous description
                if (result.errors.db) {
                    document.getElementById("description_error").textContent = result.errors.db;
                }
            }
        } catch (error) {
            console.error("Erreur:", error);
            document.getElementById("description_error").textContent = "Une erreur serveur est survenue. Veuillez réessayer.";
        }
    });
});
