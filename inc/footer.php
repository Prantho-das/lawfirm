<h3 class="text-light text-center mt-3">
    <script>
        setInterval(() => {
            let clock = new Date().toLocaleTimeString();
            document.querySelector('.clock').innerHTML = "@"+" "+clock;
        }, 1000);
    </script>
    <span class="d-sm-inline d-none clock">

    </span> Powered by DIU E-60</h3>
</div>
<!-- Optional JavaScript -->
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>