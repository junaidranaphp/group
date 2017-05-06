$(document).ready(function () {
    my_options = {
        dom: 'lfrtip',
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + 'admin/clients/records',
            "type": "POST"
            
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
            {"searchable": false, orderable: false, targets: -1},
        ],
        "columnDefs": [
            {
                "render": function (data , type , row) {
                    return '<button data-id="' + row[0] + '" class="btn btn-xs btn-default edit">Edit</button>';
                },
               
       
                "targets": 6
            }
        ]

    };
    // this function is present in myscripts.js file . renders advanced datatables with serverside processing
    render_datatable(my_options);

    $(document).on('click', '.edit', function () {
        id = $(this).attr('data-id');
        $.ajax({
            url: base_url + "admin/clients/edit_client/" + id,
            type: "GET",
           //async: false,
            dataType: "json",

        });
    });
});
