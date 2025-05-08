@extends('user.layouts.app')

@section('content')
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
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Book Service</h5>

                        <form action="{{ url('user/book_service/add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- Service Type --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Service Type<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="service_type_id" required id="SelectServiceTypeHideShow">
                                        <option value="">Select Service Type</option>
                                        @foreach($getServiceType as $value)
                                            <option {{ old('service_type_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('service_type_id') }}</span>
                                </div>
                            </div>

                            {{-- Category --}}
                            <div class="row mb-3" id="hideDivCategory">
                                <label class="col-sm-2 col-form-label">Category<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="category_id" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($getcategory as $value)
                                            <option {{ old('category_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('category_id') }}</span>
                                </div>
                            </div>

                            {{-- Sub Category --}}
                            <div class="row mb-3" id="hideDivSubCategory">
                                <label class="col-sm-2 col-form-label">Sub Category<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sub_category_id" id="subcategory"></select>
                                    <span style="color:red">{{ $errors->first('sub_category_id') }}</span>
                                </div>
                            </div>

                            {{-- AMC Free Service --}}
                            <div class="row mb-3" id="showDivAMCFreeService" style="display: none;">
                                <label class="col-sm-2 col-form-label">AMC Free Service<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="amc_free_service_id">
                                        <option value="">Select AMC Free Service</option>
                                        @if(isset($getAMC->option) && is_iterable($getAMC->option))
                                            @foreach($getAMC->option as $value)
                                                <option {{ old('amc_free_service_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No AMC Free Services Found</option>
                                        @endif
                                    </select>
                                    <span style="color:red">{{ $errors->first('amc_free_service_id') }}</span>
                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Description<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
                                    <span style="color:red">{{ $errors->first('description') }}</span>
                                </div>
                            </div>

                            {{-- Special Instructions --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Special Instructions<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea name="special_instructions" class="form-control" required>{{ old('special_instructions') }}</textarea>
                                    <span style="color:red">{{ $errors->first('special_instructions') }}</span>
                                </div>
                            </div>

                            {{-- Pet --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Do You have a Pet? <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="pet">
                                        <option value="2" {{ old('pet') == '2' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('pet') == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('pet') }}</span>
                                </div>
                            </div>

                            {{-- Available Date --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Available Date<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="available_date" class="form-control" required value="{{ old('available_date') }}">
                                    <span style="color:red">{{ $errors->first('available_date') }}</span>
                                </div>
                            </div>

                            {{-- Attachments --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Attachment Add<span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <table class="table">
                                        <tr>
                                            <th>Select Image</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td><input type="file" name="option[100][attachment_image]" class="form-control"></td>
                                            <td><a href="#" class="item_remove btn btn-danger">Remove</a></td>
                                        </tr>
                                        <tr id="item_below_row100">
                                            <td colspan="2">
                                                <button type="button" id="100" class="btn btn-primary add_row">Add</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {

        // Initial trigger
        $('#SelectServiceTypeHideShow').trigger('change');

        // Show/hide AMC or category/subcategory based on service type
        $('#SelectServiceTypeHideShow').on('change', function () {
            if (this.value == 4) {
                $('#showDivAMCFreeService').show();
                $('#hideDivCategory').hide();
                $('#hideDivSubCategory').hide();
            } else {
                $('#showDivAMCFreeService').hide();
                $('#hideDivCategory').show();
                $('#hideDivSubCategory').show();
            }
        });

        // Load subcategories via AJAX
        $('#category').on('change', function () {
            var cat_id = $(this).val();

            $.ajax({
                url: "{{ url('user/book_service/sub_category') }}",
                type: "POST",
                data: {
                    cat_id: cat_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (result) {
                    $('#subcategory').html('<option value="">Select Sub Category</option>');
                    $.each(result.get_sub_category, function (key, value) {
                        $("#subcategory").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        // Dynamic image rows
        let item_row = 101;
        $("body").on("click", ".add_row", function (e) {
            e.preventDefault();
            const id = $(this).attr('id');
            const html = `
                <tr>
                    <td><input class="form-control" required name="option[${item_row}][attachment_image]" type="file"></td>
                    <td><a href="#" class="item_remove btn btn-danger">Remove</a></td>
                </tr>`;
            $("#item_below_row" + id).before(html);
            item_row++;
        });

        $("body").on("click", ".item_remove", function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
        });
    });
</script>
@endsection
