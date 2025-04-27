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
                              
                               
                            </tbody>
                             </table> 
                          
                         </div>
                         </div>
                         </div>
                        </div>

                  </section>
      
    <div class="body-wrapper-inner">
        <div class="container-fluid">

        @endsection