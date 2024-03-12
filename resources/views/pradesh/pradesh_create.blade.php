<!-- resources/views/superadmin/create.blade.php -->
@extends('pradesh.layouts.main')
@section('main')
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User/Pradesh</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action={{url('pradesh/store')}} >
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="password">salary</label>
                                <input type="password" name="password" class="form-control" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="float" name="salary" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone no.</label>
                                <input type="string" name="phone" class="form-control" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="password">salary</label>
                                <input type="password" name="password" class="form-control" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="Pradesh">Pradesh</option>
                                    <option value="Palika">Palika</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                          
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection