<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box red">
<div class="portlet-title">
    <div class="caption">
        <i class="fa fa-edit"></i>Add meta data
    </div>
    <div class="tools">
        <a href="javascript:;" class="collapse">
        </a>
    </div>
</div>
<div class="portlet-body">
    <div class="input-group">
        <div class="input-icon">
            <i class="fa fa-lock fa-fw"></i>
            {{ Form::text('metadatavalue', '', array('class' => 'form-control', 'id'=>'metadatavalue')) }}
        </div>
        <span class="input-group-btn">
        <button id="addmetavalue" class="btn btn-success" type="button"><i class="fa fa-arrow-left fa-fw"></i> Add value</button>
        </span>
    </div>
    <table class="table table-striped table-hover table-bordered" id="metatable">
        <thead>
        <tr>
            <th>
                Value
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
