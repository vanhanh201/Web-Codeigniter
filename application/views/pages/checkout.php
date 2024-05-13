<section id="cart_items">
  <div class="container">
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shopping Cart</li>
      </ol>
    </div>
    <div class="table-responsive cart_info">
      <?php
      if ($this->cart->contents()) {
        ?>
        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="description">Image</td>
              <td class="image">Item</td>
              <td class="price">Price</td>
              <td class="quantity">Quantity</td>
              <td class="total">Total</td>
              <td></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $subtotal = 0;
            $total = 0;
            foreach ($this->cart->contents() as $items) {
              $subtotal = $items['qty'] * $items['price'];
              $total += $subtotal;
              ?>
              <tr>
                <td class="cart_product">
                  <a href=""><img src="<?php echo base_url('uploads/product/' . $items['options']['image']) ?>" width="150"
                      height="150" alt="<?php echo $items['name'] ?>"></a>
                </td>
                <td class="cart_description">
                  <h4><a href=""><?php echo $items['name'] ?></a></h4>
                </td>
                <td class="cart_price">
                  <p><?php echo number_format($items['price'], 0, ',', '.') ?> VND</p>
                </td>
                <td class="cart_quantity">
                  <form action="<?php echo base_url('update-cart-item') ?>" method="POST">
                    <div class="cart_quantity_button">
                      <input type="hidden" name="rowid" value="<?php echo $items['rowid'] ?>">

                      <input class="cart_quantity_input" type="number" min="1" name="quantity"
                        value="<?php echo $items['qty'] ?>" autocomplete="off" size="2">

                      <input type="submit" value="Update" name="capnhat" class="btn btn-primary">
                    </div>
                  </form>
                </td>
                <td class="cart_total">
                  <p class="cart_total_price"><?php echo number_format($subtotal, 0, ',', '.') ?> VND</p>
                </td>
                <!-- <td class="cart_delete">
                  <a class="cart_quantity_delete" href="<?php echo base_url('delete-item-cart/' . $items['rowid']) ?>"><i
                      class="fa fa-times"></i></a>
                </td> -->
              </tr>
            <?php } ?>
            <tr>
              <td colspan="5">Total
                <p class="cart_total_price"><?php echo number_format($total, 0, ',', '.') ?> VND</p>
              </td>
              <td>
                <!-- <a href="<?php echo base_url('checkout') ?>" class="btn btn-success">Order</a> -->
              </td>
            </tr>
          </tbody>
        </table>
      <?php } else {
        echo '<span class="text text-danger">add product</span>';
      } ?>
    </div>

    <section><!--form-->
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-form">
              <?php
              if ($this->session->flashdata('success')) {
                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
              } elseif ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
              }
              ?>
              <h2>Điền thông tin thanh toán</h2>
              <form action="<?php echo base_url('confirm-checkout') ?>" method="POST">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" placeholder="Name" />
                <?php echo form_error('name'); ?>
                <label for="" class="form-label">Address</label>
                <input type="text" name="address" placeholder="Address" />
                <?php echo form_error('address'); ?>
                <label for="" class="form-label">Phone</label>
                <input type="text" name="phone" placeholder="Phone" />
                <?php echo form_error('phone'); ?>
                <label for="" class="form-label">Email Address</label>
                <input type="email" name="email" placeholder="Email Address" />
                <?php echo form_error('email'); ?>
                <label for="" class="form-label">Hinh thuc thanh toan</label>
                <select name="shipping_method" id="">
                  <option value="cod">COD</option>
                  <option value="momo">MOMO</option>
                </select>
                <button type="submit" class="btn btn-default">Xac Nhan</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section><!--/form-->
  </div>
</section> <!--/#cart_items-->