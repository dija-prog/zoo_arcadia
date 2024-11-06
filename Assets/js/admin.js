document.addEventListener("DOMContentLoaded",() => {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    document.querySelector("#toggle-btn").onclick = () => {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('expanded')
    }

})

// button ajouter de form user

// document.addEventListener("DOMContentLoaded",function(){
//     const button = document.getElementById("serviceBtn");
//     const form = document.getElementById("formService");

//     button.addEventListener("click",function(){
//         console.log("button click")
//         if (form.style.display === "none"|| form.style.display === "none") {
//             // console.log("form not hide")
//             form.style.display = "block";
//         } else {
//             // console.log("form is hide")
//             form.style.display = "none";

//         }

//     });
// });

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

