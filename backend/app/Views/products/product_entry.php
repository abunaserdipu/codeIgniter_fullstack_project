<?php echo view("layouts/product_header.php") ?>
<?php echo view("layouts/sidebar.php") ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Entry Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Entry Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10 offset-1">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url('products/create') ?>">
                            <div class="card-body">
                                <?php
                                // if (isset($validation)) {
                                //     $errors = $validation->getErrors();
                                //     if (count($errors) > 0) {
                                //         foreach ($errors as $err) {
                                //             echo "<li>$err</li>";
                                //         }
                                //     }
                                // }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" name="product_name" value="<?php echo set_value('product_name') ?>">
                                    <span class="text-danger"><?php
                                                                if (isset($validation)) {
                                                                    $error = $validation->getError('product_name');
                                                                    print_r($error);
                                                                }
                                                                ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Details</label>
                                    <textarea class="form-control" id="summernote" placeholder="Enter Product Details" name="product_details"><?php echo set_value('product_details') ?></textarea>
                                    <span class="text-danger"><?php
                                                                if (isset($validation)) {
                                                                    $error = $validation->getError('product_details');
                                                                    print_r($error);
                                                                }
                                                                ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Price</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Product Price" name="product_price" value="<?php echo set_value('product_price') ?>">
                                    <span class="text-danger"><?php
                                                                if (isset($validation)) {
                                                                    $error = $validation->getError('product_price');
                                                                    print_r($error);
                                                                }
                                                                ?></span>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php echo view("layouts/product_footer.php") ?>