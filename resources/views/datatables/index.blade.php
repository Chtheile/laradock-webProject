@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Datatables</div>
                    <div id="settings" class="panel-body">
                        <table class="table table-striped " width="100%" cellspacing="0" id="users-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>

                    </div>

                    <div class="modal-body">


                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">


                            <div class="form-group">

                                <label for="title">Title:</label>

                                <input type="text" name="title" class="form-control" v-model="fillItem.title" />

                                <span v-if="formErrorsUpdate['title']" class="error text-danger">@{{ formErrorsUpdate['title'] }}</span>

                            </div>


                            <div class="form-group">

                                <label for="title">Description:</label>

                                <textarea name="description" class="form-control" v-model="fillItem.description"></textarea>

                                <span v-if="formErrorsUpdate['description']" class="error text-danger">@{{ formErrorsUpdate['description'] }}</span>

                            </div>


                            <div class="form-group">

                                <button type="submit" class="btn btn-success">Submit</button>

                            </div>


                        </form>


                    </div>

                </div>

            </div>

        </div>
    </div>
@stop

@push('scripts')
<script>
    $(function() {
        $('#users-table').DataTable({
            processing: false,
            serverSide: false,
            paging: false,

            ajax: '{!! url('datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'username',username: 'username'},
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });

    console.log("test");
</script>
@endpush