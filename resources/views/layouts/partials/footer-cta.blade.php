<footer class="footer footer-cta">
    <div class="container footer-content">
        <h3>Tertarik dengan Aktivitas Ini?</h3>
        <p>Jangan lewatkan kesempatan untuk merasakannya langsung! Pesan tiket Anda sekarang juga.</p>
        <a href="{{ route('tiket') }}" class="hero-cta" style="margin-top:20px;">Lihat Pilihan Tiket</a>
    </div>
    <div class="footer-copyright">
        <p>&copy; <span id="year-cta"></span> Ternak Park Wonosalam, Kabupaten Jombang, Jawa Timur.</p>
    </div>
</footer>

<script>
    if(document.getElementById('year-cta')) {
        document.getElementById('year-cta').textContent = new Date().getFullYear();
    }
</script>
