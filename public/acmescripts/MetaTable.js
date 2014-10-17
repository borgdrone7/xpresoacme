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
            var metaerror=$("#metaerror");
            metaerror.hide();
            var valueToAdd=$.trim(value.val());
            //check if entered value is empty
            if(valueToAdd=="") {
                $("#metaerrortext").text("Please enter a value.");
                metaerror.show();
                return;
            }
            var alreadyThere=0;
            //check if value is already inserted
            datatable
                .column( 0 )
                .data()
                .each( function ( value, index ) {
                    if(valueToAdd==value) {
                        alreadyThere=1;
                    }
                } );
            if(alreadyThere) {
                $("#metaerrortext").text("Meta values must be unique.");
                metaerror.show();
                return;
            }

            //add the value
            datatable.row.add([value.val(), "<a class='delete' href='javascript:;'>Delete</a>"]).draw(); //TODO: move this hardcoded html in separate file and load this JS as view,
                                                                                                         //including this delete html code with @include
            //reset text input
            value.val('');
        });
        table.on('click', '.delete', function (e) {
            e.preventDefault();
            datatable.row( $(this).parents('tr') ).remove().draw();
        });
};