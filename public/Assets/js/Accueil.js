document.querySelector('.show-more-link').addEventListener
('click',function() {
    const moreContent = document.querySelector('.more-content');
    const btn = document.querySelector('.show-more-link');
    if (moreContent.style.display === 'none'|| moreContent.style.display === ''){
        moreContent.style.display = 'block';
        btn.textContent = 'Afficher moins';}
        else{
            moreContent.style.display = 'none';
            btn.textContent = 'Afficher plus';
        }
    });


const email = document.getElementById('email');
const text = document.getElementById('text');
const description = document.getElementById('description');

const email_error = document.getElementById('email_error');
const email_check = "^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
const text_error = document.getElementById('text_error');
const description_error = document.getElementById('description_error');