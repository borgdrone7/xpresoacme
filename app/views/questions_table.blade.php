<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Questions
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Question
                            </th>
                            <th>
                                Type
                            </th>
                            <th>
                                Required
                            </th>
                            <th>
                                Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($d->questions as $q)
                        <tr>
                            <td>
                               {{ $q->id }}
                            </td>
                            <td>
                               {{ $q->question }}
                            </td>
                            <td>
                                {{ $q->questiontype->name }}
                            </td>
                            <td>
                                {{ $q->required ? "Yes":"no" }}
                            </td>
                            <td>
                                <a href="#" class="btn default btn-xs purple">
                                    <i class="fa fa-edit"></i> Edit </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>