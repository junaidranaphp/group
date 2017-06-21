$(document).ready(function () {
    var main_cart_products = [];
    my_options = {
        dom: 'lfrtip',
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + 'products/records',
            "type": "POST",
            "data": function (d) {
                if (product_group_filter) {
                    d.wherefield = product_group_filter;
                }
            }
        },
        //"scrollX" : true,
        "order": [[0, "desc"]],
        "stateSave": true,
        "createdRow": function (row, data, index) {
            dt_product_id = data[data.length - 1];
            $(row).addClass('dt-product-' + dt_product_id);
            if (mark_selected(dt_product_id)) {
                $(row).addClass('success');
            }
        },
        "aoColumns": [
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"searchable": false, orderable: false, targets: -1},
        ],
        "columnDefs": [
            {
                "render": function (data) {
                    return '<button data-id="' + data + '" class="btn btn-xs btn-default detail"><span class="fa fa-th-list"></span></button>';
                },
                "targets": 10
            }
        ],
        scrollCollapse: true,
        "fixedColumns":   {
            leftColumns: 0,
            rightColumns: 1
        }
    };
    // this function is present in myscripts.js file . renders advanced datatables with serverside processing
    render_datatable(my_options);

    function check_cart(product_id) {
        var quantity = 1;

        for (var key in main_cart_products) {
            product = main_cart_products[key];
            if (product_id == product.id) {
                quantity = product.qty;
            }
        }
        return quantity;
    }

    function mark_selected(dt_product_id) {
        var product_match = false;
        for (var key in main_cart_products) {
            product = main_cart_products[key];

            if (dt_product_id == product.id) {
                product_match = true;
            }
        }
        return product_match;
    }

    function mark_products_by_cart(cart_product) {

        if (!$('.dt-product-' + cart_product.id).hasClass('success')) {
            $('.dt-product-' + cart_product.id).addClass('success');
        }

    }

    function render_product(product) {
        var product_html = '';
        product_html += '<tr>';
        product_html += '<td>' + product.name + '</td>';
        product_html += '<td>' + product.qty + '</td>';
        product_html += '</tr>';
        return product_html;
    }

    function get_cart(response) {
        if (response.type == 'success') {
            var products = response.products;
            main_cart_products = products;
            var products_html = '';
            var empty_cart = true;
            for (var key in products) {
                empty_cart = false;
                product = products[key];
                mark_products_by_cart(product);
                products_html += render_product(product);
            }
            var total = response.total;

            var cart_html = '';
            if (empty_cart == true) {
                cart_html += '<h4 class="text-danger">Your cart is empty</h4>';
            } else {
                cart_html += '<table class="table table-bordered table-condensed my-table" >';
                cart_html += '<thead>';
                cart_html += '<tr>';
                cart_html += '<th>Code</th>';
                cart_html += '<th>Qty</th>';
                cart_html += '</tr>';
                cart_html += '</thead>';
                cart_html += '<tfoot>';
                cart_html += '<tr>';
                cart_html += '<td>Total</td>';
                cart_html += '<td>' + total + '</td>';
                cart_html += '</tr>';
                cart_html += '<tr>';
                cart_html += '<td><a class="btn btn-success" href="' + base_url + 'products/checkout">CheckOut</a></td>';
                cart_html += '<td><a class="btn btn-danger" href="' + base_url + 'products/destroy">Clear</a></td>';
                cart_html += '</tr>';
                cart_html += '</tfoot>';
                cart_html += '<tbody>';
                cart_html += products_html;
                cart_html += '</tbody>';
                cart_html += '</table>';
            }
            $('#cart-wrapper').html(cart_html);
        }
    }
    $(document).on('click', '.detail', function () {
        id = $(this).attr('data-id');
        $.ajax({
            url: base_url + "products/get_product/" + id,
            type: "GET",
            // async: false,
            dataType: "json",
            success: function (data) {
                var qty = check_cart(id);
                var subtotal = qty * data.CCT_Price_FOB_2004_Rounded;
                $('#modal-1').modal(true);
                $('#code').html(data.Code);
                $('#prod_grp').html(data.Prod_Grp);
                $('#rim').html(data.Rim);
                $('#ptrn_family').html(data.Pattern_Family);
                $('#type').html(data.Type);
                $('#tt').html(data.Tubed_Tubeless);
                $('#stock').html(data.Stock);
                $('#source').html(data.Source);
                $('#size').html(data.Size);
                $('#Brand').html(data.Brand);
                $('#net_price').html(data.Net_Price);
                $('#Price_FOB').html(data.CCT_Price_FOB_2004_Rounded);
                $('#confirm-item-btn').attr('data-id', id);
                $('#quantity-input').val(qty)
                $('#quantity-input').attr('data-price', data.CCT_Price_FOB_2004_Rounded);
                $('#subtotal').html(subtotal);

            }
        });
    });
    $('#confirm-item-btn').click(function () {
        var product_id = $(this).attr('data-id');

        var quantity = $('#quantity-input').val();
        jQuery.ajax({
            url: base_url + 'products_ajax/add_product/',
            type: "POST",
            data: {'product_id': product_id, 'quantity': quantity},
            dataType: 'json',
            success: get_cart
        });
    });

    jQuery.ajax({
        url: base_url + 'products_ajax/get_cart/',
        type: "GET",
        dataType: 'json',
        success: get_cart
    });
    $('#quantity-input').keyup(function () {
        var qty = parseInt($(this).val());
        var net_price = $(this).attr('data-price');
        if ($.isNumeric(qty)) {
            var subtotal = qty * net_price;
            $('#subtotal').html(subtotal);
        }
    });

});