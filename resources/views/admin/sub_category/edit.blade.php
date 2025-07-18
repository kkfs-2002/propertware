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
                      
                            <div class="card">
                            <div class="card-body">

                            <h5 class="card-title"> Edit Sub Category</h5>
                            <form action="{{ url('admin/sub_category/edit/'.$getSubCategory->id) }}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Catergory Name <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    
                                    <select class="form-control" name="category_id" required>
                                         <option value="">Select Catergory Name </option>
                                         @foreach($getCategory as $value)
                                          <option {{ ($getSubCategory->category_id ==$value->id) ? 'selected' : '' }} value="{{ $value->id}}">{{ $value->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Sub Catergory Name <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required value="{{  $getSubCategory->name }}">
                                    <span style="color:red">{{ $errors->first('name') }}</span>
                                </div>
                            </div>

                        



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">update</button>

                                    
                                     <a href="{{ url('admin/sub_category/list') }}" class="btn btn-outline-gray-700">
                                   <i class="bi bi-arrow-left me-2"></i>Back to List
                               </a>
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

        @endsection