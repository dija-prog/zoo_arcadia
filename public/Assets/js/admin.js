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



    // une requete fetch pour ne pas recharger la page 

const ADD_ANIMAL_FORM = document.querySelector('#add-animal-form');
ADD_ANIMAL_FORM.addEventListener('submit', (ev) => {
    ev.preventDefault();
    const DATA = new FormData(ADD_ANIMAL_FORM);
    console.log(DATA.get('animal_nom'));
    addAnimal(DATA);
})

async function addAnimal(data) {
    const RESPONSE = await fetch('/add-animal',{
        'method' : 'POST',
        'body' : data
    });
    const JSON = await RESPONSE.json();
    console.log(JSON); 
}



// filter les role dans la table user 
function fetchData()
{
    var action = 'fatchData';
    $.ajax({
        url:"admin.php",
        method:'POST',
        data:{action:action},
        success: function(data){
            $('#post_list').html(data);
        }
    });

}
$(document).ready(function()
{   
    $('#postData').submit(function(event){
        event.preventDefault();
        var nom = $('nom').val();
        var prenom = $('prenom').val();
        var username = $('username').val();
        var role_id = $('role_id').val();
        
    });


});