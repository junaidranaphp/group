function render_datatable(options) {
    var $el = $('#mytabless'),
            dataTable_options = options,
            no_sort = $el.attr('data-nosort');
    // Skip for custom dataTable
    if ($el.hasClass('dataTable-custom'))
        return;
    if ($el.hasClass('dataTable-column_filter')) {
        var types = $el.attr('data-column_filter_types'),
                position = $el.attr('data-column_filter_position'),
                dateformat = $el.attr('data-column_filter_dateformat');
        if (position !== 'bottom') {
            position = 'top'
        }

        if (types !== undefined) {
            types = types.split(',');
        } else {
            types = [];
        }

        if (dateformat === undefined) {
            dateformat = 'mm/dd/yy';
        }

        dataTable_options.initComplete = function () {
            var api = this.api(),
                    $filter_row = $('<tr class="dataTable-col_filter"></tr>'),
                    $table = $(this);
            // Add the filter to head or foot
            if (position == 'top') {
                if ($el.hasClass('dataTable-scroll-x')) {
                    $filter_row.appendTo($('.dataTables_scrollHead thead'));
                }else{
                    $filter_row.appendTo($table.find('thead'));
                }

            } else {
                if ($table.find('tfoot').length == 0) {
                    $('<tfoot></tfoot>').appendTo($table);
                }

                $filter_row.appendTo($table.find('tfoot'));
            }

            api.columns().indexes().flatten().each(function (i) {
                var column = api.column(i),
                        $filter_col = $('<th></th>').appendTo($filter_row);
                if (types[i] === 'select') {
                    var select = $('<select><option value=""></option></select>')
                            .appendTo($filter_col)
                            .on('change', function () {
                                var val = $(this).val();
                                column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                            });
                    column.data().unique().sort().each(function (d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                } else if (types[i] == 'daterange') {
                    var $from_date = $('<input type="text" class="dataTable-datepicker-from" name="dataTable-daterpicker-from" placeholder="From...">').appendTo($filter_col),
                            $to_date = $('<input type="text" class="dataTable-datepicker-to" name="dataTable-daterpicker-to" placeholder="To...">').appendTo($filter_col),
                            datepicker_options = {
                                dateFormat: dateformat
                            };
                    $from_date.datepicker(datepicker_options);
                    $to_date.datepicker(datepicker_options);
                    $.fn.dataTable.ext.search.push(
                            function (settings, data, dataIndex) {
                                var column_date = data[i],
                                        from_date = $from_date.val(),
                                        to_date = $to_date.val(),
                                        moment_dateformat = dateformat.toUpperCase(),
                                        column_moment_date = moment(column_date, moment_dateformat),
                                        from_moment_date = moment(from_date, moment_dateformat),
                                        to_moment_date = moment(to_date, moment_dateformat);
                                if (column_moment_date === false || from_moment_date === false || to_moment_date === false) {
                                    // we had invalid date
                                    return true;
                                }

                                if (from_date == '' && to_date == '') {
                                    return true;
                                } else {
                                    if (from_date == '' && to_date != '') {
                                        if (!column_moment_date.isBefore(to_moment_date)) {
                                            return false;
                                        }
                                    } else if (from_date != '' && to_date == '') {
                                        if (!column_moment_date.isAfter(from_moment_date)) {
                                            return false;
                                        }
                                    } else {
                                        var range = moment().range(from_moment_date, to_moment_date);
                                        if (!range.contains(column_moment_date)) {
                                            return false;
                                        }
                                    }
                                }

                                return true;
                            }
                    );
                    $from_date.change(function () {
                        api.draw();
                    });
                    $to_date.change(function () {
                        api.draw();
                    });
                } else if (types[i] !== 'null' || types[i] == 'text') {
                    var title = '',
                            input = $('<input type="text" placeholder="Search ' + title + '" />')
                            .appendTo($filter_col)
                            .on('keyup change', function () {
                                var val = $(this).val();
                                column
                                        .search(val)
                                        .draw();
                            });
                }
            });
        };
    }

    if (no_sort !== undefined) {
        var cols = no_sort.split(',').map(function (col_string) {
            return parseInt(col_string.trim());
        });
        dataTable_options.columnDefs = [
            {
                'orderable': false,
                'targets': cols
            }
        ];
        dataTable_options.order = [];
    }

    if ($el.attr("data-nosearch") !== undefined) {
        dataTable_options.filter = false;
    }
    if ($el.attr("data-nopagination") !== undefined) {
        dataTable_options.paging = false;
    }
    if ($el.attr("data-noinfo") !== undefined) {
        dataTable_options.info = false;
    }
    if ($el.attr("data-noorder") !== undefined) {
        dataTable_options.ordering = false;
    }

    if ($el.hasClass('dataTable-tools')) {
        dataTable_options.dom = 'T' + dataTable_options.dom;
        dataTable_options.tableTools = {
            "sSwfPath": "js/plugins/datatables/extensions/copy_csv_xls_pdf.swf"
        };
    }

    if ($el.hasClass('dataTable-colreorder')) {
        dataTable_options.dom = 'R' + dataTable_options.dom;
    }

    if ($el.hasClass('dataTable-colvis')) {
        dataTable_options.dom = 'C' + dataTable_options.dom;
        dataTable_options.colVis = {
            "buttonText": "Show/hide columns <i class='fa fa-angle-down'></i>",
            "iOverlayFade": 0
        };
    }

    if ($el.hasClass("dataTable-scroll-x")) {
        dataTable_options.scrollX = "100%";
        dataTable_options.scrollCollapse = true;
    }

    if ($el.hasClass("dataTable-scroll-y")) {
        dataTable_options.scrollY = "300px";
        dataTable_options.paginate = false;
        dataTable_options.scrollCollapse = true;
    }

    if ($el.hasClass("dataTable-scroller")) {
        var ajaxSource = $el.attr('data-ajax-source');
        if (ajaxSource !== '' && ajaxSource !== undefined) {
            if ($el.hasClass('dataTable-tools')) {
                dataTable_options.dom = 'Tfrtip';
            }

            dataTable_options.scrollY = "300px";
            dataTable_options.deferRender = true;
            dataTable_options.dom = dataTable_options.dom + 'S';
            dataTable_options.ajax = ajaxSource;
        }
    }

    var table = $el.DataTable(dataTable_options);
    if ($el.hasClass("dataTable-fixedcolumn")) {
        new $.fn.dataTable.FixedColumns(table);
    }

    $el.find('.dataTable-checkall').change(function () {
        var $checkbox = $(this),
                col_index = $checkbox.parent().index(),
                nodes;
        if ($el.attr('data-checkall') !== 'all') {
            nodes = table.column(col_index, {page: 'current'}).nodes().to$();
        } else {
            nodes = table.column(col_index, {page: 'all'}).nodes().to$();
        }
        nodes.find('input[type="checkbox"]').prop('checked', $checkbox.prop('checked'));
    });
}