<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{$title}}</h2>

                <h6>Filtrer par statut (complétées / non complétées)</h6>
                <form id="formTaskFiltrer" name="formTaskFiltrer">
                    <div class="row">
                        <div class="col-md-6">

                            <select name="status" class="form-control" id="status">
                                <option value="">Statuts</option>
                                <option>Complète</option>
                                <option>Non complète</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary font-weight-bold" id="filtre">Filtrer</button>

                        </div>

                    </div>

                </form>

                <div class="d-flex flex-row-reverse"><button class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewtask"><i class="fas fa-plus"></i>Ajouter tâche </button></div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tabletask">
                            <thead class="font-weight-bold text-center">
                                <tr>
                                    {{-- <th>No.</th> --}}
                                    <th>Titre</th>
                                    <th>description</th>
                                    <th>Statuts</th>
                                    <th style="width:90px;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- @foreach ($tasks as $task)
                                    <tr>
                                <td>{{$task->id}}</td>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->status}}</td>
                                <td>
                                    <div class="btn btn-warning edittask" title="Modifier Tache" data-id="{{$task->id}}">Edit</div>
                                    <div class="btn btn-danger deletetask" title="Supprimer" data-id="{{$task->id}}">Delete</div>
                                    <div class="btn btn-success copletedTask" title="Modifier Statut" data-id="{{$task->id}}">Edit</div>

                                </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="modal-task" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Tâche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formTask" name="formTask">
                    <div class="form-group">

                        <input type="text" name="title" class="form-control" id="title" placeholder="Titre"><br>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Description"><br>
                        <!-- <select name="status" class="form-control" id="status">
                            <option value="-">Statuts</option>
                            <option>Complète</option>
                            <option>Non complète</option>
                        </select><br> -->
                        <input type="hidden" name="task_id" id="task_id" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>



@push('scripts')
<script>
    $('document').ready(function() {
        // success alert
        function swal_success() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Les changements ont été enregistrés',
                showConfirmButton: false,
                timer: 10000000
            })
        }
        // error alert
        function swal_error() {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Something goes wrong !',
                showConfirmButton: true,
            })
        }    // Initialize "Filter" button
        $('#filtre').click(function() {
            table.draw();
        });

        // table serverside
        var table = $('#tabletask').DataTable({
            processing: false,
            serverSide: true,
            ordering: false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            ajax: {
                url: "{{ route('tasks.index') }}",
                data: function (d) {
                    d.status = $('#status').val(); // Pass the selected status value as a parameter
                }
            },
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {
                        if (data === 'Non complète') {
                            return '<span class=" btn-outline-danger">' + data + '</span>';
                        } else {
                            return '<span class=" btn-outline-success">' + data + '</span>';
                        }
                    }
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // initialize btn add
        $('#createNewtask').click(function() {
            $('#saveBtn').val("create task");
            $('#task_id').val('');
            $('#formtask').trigger("reset");
            $('#modal-task').modal('show');
        });
        // initialize btn edit
        $('body').on('click', '.edittask', function() {
            var id = $(this).data('id');
            $.get("{{route('tasks.index')}}" + '/' + id + '/edit', function(data) {
                $('#saveBtn').val("edit-task");
                $('#modal-task').modal('show');
                $('#task_id').val(data.id);
                $('#title').val(data.title);
                $('#description').val(data.description);
                $('#status').val(data.status);

            })
        });


        // initialize btn save
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Save');

            var formData = {
                title: $('#title').val(),
                description: $('#description').val(),
                status: $('#status').val(),
                task_id: $('#task_id').val(),

            };

            $.ajax({
                data: formData,
                url: "{{ route('tasks.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('#formTask')[0].reset();
                    $('#modal-task').modal('hide');
                    swal_success();
                    table.draw();
                },
                error: function(data) {
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });




        });
        // initialize btn delete
        $('body').on('click', '.deletetask', function() {
            var task_id = $(this).data("id");

            Swal.fire({
                title: 'Êtes-vous sûr(e)',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, veuillez le supprimer',
                cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('tasks.store')}}" + '/' + task_id,
                        success: function(data) {
                            swal_success();
                            table.draw();
                        },
                        error: function(data) {
                            swal_error();
                        }
                    });
                }
            })
        });






        // initialize btn Completed
        $('body').on('click', '.copletedTask', function() {
            var task_id = $(this).data("id");

            Swal.fire({
                title: 'Êtes-vous sûr(e)',
                text: "",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, marquer comme complète',
                cancelButtonText: 'Annuler',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "PUT",
                        url: "{{route('tasks.store')}}" + '/' + task_id,
                        success: function(data) {
                            swal_success();
                            table.draw();
                        },
                        error: function(data) {
                            swal_error();
                        }
                    });
                }
            })
        });

        // statusing


    });

</script>
@endpush