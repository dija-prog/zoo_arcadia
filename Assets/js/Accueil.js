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