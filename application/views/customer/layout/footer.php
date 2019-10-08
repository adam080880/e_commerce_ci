<div class="container-fluid bg-dark mt-5 shadow-sm text-white footer">
        <div class="container p-3">
            <div class="row pt-4">
                <div class="col-lg-3 pt-3 text-right bw-20-white-left mb-4">
                    <h1 href="" style="font-family: 'Oswald'; letter-spacing:0px; font-weight:600;">Uncomfortable.</h1>
                </div>
                <div class="col-lg-6 mb-4">
                    <p class="head mb-2">About Us</p>                   
                    <p class="text-white">
                        Kami datang untuk membuat anda tidak nyaman. Kamu harus beli sandang di sini jika kamu adalah orang yang penuh dengan kenyamanan
                    </p>
                </div>
            </div>
            <div class="row pt-4 pb-4">
                <div class="col-lg-9">
                    <p class="head mb-2">Bussiness Partner</p>
                    

                </div>
                <div class="col-lg-3 ml-auto text-right">
                    <p class="head mb-2 text-right">Contact Us</p>                    
                    <p>
                        <div class="row mb-1">
                            <div class="col-10 pl-0 pr-0"><a href="" class="text-white opwh-1">Muhamad Adam</a></div>
                            <div class="col-1 pl-0 ml-auto"><i class="fab fa-facebook" style="font-size:25px"></i></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-10 pl-0 pr-0"><a href="https://api.whatsapp.com/send?phone=6285697324684&text=Saya%20ingin%20merasa%20tidak%20nyaman" class="text-white opwh-1">+62 856 9732 4684</a></div>
                            <div class="col-1 pl-0 ml-auto"><i class="fab fa-whatsapp" style="font-size:25px"></i></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-10 pl-0 pr-0"><a href="https://www.instagram.com/muhamadadam404/?hl=id" class="text-white opwh-1">@muhamadadam404</a></div>
                            <div class="col-1 pl-0 ml-auto"><i class="fab fa-instagram" style="font-size:25px"></i></div>
                        </div>
                    </p>
                </div>
            </div>

            <div class="row">

            </div>
        </div>
    </div>

    <script src="<?= base_url() ?>assets/plugins/grabScrolling.js"></script>
    <script src="<?= base_url() ?>assets/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

    <?php if (isset($java)) : ?>
        <?php foreach ($java as $j) : ?>
            <script src="<?= $j ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>