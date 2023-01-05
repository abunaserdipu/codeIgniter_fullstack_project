<!doctype html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<head>
    <title>{page_title}</title>
</head>

<body>
    <!-- all parts that will visible in every page that will be included in default-->
    <?= $this->include('view_layouts/header') ?>

    <?= $this->renderSection('content') ?>


    <?= $this->include('view_layouts/footer') ?>



</body>

</html>