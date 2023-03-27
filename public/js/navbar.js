const navbar = document.getElementsByTagName('nav')[0];
window.addEventListener('scroll', function() {
    console.log(window.scrollY);
    if (window.scrollY > 1) {
        navbar.classList.replace('bg-transparent', 'nav-color');
    } else if (this.window.scrollY <= 0) {
        navbar.classList.replace('nav-color', 'bg-transparent');
    }
});


// menangkap event scroll
window.addEventListener("scroll", muncul);

// fungsi untuk memberikan efek elemen muncul ketika scroll
function muncul() {
    // menangkap setiap tag dengan class elemen
    let elements = document.querySelectorAll(".elemen");
    //perulangan untuk setiap tag dengan class elemen
    for (let i = 0; i < elements.length; i++) {
        //   mengambil ukuran tinggi layar
        let tinggiLayar = window.innerHeight;
        //menangkap ukuran elemen dan posisinya relatif terhadap viewport
        let jarakAtasElemen = elements[i].getBoundingClientRect().top;
        // menentukan ukuran scroll untuk memunculkan elemen
        let ukuranScroll = 150;
        // jika jarak atas elemen kurang dari tinggi layar dikurangi ukuran scroll maka tambahkan class tampil di setiap tag dengan class elemen
        if (jarakAtasElemen < tinggiLayar - ukuranScroll) {
            elements[i].classList.add("tampil");
        }
        // jika tidak maka hapus class tampil
        else {
            elements[i].classList.remove("tampil");
        }
    }
}

// 1. tangkap element dengan class menu
const menu = document.querySelector(".navbar-nav");

// 2. jika element dengan class menu diklik
menu.addEventListener('click', function(e) {
    // 3. maka ambil element apa yang diklik oleh user
    const targetMenu = e.target;

    // 4. lalu cek, jika element itu adalah link dengan class menu__link
    if(targetMenu.classList.contains('nav-link')) {
            
        // 5. maka ambil menu link yang aktif
        const menuLinkActive = document.querySelector(".navbar-nav .nav-item a.active ");

        // 6. lalu cek, Jika menu link active ada dan menu yang di klik user adalah menu yang tidak sama dengan menu yang aktif, (cara cek-nya yaitu dengan membandingkan value attribute href-nya)
        if(menuLinkActive !== null && targetMenu.getAttribute('href') !== menuLinkActive.getAttribute('href')) {

            // 7. maka hapus class active pada menu yang sedang aktif
            menuLinkActive.classList.remove('active');
        }

        // 8. terakhir tambahkan class active pada menu yang di klik oleh user
        targetMenu.classList.add('active');
    }
});
