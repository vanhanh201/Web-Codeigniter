<div class="container">
  <div class="card">
    <div class="card-header">
      List order
    </div>
    <?php
    if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
    } elseif ($this->session->flashdata('error')) {
      echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
    }
    ?>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Order code</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order_details as $key => $ord) { ?>
            <tr>
              <th scope="row"> <?php echo $key ?></th>
              <td><?php echo $ord->order_code ?></td>
              <td><?php echo $ord->title ?></td>
              <td>
                <img src="<?php echo base_url('uploads/product/' . $ord->image) ?>" width="150" height="150">
              </td>
              <td><?php echo number_format($ord->price, 0, ',', '.') ?>VND</td>
              <td><?php echo $ord->qty ?></td>
              <td><?php echo number_format($ord->qty * $ord->price, 0, ',', '.') ?>VND</td>
            </tr>
          <?php } ?>
          <tr>
            <td>
              <select name="" id="" class="xulydonhang form-control">
                <?php
                if ($ord->order_status == 1) {
                  ?>
                  <option selected id="<?php echo $ord->order_code ?>" value="0">Xu ly don hang</option>
                  <option id="<?php echo $ord->order_code ?>" value="2">Da xu ly-Dang giao</option>
                  <option id="<?php echo $ord->order_code ?>" value="3">Huy don</option>
                  <?php
                } elseif ($ord->order_status == 2) {
                  ?>
                  <option id="<?php echo $ord->order_code ?>" value="0">Xu ly don hang</option>
                  <option selected id="<?php echo $ord->order_code ?>" value="2">Da xu ly-Dang giao</option>
                  <option id="<?php echo $ord->order_code ?>" value="3">Huy don</option>
                  <?php

                } else {
                  ?>
                  <option id="<?php echo $ord->order_code ?>" value="0">Xu ly don hang</option>
                  <option id="<?php echo $ord->order_code ?>" value="2">Da xu ly-Dang giao</option>
                  <option selected id="<?php echo $ord->order_code ?>" value="3">Huy don</option>
                  <?php
                }
                ?>
              </select>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>