@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Book Service</h1>
        <nav>
            <ol class="breadcrumb">
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
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title">New Service Request</h5>
                            <a href="{{ url('user/book_service/list') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-list-ul me-1"></i> View Requests
                            </a>
                        </div>

                        <form action="{{ url('user/book_service/add') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-3">
                                <!-- Service Type -->
                                <div class="col-md-6">
                                    <label for="SelectServiceTypeHideShow" class="form-label">Service Type<span class="text-danger">*</span></label>
                                    <select class="form-select" name="service_type_id" required id="SelectServiceTypeHideShow">
                                        <option value="">Select Service Type</option>
                                        @foreach($getServiceType as $value)
                                            <option {{ old('service_type_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a service type</div>
                                    @error('service_type_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Category (initially shown) -->
                                <div class="col-md-6" id="hideDivCategory">
                                    <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="category_id" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($getcategory as $value)
                                            <option {{ old('category_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a category</div>
                                    @error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Sub Category (initially shown) -->
                                <div class="col-md-6" id="hideDivSubCategory">
                                    <label for="subcategory" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="sub_category_id" id="subcategory">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a sub category</div>
                                    @error('sub_category_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- AMC Free Service (initially hidden) -->
                                <div class="col-md-6" id="showDivAMCFreeService" style="display: none;">
                                    <label class="form-label">AMC Free Service<span class="text-danger">*</span></label>
                                    <select class="form-select" name="amc_free_service_id">
                                        <option value="">Select AMC Free Service</option>
                                        @if(isset($getAMC->option) && is_iterable($getAMC->option))
                                            @foreach($getAMC->option as $value)
                                                <option {{ old('amc_free_service_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        @else
                                            <option value="">No AMC Free Services Found</option>
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">Please select an AMC service</div>
                                    @error('amc_free_service_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                                    <div class="invalid-feedback">Please provide a description</div>
                                    @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Special Instructions -->
                                <div class="col-12">
                                    <label for="special_instructions" class="form-label">Special Instructions<span class="text-danger">*</span></label>
                                    <textarea name="special_instructions" class="form-control" rows="3" required>{{ old('special_instructions') }}</textarea>
                                    <div class="invalid-feedback">Please provide special instructions</div>
                                    @error('special_instructions')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Pet -->
                                <div class="col-md-6">
                                    <label class="form-label">Do You have a Pet?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="pet" required>
                                        <option value="2" {{ old('pet') == '2' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('pet') == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    <div class="invalid-feedback">Please select an option</div>
                                    @error('pet')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Available Date -->
                                <div class="col-md-6">
                                    <label for="available_date" class="form-label">Available Date<span class="text-danger">*</span></label>
                                    <input type="date" name="available_date" class="form-control" required value="{{ old('available_date') }}">
                                    <div class="invalid-feedback">Please select a date</div>
                                    @error('available_date')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Attachments -->
                                <div class="col-12">
                                    <label class="form-label">Attachments</label>
                                    <div class="border rounded p-3">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody id="attachment-container">
                                                    <tr>
                                                        <td width="80%">
                                                            <input type="file" name="option[100][attachment_image]" class="form-control">
                                                        </td>
                                                        <td class="text-end">
                                                            <button type="button" class="btn btn-sm btn-outline-danger item_remove">
                                                                <i class="bi bi-trash"></i> Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr id="item_below_row100">
                                                        <td colspan="2" class="pt-3">
                                                            <button type="button" id="100" class="btn btn-sm btn-outline-primary add_row">
                                                                <i class="bi bi-plus-circle"></i> Add Another File
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @error('option.*.attachment_image')<div class="text-danger small">{{ $message }}</div>@enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-send-fill me-1"></i> Submit 
                                    </button>
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
        // Form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()

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
            $('#subcategory').html('<option value="">Loading...</option>');

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
                },
                error: function() {
                    $('#subcategory').html('<option value="">Error loading subcategories</option>');
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
                    <td>
                        <input type="file" name="option[${item_row}][attachment_image]" class="form-control" required>
                    </td>
                    <td class="text-end">
                        <button type="button" class="btn btn-sm btn-outline-danger item_remove">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </td>
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