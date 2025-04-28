@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Sub Category</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sub Category</li>
                 </ol>
                 </nav>
                  </div>

                  <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                        @include('_message')
                            <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ url('admin/sub_category/add') }}" class="btn btn-primary">Add New Sub Category</a>
                          </h5>
                          <table class="table">
                          <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                              @forelse($getrecord as $value)
                                 <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->category_name }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                    <a href="{{ url('admin/sub_category/edit/'.$value->id ) }}" class="btn btn-success">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <a onclick=" return confirm('Are you sure you want to delete?')" href="{{ url('admin/sub_category/delete/'.$value->id) }}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                        </a>

                                    </td>
                                 </tr>
                                 @empty
                                 <tr>
                                    <td colspan="100%">Record not found.</td>
                                </tr>
                              @endforelse
                               
                            </tbody>
                             </table> 
                             {{ $getrecord->links() }}
                         </div>
                         </div>
                         </div>
                        </div>

                  </section>
      
    <div class="body-wrapper-inner">
        <div class="container-fluid">

        @endsection