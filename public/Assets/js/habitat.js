    
    
    const button = document.querySelectorAll(".buttonjs div");
    const cards = document.querySelectorAll(".cards .card");
    const texts = document.querySelectorAll(".texts .text ")
    console.log(cards);
    const animals = e =>{
        cards.forEach(card=>{
            card.classList.add("hidden");
            if(e.target.dataset.name === card.dataset.name ){
                card.classList.remove("hidden");
            }
        });
    };
    button.forEach(a => a.addEventListener("click",animals)); 

//  js pour la description 

    console.log(texts);
    const habitat = e =>{
        texts.forEach(text=>{
            console.log("e" + e.target.dataset.name);
            console.log("text" + text.dataset.name);
            text.classList.add("hide");
            if(e.target.dataset.name === text.dataset.name ){
                text.classList.remove("hide");
            }
        });
    };
    button.forEach(a => a.addEventListener("click",habitat)); 
    

      // incrimenter les views 

    function incrementAnimalView($animalName){
        fetch('AdminController.php', {
            method: 'POST',
            headers: {
                'content-Type':'application/json'
            },
    
            body: JSON.stringify({animal_id: $animalName})
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('consultaion incrémentée avec succès');
    
            } else {
                console.error('Erreur lors de l\' incrémentation ');
            }
        })
        .catch(error => console.error('Erreur:', error));
    }

