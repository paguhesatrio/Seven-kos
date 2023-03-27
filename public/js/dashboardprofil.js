let btn = document.querySelector('#btn');
let sidebar = document.querySelector('.sidebar');
let srcBtn = document.querySelector('.bx-search-alt');

btn.onclick = function() {
    sidebar.classList.toggle('active');
}

srcBtn.onclick = function() {
    sidebar.classList.toggle('active');
}
