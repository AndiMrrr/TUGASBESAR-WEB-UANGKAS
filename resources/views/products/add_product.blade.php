<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Input Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="mb-4 text-center">Form Input Product</h2>
      <form action="" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Product Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter product description" required></textarea>
        </div>

        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="number" class="form-control" name="price" id="price" placeholder="Enter product price" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Save Product</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
