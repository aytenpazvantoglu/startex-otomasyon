</div> <!-- .container bitişi (üstteki container'ı burada kapatıyoruz) -->

<footer class="text-center py-4 text-muted border-top bg-white mt-auto">
    &copy; 2026 Startex - Bilgisayar Programcılığı Projesi
</footer>

<!-- Bootstrap JS (Bazı hareketli özellikler için lazım olabilir) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Alert mesajı varsa 3 saniye sonra otomatik kapat -->
<script>
    setTimeout(function() {
        let alertNode = document.querySelector('.alert:not(.alert-danger)');
        if(alertNode) {
            let bsAlert = new bootstrap.Alert(alertNode);
            bsAlert.close();
        }
    }, 3000);
</script>

</body>
</html>

