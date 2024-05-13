<div class="container">
  <div class="card">
    <div class="card-header">
      Edit product
    </div>
    <div class="card-body">
      <a href="<?php echo base_url('product/list') ?>" class="btn btn-primary">List product</a>
      <a href="<?php echo base_url('product/create') ?>" class="btn btn-primary">Add product</a>
      <?php
      if ($this->session->flashdata('success')) {
        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
      } elseif ($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
      }
      ?>
      <form action="<?php echo base_url('product/update/' . $product->id) ?>" method="POST"
        enctype="multipart/form-data">
        <!-- enctype="multipart/form-data": chia nho anh upload server -->
        <div class=" mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <?php echo '<span class="text text-danger">' . form_error('title') . '</span>'; ?>
        </div>
        <div class=" mb-3">
          <label for="exampleInputEmail1" class="form-label">Price</label>
          <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <?php echo '<span class="text text-danger">' . form_error('price') . '</span>'; ?>
        </div>
        <div class=" mb-3">
          <label for="exampleInputEmail1" class="form-label">Quantity</label>
          <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>'; ?>
        </div>
        <div class=" mb-3">
          <label for="exampleInputEmail1" class="form-label">Slug</label>
          <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <?php echo '<span class="text text-danger">' . form_error('slug') . '</span>'; ?>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Description</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1">
          <?php echo '<span class="text text-danger">' . form_error('description') . '</span>'; ?>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Image</label>
          <input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
          <img src="<?php echo base_url('uploads/product/' . $product->image) ?>" width="150" height="150">
          <small><?php if (isset($error)) {
            echo $error;
          } ?></small>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label for="exampleFormControlSelect1" class="form-label">Category</label>
            <select class="form-control" name="category_id" id="exampleFormControlSelect1">
              <?php foreach ($category as $key => $cate) { ?>
                <option <?php echo $cate->id == $product->category_id ? 'selected' : '' ?> value="<?php echo $cate->id ?>">
                  <?php echo $cate->title ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label for="exampleFormControlSelect1" class="form-label">Brand</label>
            <select class="form-control" name="brand_id" id="exampleFormControlSelect1">
              <?php foreach ($brand as $key => $bra) { ?>
                <option <?php echo $bra->id == $product->brand_id ? 'selected' : '' ?> value="<?php echo $bra->id ?>">
                  <?php echo $bra->title ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label for="exampleFormControlSelect1" class="form-label">Status</label>
            <select class="form-control" name="status" id="exampleFormControlSelect1">
              <?php if ($product->status == 1) {
                ?>
                <option selected value="1">Active</option>
                <option value="0">Inactive</option>
                <?php
              } else {
                ?>
                <option value="1">Active</option>
                <option selected value="0">Inactive</option>
                <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>