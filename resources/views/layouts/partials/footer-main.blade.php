<footer class="footer footer-main">
    <div class="container">
        <div class="footer-grid">
            <!-- Kolom 1: Tentang Ternakpark -->
            <div class="footer-col">
                <a href="{{ route('home') }}" class="footer-logo"><img src="{{ asset('images/lgtpft.png') }}" alt="Logo Ternak Park Wonosalam"></a>
                <!-- <p class="footer-about">Ternak Park Wonosalam adalah destinasi eduwisata keluarga yang memadukan pendidikan, rekreasi, dan keindahan alam khas Wonosalam.</p> -->
            </div>

            <!-- Kolom 2: Link Cepat -->
            <div class="footer-col">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="{{ route('home') }}#aktivitas">Aktivitas</a></li>
                    <li><a href="{{ route('home') }}#wahana">Wahana</a></li>
                    <li><a href="{{ route('home') }}#galeri">Galeri</a></li>
                    <li><a href="{{ route('tiket') }}">Harga Tiket</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Kontak Kami -->
            <div class="footer-col">
                <h4>Kontak Kami</h4>
                <p>Jl. Raya Wonosalam, Jombang<br>Jawa Timur, Indonesia</p>
                <p><strong>Telepon:</strong> +62 813-3678-9647</p>
                <p><strong>Email:</strong> sobat@ternakpark.com</p>
            </div>

            <!-- Kolom 4: Sosial Media -->
            <div class="footer-col">
                <h4>Ikuti Kami</h4>
                <div class="social-links">
                    <!-- Ikon Facebook -->
                    <a href="https://www.facebook.com/ternakpark.wonosalam" aria-label="Facebook" title="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                    </a>
                    <!-- Ikon Instagram -->
                    <a href="https://www.instagram.com/ternakpark.id?utm_source=ig_web_button_share_sheet&igsh=eG44cnBxMGVzZDNq" aria-label="Instagram" title="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <!-- Ikon TikTok -->
                    <a href="https://www.tiktok.com/@ternakpark.id?is_from_webapp=1&sender_device=pc" aria-label="TikTok" title="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-9-9v10a5 5 0 0 0 5 5v0a5 5 0 0 0 5-5V6"></path><path d="M11.5 16.5A5.5 5.5 0 1 0 6 11V3"></path></svg>
                    </a>
                    <!-- Ikon YouTube -->
                    <a href="https://youtube.com/@ternakpark?si=2vE_GYySav2zHl_E" aria-label="YouTube" title="YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17a24.12 24.12 0 0 1 0-10C2.5 6 7.5 4 12 4s9.5 2 9.5 3-2 3-2 3.5 1 4.5 0 5c-1 1-6 2-9.5 2s-8.5-1-9.5-2z"></path><path d="m9.5 12.5 5-2.5-5-2.5z"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>&copy; <span id="year-main"></span> Ternak Park Wonosalam. All Rights Reserved.</p>
    </div>
</footer>

<script>
    if(document.getElementById('year-main')) {
        document.getElementById('year-main').textContent = new Date().getFullYear();
    }
</script>
