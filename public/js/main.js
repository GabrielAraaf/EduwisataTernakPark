// Pastikan semua kode dijalankan setelah halaman selesai dimuat
document.addEventListener('DOMContentLoaded', function () {

    // Inisialisasi Slider Aktivitas
    if (document.querySelector(".aktivis-slider")) {
        var aktivisSlider = new Swiper(".aktivis-slider", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: false,
        });
    }

    // Inisialisasi Slider Wahana
    if (document.querySelector(".wahana-slider")) {
        var wahanaSlider = new Swiper(".wahana-slider", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            loop: false,
        });
    }

    // Inisialisasi Slider Galeri
    if (document.querySelector(".galeri-slider")) {
        var galeriSlider = new Swiper(".galeri-slider", {
            loop: true,
            spaceBetween: 20,
            slidesPerView: 1,
            slidesPerGroup: 1,
            breakpoints: {
              640: {
                slidesPerView: 2,
                slidesPerGroup: 2,
                spaceBetween: 20,
              },
              1024: {
                slidesPerView: 3,
                slidesPerGroup: 3,
                spaceBetween: 30,
              },
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
        });
    }


    // Inisialisasi GLightbox untuk galeri popup
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        zoomable: true,
        draggable: true,
        closeButtonSVG: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>',
    });


    // Kalkulasi Interaktif di Halaman Pembayaran
    const paymentPage = document.getElementById('payment-page');
    if (paymentPage) {
        const basePrice = parseFloat(paymentPage.dataset.price);
        const jumlahTiketInput = document.getElementById('jumlah_tiket');
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const totalPembayaranEl = document.getElementById('total_pembayaran');
        const tanggalKunjunganInput = document.getElementById('tanggal_kunjungan');

        if(tanggalKunjunganInput) {
            const today = new Date().toISOString().split('T')[0];
            tanggalKunjunganInput.setAttribute('min', today);
        }

        const updateTotal = () => {
            const quantity = parseInt(jumlahTiketInput.value);
            const total = basePrice * quantity;
            totalPembayaranEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        };

        if(btnMinus) {
            btnMinus.addEventListener('click', () => {
                if (jumlahTiketInput.value > 1) {
                    jumlahTiketInput.value--;
                    updateTotal();
                }
            });
        }
        
        if(btnPlus) {
            btnPlus.addEventListener('click', () => {
                jumlahTiketInput.value++;
                updateTotal();
            });
        }

        if(jumlahTiketInput) {
            jumlahTiketInput.addEventListener('change', updateTotal);
        }
    }

});

