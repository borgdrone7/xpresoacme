/**
 * Created by borgdrone7 on 10/18/14.
 */
/**
 * Created by borgdrone7 on 4/22/14.
 */
;
(function ($, window, document, undefined) {
    // Create the defaults once
    var pluginName = "AcmeMetaTable";
    var defaults = {
        table_id: "#metatable",
        addbutton_id: "#addmetavalue",
        metaval_id: "#metadatavalue",
        metaerror_id: "#metaerror",
        metaerrortext_id: "#metaerrortext",
        hiddenfield_id: "#metavals",
        datatable: null
    };
//constructor
    function AcmeMetaTable(element, options) {
        this.element = element;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
//prototype
    AcmeMetaTable.prototype = {
        init: function () {
            this.table = $(this.settings.table_id);
            this.addbutton = $(this.settings.addbutton_id);
            this.metaval = $(this.settings.metaval_id);
            this.metaerror = $(this.settings.metaerror_id);
            this.metaerrortext = $(this.settings.metaerrortext_id);
            this.hiddenfield=$(this.settings.hiddenfield_id);

            this.datatable = this.table.DataTable({
                "lengthMenu": false,
                "pageLength": 50,
                "columnDefs": [
                    { // set default column settings
                        'orderable': true,
                        'targets': [0]
                    }
                ],
                "order": [
                    [0, "asc"]
                ], // set first column as a default sort by asc
                "searching": false,
                "lengthChange": false
            });
            this.addbutton.on('click', $.proxy(this.add, this));
            var that=this;
            this.table.on('click', '.delete', function (e) { that.remove(that, this, e); });
            this.metaerror.hide();
            this.updatehidden();
            console.log(this._name + "(" + $(this.element).attr('id') + ") init complete");
        },
        add: function () {
            this.metaerror.hide();
            var valueToAdd=$.trim(this.metaval.val());
            //check if entered value is empty
            if(valueToAdd=="") {
                this.metaerrortext.text("Please enter a value.");
                this.metaerror.show();
                return;
            }
            var alreadyThere=0;
            //check if value is already inserted
            this.datatable
                .column( 0 )
                .data()
                .each( function ( value, index ) {
                    if(valueToAdd==value) {
                        alreadyThere=1;
                    }
                } );
            if(alreadyThere) {
                this.metaerrortext.text("Meta values must be unique."); //TODO: move up hardcoded messages (in options)
                this.metaerror.show();
                return;
            }

            //add the value
            this.datatable.row.add([this.metaval.val(), "<a class='delete' href='javascript:;'>Delete</a>"]).draw(); //TODO: move this hardcoded html in separate file and load this JS as view,
            //including this delete html code with @include
            //reset text input
            this.metaval.val('');
        },
        remove: function (pluginthis, deleteelement, e) {
            e.preventDefault();
            pluginthis.datatable.row( $(deleteelement).parents('tr') ).remove().draw();
        },
        updatehidden: function () {
            this.hiddenfield.val(JSON.stringify(this.datatable.column(0).data().toArray()));
        }

    };
// A really lightweight plugin wrapper around the constructor,
// preventing against multiple instantiations
    $.fn[ pluginName ] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new AcmeMetaTable(this, options));
            }
        });
// chain jQuery functions
        return this;
    };
})(jQuery, window, document);