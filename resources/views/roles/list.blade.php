@extends('layouts.app')
@section('content')
@section('content')
<div class="container-fluid">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1>Role</h1>
            </div>
            <div class="col-sm-12">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Role</a></li>
               </ol>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Role List</h3>
                     <div class="float-right"> <a class="btn btn-block btn-sm btn-success"
                        href="{{ route('roles.create') }}"> Create New Role</a></div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body ">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                           <thead>
                              <tr>
                                 <th scope="col">Id</th>
                                 <th scope="col">Name</th>
                                 <th scope="col">Description</th>
                                 <th scope="col">Active</th>
                                 <th scope="col">Action</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                     @push('child-scripts')
                     <script>
                        $(function() {
                            $('#table').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: '{{ route('roles.index') }}',
                                columns: [{
                                        data: 'id',
                                        name: 'id'
                                    },
                                    {
                                        data: 'name',
                                        name: 'name'
                                    },
                                    {
                                        data: 'description',
                                        name: 'description'
                                    },
                                    {
                                        data: 'is_active', // Add the 'is_active' column
                                        name: 'is_active', // Name it 'is_active'
                                        render: function(data, type, full, meta) {
                                            if (data === 1) {
                                                return '<i class="fas fa-toggle-on text-primary"></i>';
                                            } else {
                                                return '<i class="fas fa-toggle-on text-secondary"></i>';
                                            }
                                        }
                                    },
                                    {
                                        data: 'id',
                                        name: 'actions',
                                        orderable: false,
                                        searchable: false,
                                        render: function(data, type, full, meta) {
                                            var editUrl = '{{ route('roles.edit', ':id') }}'.replace(':id', data);
                                            var deleteFormId = 'delete-form-' + data;
                                            var deleteUrl = '{{ route('roles.destroy', ':id') }}'.replace(':id',
                                            data);

                                            return '<a href="' + editUrl + '" class="fas fa-edit"></a>' +
                                                '<a href="#" class="delete-link" ' +
                                                '   onclick="event.preventDefault(); document.getElementById(\'' +
                                                deleteFormId + '\').submit();">' +
                                                '   <i class="fas fa-trash text-danger"></i>' +
                                                '</a>' +
                                                '<form id="' + deleteFormId + '" ' +
                                                '   action="' + deleteUrl +
                                                '" method="POST" style="display: none;">' +
                                                '   @csrf' +
                                                '   @method('DELETE')' +
                                                '</form>';
                                        }
                                    },
                                ]
                            });
                        });
                     </script>
                     @endpush
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
@endsection
