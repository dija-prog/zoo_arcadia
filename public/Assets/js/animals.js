
document.addEventListener('DOMContentLoaded', function() {
    const animal_id = /* récupérer l'ID de l'animal depuis votre page */
    
    fetch(`/incrementView/${animal_id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => console.log('Vue enregistrée'))
    .catch(error => console.error('Erreur:', error));
});

