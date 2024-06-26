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
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Manage</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $key => $ord) { ?>
            <tr>
              <th scope="row"> <?php echo $key ?></th>
              <td><?php echo $ord->order_code ?></td>
              <td><?php echo $ord->name ?></td>
              <td><?php echo $ord->phone ?></td>
              <td><?php echo $ord->address ?></td>
              <td>
                <?php if ($ord->status == 1) {
                  echo '<span class="text text-primary">Dang cho xu ly</span>';
                } elseif ($ord->status == 2) {
                  echo '<span class="text text-primary">Da giao hang</span>';
                } else {
                  echo '<span class="text text-primary">Da huy</span>';
                } ?>
              </td>
              <td>
                <a onclick="return confrim('U delete?')" class="btn btn-danger"
                  href="<?php echo base_url('order/delete/' . $ord->order_code); ?>">Delete</a>
                <a class="btn btn-warning" href="<?php echo base_url('order/view/' . $ord->order_code); ?>">View</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>