@extends('user.layouts.app')
@Section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Book Service</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Book Service</li>
                 </ol>
                 </nav>
                  </div>

                  <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                      
                            <div class="card">
                            <div class="card-body">

                            <h5 class="card-title"> Add Book Service</h5>
                            <form action="{{ url('user/book_service/add') }}" method="post" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Service Type<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="service_type_id" required id="SelectServiceTypeHideShow">
                                        <option value="">SelectServiceType</option>
                                         @foreach($getServiceType as $value)
                                         <option {{ (old('service_type_id') == $value->id) ?  'selected' : '' }} value="{{ $value->id}}">{{ $value->name}}</option>
                                         @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('service_type_id') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" required id="category">
                                        <option value="">Select Category</option>
                                        @foreach($getcategory as $value)
                                         <option {{ (old('category_id') == $value->id) ?  'selected' : '' }} value="{{ $value->id}}">{{ $value->name}}</option>
                                         @endforeach 
                                    </select>
                                    <span style="color:red">{{ $errors->first('category_id') }}</span>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Sub Category<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" required id="subcategory">      
                                    </select>
                                    <span style="color:red">{{ $errors->first('sub_category_id') }}</span>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">AMC Free Service<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="amc_free_service_id" required>   
                                        <option value="">Select AMC Free Service</option>
                                    @foreach($getAMC->option as $value)

                                       @php
                                           $RecordCount = App\Models\BookServiceModel::where('amc_free_service_id' ,'=', $value->id)->where('user_id', '=', Auth::user()->id)->count();

                                           $CountRecord = $value->limits;
                                           $LimitCount  = $CountRecord - $CountRecord;

                                       @endphp

                                       <option {{ (old('amc_free_service_id') == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>

                                    @endforeach
                                         
                                    </select>
                                    <span style="color:red">{{ $errors->first('amc_free_service_id') }}</span>
                                </div>
                            </div>
                        

                            
  
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Description<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" required></textarea>
                                    <span style="color:red">{{ $errors->first('description') }}</span>
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Special Instructions<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="special_instructions" class="form-control" required></textarea>
                                    <span style="color:red">{{ $errors->first('special_instructions') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Do You have a Pet? <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                   <select class="form-control" name="pet">
                                     <option {{ old('pet') == '2' ? "selected" : '' }}value="2">No</option>
                                     <option {{ old('pet') == '1' ? "selected" : '' }} value="1">Yes</option>
                                   </select>
                                    <span style="color:red">{{ $errors->first('pet') }}</span>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Available Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                   <input type="date" name="available_date" class="form-control" required>
                                    <span style="color:red">{{ $errors->first('available_date') }}</span>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">submit</button>
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
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
      $("#category").on('change', function(e){
          var cat_id = this.value;
        
          //alert(cat_id);

          $.ajax({
            url: "{{ url('user/book_service/sub_category') }}",
            type: "POST",
            data: {
                cat_id: cat_id,
                _token: "{{ csrf_token() }}"
            },
             dataType: 'json',
             success: function(result){
                $('#subcategory').html('<option value="">Select Sub Category </option>');
                $.each(result.get_sub_category, function(key, value){
                    $("#subcategory").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
             }
          });
      })
    });
    </script>
@endsection