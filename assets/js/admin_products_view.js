$(document).ready(function () {
    my_options = {
        dom: 'lfrtip',
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + 'admin/products/records',
            "type": "POST",
            
        },
        "order": [[0, "desc"]],
        stateSave: true,
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