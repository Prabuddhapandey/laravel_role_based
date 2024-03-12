@extends('pradesh.layouts.main')
@section('main')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('pradesh/dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update User/Admin</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                       
                        <form method="post" action="{{ route('pradesh.update', $user->id) }}">
                            @csrf
                            @method('PUT') <!-- Use the PUT method for updating -->

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="text">Address</label>
                                <input type="address" name="address" class="form-control" value="{{ $user->address }}" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="salary" name="salary" class="form-control" value="{{ $user->salary }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone No.</label>
                                <input type="string" name="phone" class="form-control" value="{{ $user->phone }}" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection