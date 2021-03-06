<div id="modal-1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>
            <!-- /.modal-header -->
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-center">Tire Code : <span id="code"></span></th>
                        </tr>
                        <tr>
                            <td>Prod_Grp : <span id="prod_grp"></span></td>
                            <td>Size : <span id="size"></span></td>
                        </tr>

                        <tr>
                            <td>Rim : <span id="rim"></span></td>
                            <td>Brand : <span id="Brand"></span></td>
                        </tr>

                        <tr>
                            <td>Source : <span id="source"></span></td>
                            <td>Type : <span id="type"></span></td>
                        </tr>

                        <tr>
                            <td>Tubed/Tubeless : <span id="tt"></span></td>
                            <td>Net_price : <span id="net_price"></span></td>
                        </tr>
                        <tr>
                            <td>Ptrn_Family : <span id="ptrn_family"></span></td>
                            <td>Price_FOB : <span id="Price_FOB"></span></td>
                        </tr>
                        <tr>
                            <td>
                                Quantity
                                <input class="form-control" id="quantity-input"></td>
                            <td>
                                Sub total 
                                <div>
                                    <strong class="text-danger" id="subtotal"></strong>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <!--<h4 id="Code"></h4>
                <h4 id="prod_grp"></h4>
                <h4 id="rim"></h4>
                <h3 id="ptrn_family"></h3>
                <h3 id="type"></h3>
                <h3 id="tt"></h3>
                <h3 id="stock"></h3>
                <h3 id="source"></h3>
                <h3 id="net_price"></h3>-->
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="confirm-item-btn" data-id="" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <!-- /.modal-footer -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>