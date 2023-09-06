@section('title', $title)
<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">All Users</a></li>
                    <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form wire:submit="save">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" wire:model="name" placeholder="User name" class="form-control">
                                    @error('name')
                                    <div class="text-danger text-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" wire:model="email" placeholder="Email address" class="form-control">
                                    @error('email')
                                    <div class="text-danger text-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role">Role</label>
                                    <select wire:model="role" class="custom-select">
                                        <option value="">Choose Role</option>
                                        @foreach( $roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger text-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" wire:model="password" placeholder="Enter password" class="form-control">
                                    @error('password')
                                    <div class="text-danger text-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" placeholder="Confirm password" wire:model="password_confirmation" class="form-control">
                                    @error('password_confirmation')
                                    <div class="text-danger text-bold">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-dark" type="submit">Add User</button>
                            </form>
                        </div>
                    </div><!-- /.card -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>