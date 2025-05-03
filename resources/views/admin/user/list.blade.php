@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">User List</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                {{-- Search User start --}}
               
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search User</h3>
                    </div>
                    <form method="get" action="">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" placeholder="ID" value="{{ Request::get('id') }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>First Name</label>
                                    <input type="text" name="name" value="{{ Request::get('name') }}" class="form-control" placeholder="First Name">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Last Name</label>
                                    <input type="text" value="{{ Request::get('last_name') }}" name="last_name" class="form-control" placeholder="Last Name">
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Email ID</label>
                                    <input type="email" value="{{ Request::get('email') }}" name="email" class="form-control" placeholder="Email ID">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Mobile</label>
                                    <input type="text" value="{{ Request::get('mobile') }}" name="mobile" class="form-control" placeholder="Mobile">
                                </div>

                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary mt-4" type="submit">Search</button>
                                    <a href="{{ url('admin/user/list') }}" class="btn btn-success mt-4">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Search User end --}}

                @include('_message')

                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">User Management</h5>
                        <a href="{{ url('admin/user/add') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New User
                        </a>
                    </div>

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Profile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($getrecode as $value)
                                <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>
                                               @if(!empty($value->profile))
                                                    <img src="{{ $value-> getImage() }}"  style="height: 50px; width: 50px;">
                                                @endif
                                            </td>
                                            <td>
                                            <a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>

                                                <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/user/delete/'.$value->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                                </a>
                                            </td>
                                 </tr>
                                   @empty
                                        <tr>
                                            <td colspan="100%">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
