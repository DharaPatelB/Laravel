@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">Create user</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create user</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('users.store') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name<span class="text-danger">*</label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter email" name="name">
                                        @error('name')
                                            <span class="error invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>


                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email<span class="text-danger">* </label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Enter email" name="email">
                                        @error('email')
                                            <span class="error invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password<span class="text-danger">* </label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" placeholder="Enter Passsword" name="password">
                                        @error('password')
                                            <span class="error invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Roles<span class="text-danger">*</span></label>
                                        <select class="form-control select2 @error('roles') is-invalid @enderror" name="roles[]"
                                            multiple="multiple" style="width: 100%;" >
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('child-scripts')
    <script>
        $(document).ready(function() {
            // Attach input event listeners to the input fields
            $('#name').on('input', function() {
                removeErrorMessages($(this));
            });

            $('#email').on('input', function() {
                removeErrorMessages($(this));
            });
            $('#password').on('input', function() {
                removeErrorMessages($(this));
            });

            // Function to remove error messages and reset input field's border
            function removeErrorMessages(inputField) {
                // Find the parent element and then find the error message element
                var parent = inputField.closest('.form-group');
                var errorElement = parent.find('.error');

                // Remove the error message if it exists
                errorElement.remove();

                // Remove the is-invalid class to reset the input field's border
                inputField.removeClass('is-invalid');
            }
        });
    </script>
@endpush
