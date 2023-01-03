<?php echo view("layouts/product_header.php") ?>
<?php echo view("layouts/sidebar.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                    <?php if (session()->has('msg')) : ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?= session()->msg; ?>
                        </div>


                    <?php endif; ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Student Name</th>
                                        <th>Student Details</th>
                                        <th>Admission fee</th>
                                        <th>image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['product_name'] ?>
                                            </td>
                                            <td><?= $product['product_details'] ?></td>
                                            <td><?= $product['product_price'] ?></td>
                                            <td><img width="100px" src="<?= site_url() . $product['product_image'] ?>" alt="product image"></td>
                                            <td><a href="products/delete/<?= $product['id'] ?>" class="delete"><i class="fa fa-trash" style="color:red;"></i></a>
                                                <a href="products/edit/<?= $product['id'] ?>"><i class="fa fa-edit" style="color:gold;"></i></a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php echo view("layouts/product_footer.php") ?>
<script>
    $(function() {
        $(".delete").click(function(e) {
            e.preventDefault();
            $.post(this.href, function() {
                alert('Successfully Deleted');
                location.reload();
            });
        });
    });
</script>