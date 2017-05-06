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
    };
    // this function is present in myscripts.js file . renders advanced datatables with serverside processing
    render_datatable(my_options);
});