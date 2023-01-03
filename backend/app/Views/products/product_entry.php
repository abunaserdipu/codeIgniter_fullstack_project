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
    <?php if (session()->has('errors')) {
        $errors = session()->errors;
    } ?>
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
                        <form method="post" action="<?= base_url('products/create') ?>" enctype="multipart/form-data">
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
                                    <label for="exampleInputEmail1">Student Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Name" name="product_name" value="<?php echo old('product_name') ?>">
                                    <span class="text-danger"><?=
                                                                isset($errors['product_name']) ? $errors['product_name'] : '';
                                                                ?></span>
                                </div>
                                <div class="form-group">
                                    <label>Student Category</label>
                                    <select name="category_name" class="form-control" id="">
                                        <option value="" selected>Select one</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= $category['category_name']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Student Details</label>
                                    <textarea class="form-control" id="summernote" placeholder="Enter Product Details" name="product_details"><?php echo old('product_details') ?></textarea>
                                    <span class="text-danger"><?=
                                                                isset($errors['product_details']) ? $errors['product_details'] : '';
                                                                ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Admission fees</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Admission fees" name="product_price" value="<?php echo old('product_price') ?>">
                                    <span class="text-danger"><?=
                                                                isset($errors['product_price']) ? $errors['product_price'] : '';
                                                                ?></span>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Student Image</label>
                                        <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Enter Student Image" name="product_image" value="<?php echo old('product_image') ?>">
                                        <span class="text-danger"><?=
                                                                    isset($errors['product_image']) ? $errors['product_image'] : '';
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