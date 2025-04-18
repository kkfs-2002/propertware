@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Add ons</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add ons</li>
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
                                <a href="{{ url('admin/amc/add_add_ons/'.$getrecord->id) }}" class="btn btn-primary">Add New Add ons</a>
                          </h5>
                          <table class="table">
                          <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($get_add_ons as $value)
                                <tr>
                                    <td>{{  $value->id }}</td>
                                    <td>{{  $value->name }}</td>
                                    <td>{{ number_format($value->price, 2) }}</td>
                                    
                                    <td>
                                         
                                
                                    <a href="{{ url('admin/amc/edit_add_ons/'.$value->id ) }}" class="btn btn-success">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <a onclick=" return confirm('Are you sure you want to delete?')" href="{{ url('admin/amc/delete_add_ons/'.$value->id) }}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                        </a>

                                        
                                </td>
                                @empty
                                <tr>
                                    <td colspan="100%">Record not found.</td>
                                </tr>

                                @endforelse
                                </tr>
                            </tbody>
     
    
                           
                          </table>
                          {{ $get_add_ons->links() }}
                         </div>
                         </div>
                         </div>
                         </div>




                  </section>
      
    <div class="body-wrapper-inner">
        <div class="container-fluid">

        @endsection