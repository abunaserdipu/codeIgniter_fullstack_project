<?php echo view("layouts/product_header.php") ?>

<body>
    <div class="row">
        <?php foreach ($raw as $data) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="<?= $data->product_image ?>">
                    <div class="card-body">
                        <h3><?= $data->product_name ?></h3>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>