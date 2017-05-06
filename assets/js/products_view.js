$(document).ready(function () {
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
                    return '<button data-id="' + data + '" class="btn btn-xs btn-default fa fa-more detail"></button>';
                },
                "targets": 10
            }
        ]
    };
    // this function is present in myscripts.js file . renders advanced datatables with serverside processing
    render_datatable(my_options);

    $(document).on('click', '.detail', function () {
        id = $(this).attr('data-id');
        $.ajax({
            url: base_url + "products/get_product/"+id,
            type: "GET",
            // async: false,
            dataType: "json",
            success: function (data) {
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
                
                
            }
        });
    });
});