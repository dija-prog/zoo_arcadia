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
    if(confirm("Ëtes vous sûr de vouloir supprimer cet utilisateur  ?")){
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
        const response = await fetch('/get_animal_views.php');
        const data = await response.json();

        const labels = data.map(animal => animal.name);
        const views = data.map(animal => animal.views);

        const ctx = document.getElementById("barCanvas").getContext("2d");
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













// const barCanvas = document.getElementById("barCanvas");
// const barChart = new Chart(barCanvas,{
//     type: "bar",
//     data: {
//         labels: ["animal_nom"],
//         datasets:[{
//             data:["views"],
//             backgroundColor: [
                
//             ]
//         }]
//     },
//     options: {
//         responsive: true,
//         scales:{
//             y:{
//                 beginAtZero : true
//             }
//         }
//     }
// })