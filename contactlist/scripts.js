document.addEventListener("DOMContentLoaded", function() {
    const backBtn = document.getElementById('backBtn');
    const container = document.querySelector('.container.edit');

    if (backBtn && container) {
        backBtn.addEventListener('click', function() {
            console.log('Back button clicked');
            container.style.transform = 'translateY(100%)';
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 800); // Adjust timeout duration to match CSS transition duration
        });
    } else {
        console.error('Back button or container not found');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const backBtn = document.getElementById('backBtn');
    const containerAdd = document.querySelector('.container.add');

    if (backBtn && containerAdd) {
        backBtn.addEventListener('click', function() {
            console.log('Back button clicked');
            containerAdd.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                window.location.href = 'index.php';
            }, 800); // Adjust timeout duration to match CSS transition duration
        });
    } else {
        console.error('Back button or container not found');
    }
});