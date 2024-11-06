
const buttons = document.querySelectorAll(".buttonfiltre");
const filtrecards = document.querySelectorAll(".animals-card"); 
console.log(buttons , filtrecards);


const filtres = e =>{ 
    filtrecards.forEach(card =>{
        card.classList.add("hide");
        if(card.dataset.habitat === e.target.dataset.habitat || e.target.dataset.habitat =="all"){
            card.classList.remove("hide"); 
        }
    });
}
buttons.forEach(button => button.addEventListener("click", filtres));