<div class = "row">
    <div class = "col-sm-12">
        <div class = "box box-color box-bordered">
            <div class = "box-title">
                <h3>
                    <?php echo LTEXT('Cart') ?></h3>
            </div>

            <div class = "box-content nopadding">
                <?php if ($this->cart->total_items() > 0) { ?>
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>item-name</th>
                                <th>item-price</th>
                                <th>item-qty</th>
                                <th>subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($this->cart->contents() as $item) { ?>
                                <tr>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['price'] ?></td>
                                    <td><?php echo $item['qty'] ?></td>
                                    <td><?php echo $item['subtotal'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <div class="text text-center">
                        <h3> Grand Total :  <?php echo $this->cart->total(); ?></h3>
                        <a  class="btn btn-success" href="<?php echo base_url('products/insert_order') ?>" >Confirm Order</a>
                        <a  class="btn btn-danger" href="<?php echo base_url('products/destroy') ?>" >Reset</a>
                    </div>
                </div>
                <?php
            } else {
                echo 'No Items in the cart';
            }
            ?>

        </div>
    </div>
</div>
</div>





