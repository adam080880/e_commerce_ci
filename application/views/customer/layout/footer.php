    

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