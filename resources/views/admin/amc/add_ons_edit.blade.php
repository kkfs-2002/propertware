@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Edit Add ons</h1>
        <nav>
            <ol class="breadcrumb  ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Add ons</li>
                 </ol>
                 </nav>
                  </div>

                  <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                      
                            <div class="card">
                            <div class="card-body">

                            <h5 class="card-title">Edit Add ons</h5>
                            <form action="{{ url('admin/amc/edit_add_ons/'. $getrecord->id) }}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                  
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{ $getrecord->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">price <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" required 
                                 value="{{ $getrecord->price }}" 
                                  oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" maxlength="10">
                                </div>
                            </div>

                            
            
         
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>



                            </form>

                    </div>
                        </div>
                             </div>
                             </div>
                  </section  >                          


                       
    <div class="body-wrapper-inner">
        <div class="container-fluid">

        @endsection;