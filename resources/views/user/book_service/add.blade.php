@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2">Book Service</h1>
        <nav>
            <ol class="breadcrumb ms-4">
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
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">New Service Request</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('user/book_service/add') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-4">
                                <!-- Service Information Section -->
                                <div class="col-12">
                                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Service Information</h6>
                                </div>

                                <!-- Service Type -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="SelectServiceTypeHideShow" class="form-label">Service Type<span class="text-danger">*</span></label>
                                        <select class="form-select shadow-sm" name="service_type_id" required id="SelectServiceTypeHideShow">
                                            <option value="">Select Service Type</option>
                                            @foreach($getServiceType as $value)
                                                <option {{ old('service_type_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a service type</div>
                                        @error('service_type_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Category (initially shown) -->
                                <div class="col-md-6" id="hideDivCategory">
                                    <div class="form-group">
                                        <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                                        <select class="form-select shadow-sm" name="category_id" id="category" {{ old('service_type_id') == 4 ? 'disabled' : '' }}>
                                            <option value="">Select Category</option>
                                            @foreach($getcategory as $value)
                                                <option {{ old('category_id') == $value->id ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a category</div>
                                        @error('category_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Sub Category (initially shown) -->
                                <div class="col-md-6" id="hideDivSubCategory">
                                    <div class="form-group">
                                        <label for="subcategory" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                        <select class="form-select shadow-sm" name="sub_category_id" id="subcategory" {{ old('service_type_id') == 4 ? 'disabled' : '' }}>
                                            <option value="">Select Sub Category</option>
                                            @if(old('category_id'))
                                                @php
                                                    $subcategories = \App\Models\SubCategory::where('category_id', old('category_id'))->get();
                                                @endphp
                                                @foreach($subcategories as $subcategory)
                                                    <option {{ old('sub_category_id') == $subcategory->id ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">Please select a sub category</div>
                                        @error('sub_category_id')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- AMC Free Service (initially hidden) -->
                                <div class="col-md-6" id="showDivAMCFreeService" style="display: {{ old('service_type_id') == 4 ? 'block' : 'none' }};">
                                    <div class="form-group">
                                        <label class="form-label">AMC Free Service<span class="text-danger">*</span></label>
                                        <select class="form-select shadow-sm" name="amc_free_service_id" {{ old('service_type_id') != 4 ? 'disabled' : '' }}>
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
                                </div>

                                <!-- Service Details Section -->
                                <div class="col-12 mt-3">
                                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Service Details</h6>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description<span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control shadow-sm" rows="4" required>{{ old('description') }}</textarea>
                                        <div class="invalid-feedback">Please provide a description</div>
                                        @error('description')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Special Instructions -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="special_instructions" class="form-label">Special Instructions<span class="text-danger">*</span></label>
                                        <textarea name="special_instructions" class="form-control shadow-sm" rows="4" required>{{ old('special_instructions') }}</textarea>
                                        <div class="invalid-feedback">Please provide special instructions</div>
                                        @error('special_instructions')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Scheduling Section -->
                                <div class="col-12 mt-3">
                                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Scheduling Information</h6>
                                </div>

                                <!-- Pet -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Do You have a Pet?<span class="text-danger">*</span></label>
                                        <select class="form-select shadow-sm" name="pet" required>
                                            <option value="">Select Option</option>
                                            <option value="2" {{ old('pet') == '2' ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ old('pet') == '1' ? 'selected' : '' }}>Yes</option>
                                        </select>
                                        <div class="invalid-feedback">Please select an option</div>
                                        @error('pet')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Available Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="available_date" class="form-label">Available Date<span class="text-danger">*</span></label>
                                        <input type="date" name="available_date" class="form-control shadow-sm" required 
                                               value="{{ old('available_date') }}" 
                                               min="{{ date('Y-m-d') }}">
                                        <div class="invalid-feedback">Please select a valid future date</div>
                                        @error('available_date')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Attachments Section -->
                                <div class="col-12 mt-3">
                                    <h6 class="fw-bold text-primary mb-3 border-bottom pb-2">Attachments</h6>
                                    <div class="form-group">
                                        <div class="border rounded p-3 bg-light">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody id="attachment-container">
                                                        @if(old('option'))
                                                            @foreach(old('option') as $key => $attachment)
                                                                <tr>
                                                                    <td width="80%">
                                                                        <input type="file" name="option[{{ $key }}][attachment_image]" class="form-control shadow-sm">
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <button type="button" class="btn btn-sm btn-outline-danger item_remove">
                                                                            <i class="bi bi-trash"></i> Remove
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td width="80%">
                                                                    <input type="file" name="option[100][attachment_image]" class="form-control shadow-sm">
                                                                </td>
                                                                <td class="text-end">
                                                                    <button type="button" class="btn btn-sm btn-outline-danger item_remove">
                                                                        <i class="bi bi-trash"></i> Remove
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endif
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
                                            <small class="text-muted d-block mt-2">Maximum 5 files allowed (JPG, PNG, PDF, max 2MB each)</small>
                                        </div>
                                        @error('option.*.attachment_image')<div class="text-danger small">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-end mt-5">
                                    <button type="submit" class="btn btn-primary px-4 py-2">
                                        <i class="bi bi-send-fill me-2"></i> Submit Request
                                    </button>
                                    <a href="{{ url('user/service_history/list') }}" class="btn btn-outline-secondary px-4 py-2 ms-3">
                                        <i class="bi bi-arrow-left me-2"></i> Back to List
                                    </a>
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

        // Initialize form based on existing values
        function initializeForm() {
            const serviceType = $('#SelectServiceTypeHideShow').val();
            toggleServiceTypeFields(serviceType);
            
            // If category is already selected, load its subcategories
            if ($('#category').val() && serviceType != 4) {
                loadSubcategories($('#category').val());
            }
        }

        // Toggle between AMC and regular service fields
        function toggleServiceTypeFields(serviceType) {
            if (serviceType == 4) {
                $('#showDivAMCFreeService').show().find('select').prop('disabled', false);
                $('#hideDivCategory, #hideDivSubCategory').hide().find('select').prop('disabled', true);
            } else {
                $('#showDivAMCFreeService').hide().find('select').prop('disabled', true);
                $('#hideDivCategory, #hideDivSubCategory').show().find('select').prop('disabled', false);
            }
        }

        // Load subcategories via AJAX
        function loadSubcategories(categoryId) {
            $('#subcategory').html('<option value="">Loading...</option>');

            $.ajax({
                url: "{{ url('user/book_service/sub_category') }}",
                type: "POST",
                data: {
                    cat_id: categoryId,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (result) {
                    $('#subcategory').html('<option value="">Select Sub Category</option>');
                    if (result.get_sub_category && result.get_sub_category.length > 0) {
                        $.each(result.get_sub_category, function (key, value) {
                            const selected = value.id == "{{ old('sub_category_id') }}" ? 'selected' : '';
                            $("#subcategory").append(`<option value="${value.id}" ${selected}>${value.name}</option>`);
                        });
                    }
                },
                error: function() {
                    $('#subcategory').html('<option value="">Error loading subcategories</option>');
                }
            });
        }

        // Service Type Change Handler
        $('#SelectServiceTypeHideShow').on('change', function () {
            toggleServiceTypeFields(this.value);
        });

        // Category Change Handler
        $('#category').on('change', function () {
            if ($(this).val()) {
                loadSubcategories($(this).val());
            } else {
                $('#subcategory').html('<option value="">Select Sub Category</option>');
            }
        });

        // Dynamic attachment rows
        let item_row = {{ old('option') ? max(array_keys(old('option'))) + 1 : 101 }};
        const max_files = 5;
        
        $("body").on("click", ".add_row", function (e) {
            e.preventDefault();
            
            // Check maximum files limit
            const currentFiles = $('#attachment-container tr:has(input[type="file"])').length;
            if (currentFiles >= max_files) {
                alert(`Maximum ${max_files} files are allowed.`);
                return;
            }
            
            const id = $(this).attr('id');
            const html = `
                <tr>
                    <td>
                        <input type="file" name="option[${item_row}][attachment_image]" class="form-control shadow-sm" accept=".jpg,.jpeg,.png,.pdf" required>
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

        // Initialize form on page load
        initializeForm();
    });
</script>
@endsection