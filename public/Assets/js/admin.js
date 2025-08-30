document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');


    document.querySelector("#toggle-btn").onclick= () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded')
    }

})






// suprimer un utilisateur

function confirmationSup(){
    if(confirm("Ëtes vous sûr de vouloir supprimer  ?")){
        console.log("utilisateur supprimé.");
        alert ("l'utilisateur a été supprimé avec succés")
        
    }else{
        console.log("suppression annulée")
        alert("la suppression a été annulée")
    }


}



document.addEventListener('DOMContentLoaded', function() {
    // je vérifie est ce que canvas exist
    const ctx = document.getElementById('animalViewsChart');
    if (!ctx) {
        return; // on arrête le script sans erreur
    }
    fetch('/ShowAnimalsStatics')
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur réseau : ' + response.statusText);
            }
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new TypeError("La réponse n'est pas du JSON valide");
            }
            return response.json();
        })
        .then(data => {
            if (!data || !Array.isArray(data)) {
                throw new Error('Les données reçues sont invalides ou vides');
            }

            const labels = data.map(animal => animal.animal_nom);
            const views = data.map(animal => animal.views);

            const ctx = document.getElementById('animalViewsChart');
            if (!ctx) {
                throw new Error("L'élément canvas #animalViewsChart n'existe pas dans le DOM");
            }
            
            const myChart = new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Nombre de vues',
                        data: views,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des données:', error);
            alert('Une erreur est survenue lors du chargement des données. Veuillez réessayer plus tard.');
        });
});


