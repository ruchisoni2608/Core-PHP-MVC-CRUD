
    <div class="container">
        <h1 style="text-align:center;">Edit Product</h1>
        <form method="post" action="index.php?action=update&id=<?= $product['id'] ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required><br>
            <label for="price">Price:</label>
            <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" step="0.01" required><br>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
