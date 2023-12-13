

<div class="container">
    <h1 style="text-align:center;">Product List</h1>

    <button onclick="location.href='views/products/create.php'" type="button" class="pull-right btn btn-primary"> 
    Add Product</button>

    <table id="product-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td>
                        <a href="index.php?action=update&id=<?= $product['id'] ?>" class="btn btn-info">Edit</a>
                        <a href="index.php?action=delete&id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
    $('#product-table').DataTable();
});
</script>

<?php include 'views/layouts/footer.php'; ?>
