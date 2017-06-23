<div class = "row">
    <div class = "col-sm-12">
        <div class = "box box-color box-bordered">
            <div class = "box-title">
                <h3><?php echo LTEXT('Cart') ?></h3>
            </div>
            <div class = "box-content nopadding">
                <div id="cart-wrapper2"></div>
                <div class="form-group text-center">
                    <a  class="btn btn-success" href="<?php echo base_url('products/insert_order') ?>" >Confirm Order</a>
                    <a  class="btn btn-danger" href="<?php echo base_url('products/destroy') ?>" >Reset</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('products/products_detail_modal');





