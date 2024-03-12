@extendS('palika.layouts.main')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('palika/dashboard')}}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    {{-- <section class="section"> --}}
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p>

             <!-- Table with stripped rows -->
             <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    <b>N</b>ame
                  </th>
                  <th>Email</th>
                  <th>address</th>
                  <th>Salary</th>
                  <th>role</th>
                  <th>Phone No.</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profileData as $item)
                <tr>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->salary}}</td>
                  <td>{{$item->role}}</td>
                  <td>{{$item->phone}}</td>
                  <td><a href="{{url('palika/edit', $item->id)}}" onsubmit="return confirm('edit?')" class="btn btn-warning btn-sm">&nbsp; Edit &nbsp;</a></td>
                  <td class="align-middle">
                  <form action="{{ route('palika.delete', $item->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger m-0">Delete</button>
                </form>
                  </td>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  