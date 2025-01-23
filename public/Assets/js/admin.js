document.addEventListener("DOMContentLoaded",() => {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    document.querySelector("#toggle-btn").onclick = () => {
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

// création de graphique avec chart.js


document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch('/AdminController.php/admin/getAnimals');
        const data = await response.json();

        const labels = data.map(item => item.name);
        const views = data.map(item => item.views);

        const ctx = document.getElementById("viewsChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Nombre de consultations",
                    data: views,
                    backgroundColor: "rgba(75, 192, 192, 0.6)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } catch (error) {
        console.error("Erreur lors de la récupération des données:", error);
    }
});


        // const data = echo json_encode($data);
        // const labels = data.map(item => item.name);
        // const views = data.map(item => item.views);

        // const ctx = document.getElementById('viewsChart').getContext('2d');
        // new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //     labels: labels,
        //     datasets: [{
        //         label: 'Consultations par animal',
        //         data: views,
        //         backgroundColor: 'rgba(75, 192, 192, 0.2)',
        //         borderColor: 'rgba(75, 192, 192, 1)',
        //         borderWidth: 1
        //     }]
        //     },
        //     options: {
        //     responsive: true,
        //     scales: {
        //         y: {
        //         beginAtZero: true
        //         }
        //     }
        //     }
        // });














const barCanvas = document.getElementById("barCanvas");
const barChart = new Chart(barCanvas,{
    type: "bar",
    data: {
        labels: ["animal_nom"],
        datasets:[{
            data:["views"],
            backgroundColor: [
                
            ]
        }]
    },
    options: {
        responsive: true,
        scales:{
            y:{
                beginAtZero : true
            }
        }
    }
})

const ADD_ANIMAL_FORM = document.querySelector('#add-animal-form');

ADD_ANIMAL_FORM.addEventListener('submit', (ev) => {
    ev.preventDefault();

    const DATA = new FormData(ADD_ANIMAL_FORM);
    console.log(DATA.get('animal_nom'));
    addAnimal(DATA);
})

async function addAnimal(data) {
    const RESPONSE = await fetch('/add-animal', {
        'method' : 'POST',
        'body' : data
    });
    const JSON = await RESPONSE.json();
    console.log(JSON); 
}


// document.querySelectorAll('.btn-danger').forEach(button => {
//     button.addEventListener('click', function (e) {
//         e.preventDefault();

//         const avisId = this.getAttribute('data-id');
//         if (confirm('Êtes-vous sûr de vouloir supprimer cet avis ?')) {
//             fetch('/index.php?action=supprimerAvis', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/x-www-form-urlencoded',
//                     'X-Requested-With': 'XMLHttpRequest'
//                 },
//                 body: `id=${avisId}`
//             })
//             .then(response => response.json())
//             .then(data => {
//                 if (data.success) {
//                     this.closest('.card').remove();
//                 } else {
//                     alert(data.message || 'Erreur lors de la suppression.');
//                 }
//             })
//             .catch(error => console.error('Erreur AJAX :', error));
//         }
//     });
// });

