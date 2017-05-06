$(document).ready(function () {
    my_options = {
        dom: 'lfrtip',
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": base_url + 'admin/clients/records',
            "type": "POST"
            
        },
        "order": [[1, "desc"]],
        stateSave: true,
        "aoColumns": [
            {"searchable": false, orderable: false},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
            {"orderSequence": ["desc", "asc"]},
        ],
        "columnDefs": [
            {
                "render": function (data , type , row) {
                    button_group = '<div class="action-group">';
                    button_group += '<a href="'+base_url+'admin/clients/edit_client/'+row[0]+'" class="btn btn-xs btn-default edit"><span class="fa fa-edit"></span></a>';
                    button_group += '<a href="'+base_url+'admin/clients/delete_client/'+row[0]+'" class="btn btn-xs btn-default delete"><span class="fa fa-trash"></span></a>';
                    button_group += '</div>';
                    return button_group;
                },
               
       
                "targets": 0
            }
            
        ]

    };
    // this function is present in myscripts.js file . renders advanced datatables with serverside processing
    render_datatable(my_options);
});
