/**
 * Created by borgdrone7 on 10/17/14.
 */

var meta_table = function (table_id, add_button_id, meta_value_id) {

        var table = $('#'+table_id);
        var button = $('#'+add_button_id);
        var value = $('#'+meta_value_id);

        var datatable = table.DataTable({
            "lengthMenu": false,
            // set the initial value
            "pageLength": 50,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }],
            "order": [
                [0, "asc"]
            ], // set first column as a default sort by asc
            "searching":false,
            "lengthChange":false

        });

        button.on('click', function (e) {
            datatable.row.add([value.val(), "<a class='delete' href='javascript:;'>Delete</a>"]).draw();
            value.val('');
        });
        table.on('click', '.delete', function (e) {
            e.preventDefault();
            datatable.row( $(this).parents('tr') ).remove().draw();
        });
};