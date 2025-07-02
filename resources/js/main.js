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
    // Ambil kedua harga dari data attributes
    const weekdayPrice = parseFloat(paymentPage.dataset.priceWeekday);
    const weekendPrice = parseFloat(paymentPage.dataset.priceWeekend);
    
    // Variabel untuk menyimpan harga yang berlaku saat ini
    let currentPrice = weekdayPrice;

    // Ambil semua elemen yang dibutuhkan
    const jumlahTiketInput = document.getElementById('jumlah_tiket');
    const btnMinus = document.getElementById('btn-minus');
    const btnPlus = document.getElementById('btn-plus');
    const totalPembayaranEl = document.getElementById('total_pembayaran');
    const hargaPerTiketDisplay = document.getElementById('harga_per_tiket_display');
    const tanggalKunjunganInput = document.getElementById('tanggal_kunjungan');

    // --- PERBAIKAN: Hanya jalankan kode jika semua elemen ditemukan ---
    if (jumlahTiketInput && btnMinus && btnPlus && totalPembayaranEl && hargaPerTiketDisplay && tanggalKunjunganInput) {

        // Atur tanggal minimal hari ini
        const today = new Date().toISOString().split('T')[0];
        tanggalKunjunganInput.setAttribute('min', today);

        // Fungsi untuk mengupdate total harga
        const updateTotal = () => {
            const quantity = parseInt(jumlahTiketInput.value) || 0;
            const total = currentPrice * quantity;
            totalPembayaranEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        };

        // Fungsi untuk mengubah harga berdasarkan tanggal yang dipilih
        const updatePriceBasedOnDate = () => {
            const selectedDateValue = tanggalKunjunganInput.value;
            if (!selectedDateValue) {
                // Jika tanggal kosong, gunakan harga weekday sebagai default
                currentPrice = weekdayPrice;
                hargaPerTiketDisplay.textContent = 'Rp ' + weekdayPrice.toLocaleString('id-ID');
                updateTotal();
                return;
            }

            const selectedDate = new Date(selectedDateValue);
            const day = selectedDate.getDay(); // 0 = Minggu, 6 = Sabtu

            if (day === 0 || day === 6) {
                // Jika hari Minggu atau Sabtu, gunakan harga weekend
                currentPrice = weekendPrice;
                hargaPerTiketDisplay.textContent = 'Rp ' + weekendPrice.toLocaleString('id-ID');
            } else {
                // Selain itu, gunakan harga weekday
                currentPrice = weekdayPrice;
                hargaPerTiketDisplay.textContent = 'Rp ' + weekdayPrice.toLocaleString('id-ID');
            }
            // Hitung ulang total setelah harga berubah
            updateTotal();
        };

        // Tambahkan event listener untuk setiap interaksi
        tanggalKunjunganInput.addEventListener('change', updatePriceBasedOnDate);
        btnMinus.addEventListener('click', () => {
            if (jumlahTiketInput.value > 1) {
                jumlahTiketInput.value--;
                updateTotal();
            }
        });
        btnPlus.addEventListener('click', () => {
            jumlahTiketInput.value++;
            updateTotal();
        });
        jumlahTiketInput.addEventListener('input', updateTotal);
    }
}

// --- LOGIKA BARU UNTUK COUNTDOWN TIMER ---
    const countdownElement = document.getElementById('countdown-timer');

    // Hanya jalankan kode ini jika elemen countdown ada di halaman
    if (countdownElement) {
        const expirationTimestamp = parseInt(countdownElement.dataset.expiration) * 1000; // Ubah ke milidetik

        // Fungsi yang akan dijalankan setiap detik
        const countdownInterval = setInterval(function() {
            const now = new Date().getTime();
            const distance = expirationTimestamp - now;

            // Kalkulasi waktu
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Tampilkan hasilnya
            countdownElement.innerHTML = 
                (hours < 10 ? "0" : "") + hours + " : " + 
                (minutes < 10 ? "0" : "") + minutes + " : " + 
                (seconds < 10 ? "0" : "") + seconds;

            // Jika waktu habis
            if (distance < 0) {
                clearInterval(countdownInterval); // Hentikan countdown
                countdownElement.innerHTML = "WAKTU HABIS";
                countdownElement.style.color = "#333"; // Ubah warna agar tidak terlalu mencolok
            }
        }, 1000); // Update setiap 1 detik
    }

 // --- LOGIKA UNTUK SISTEM TAB DI HALAMAN UTAMA ---
    // const tabs = document.querySelectorAll('.nav-tab');
    // const sections = document.querySelectorAll('.content-section');

    // if (tabs.length > 0 && sections.length > 0) {
    //     tabs.forEach(tab => {
    //         tab.addEventListener('click', function (event) {
    //             const targetId = this.dataset.target;

    //             tabs.forEach(t => t.classList.remove('active'));
    //             this.classList.add('active');

    //             sections.forEach(section => {
    //                 section.classList.remove('active');
    //                 if (section.id === targetId) {
    //                     section.classList.add('active');
    //                 }
    //             });
    //         });
    //     });
    // }

});

