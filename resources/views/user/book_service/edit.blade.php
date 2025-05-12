@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Edit Book A Service </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('user/book_service/list') }}">Book A Service </a></li>
                
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
                            <h5 class="card-title">Edit Form {{ $getRecord->id }}</h5>
                            <a href="{{ url('user/book_service/list') }}" class="btn btn-sm btn-outline-secondary">
                               
                            </a>
                        </div>

                        <form action="{{ url('user/book_service/edit/' . $getRecord->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf

                            <div class="row g-3">
                                <!-- Service Type -->
                                <div class="col-md-6">
                                    <label class="form-label">Service Type<span class="text-danger">*</span></label>
                                    <select class="form-select" name="service_type_id" required>
                                        <option value="">Select Service Type</option>
                                        @foreach($getServiceType as $service)
                                            <option value="{{ $service->id }}" {{ $getRecord->service_type_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a service type</div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <label class="form-label">Category<span class="text-danger">*</span></label>
                                    <select class="form-select" name="category_id" id="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($getCategory as $cat)
                                            <option value="{{ $cat->id }}" {{ $getRecord->category_id == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a category</div>
                                </div>

                                <!-- Subcategory -->
                                <div class="col-md-6">
                                    <label class="form-label">Subcategory<span class="text-danger">*</span></label>
                                    <select class="form-select" name="sub_category_id" id="sub_category_id" required>
                                        <option value="">Select Subcategory</option>
                                        @foreach($getSubCategory as $sub)
                                            <option value="{{ $sub->id }}" {{ $getRecord->sub_category_id == $sub->id ? 'selected' : '' }}>
                                                {{ $sub->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please select a subcategory</div>
                                </div>

                                <!-- AMC Free Service -->
                                <div class="col-md-6">
                                    <label class="form-label">AMC Free Service</label>
                                    <select class="form-select" name="amc_free_service_id">
                                        <option value="">Select AMC Service</option>
                                        @foreach($getAmcFreeService as $amc)
                                            <option value="{{ $amc->id }}" {{ $getRecord->amc_free_service_id == $amc->id ? 'selected' : '' }}>
                                                {{ $amc->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <label class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $getRecord->description) }}</textarea>
                                    <div class="invalid-feedback">Please provide a description</div>
                                </div>

                                <!-- Special Instructions -->
                                <div class="col-12">
                                    <label class="form-label">Special Instructions<span class="text-danger">*</span></label>
                                    <textarea name="special_instructions" class="form-control" rows="3" required>{{ old('special_instructions', $getRecord->special_instructions) }}</textarea>
                                    <div class="invalid-feedback">Please provide special instructions</div>
                                </div>

                                <!-- Pet -->
                                <div class="col-md-6">
                                    <label class="form-label">Do You have a Pet?<span class="text-danger">*</span></label>
                                    <select class="form-select" name="pet" required>
                                        <option value="2" {{ $getRecord->pet == '2' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $getRecord->pet == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    <div class="invalid-feedback">Please select an option</div>
                                </div>

                                <!-- Available Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Available Date<span class="text-danger">*</span></label>
                                    <input type="date" name="available_date" class="form-control" required value="{{ old('available_date', $getRecord->available_date) }}">
                                    <div class="invalid-feedback">Please select a date</div>
                                </div>

                                <!-- New Attachments -->
                                <div class="col-12">
                                    <label class="form-label">Add New Attachments</label>
                                    <div class="border rounded p-3">
                                        <div id="new-attachments">
                                            <div class="mb-3">
                                                <input type="file" name="option[0][attachment_image]" class="form-control">
                                            </div>
                                        </div>
                                        <button type="button" id="add-more-files" class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="bi bi-plus-circle"></i> Add More Files
                                        </button>
                                    </div>
                                </div>

                                <!-- Existing Images -->
                                <div class="col-12">
                                    <label class="form-label">Existing Attachments</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        @foreach($getImages as $img)
                                        <div class="position-relative">
                                            <img src="{{ asset('upload/service/'.$img->attachment_image) }}" width="120" class="rounded border">
                                            <a href="{{ url('user/book_service/delete_image/'.$img->id) }}" 
                                               onclick="return confirm('Are you sure you want to delete this image?')"
                                               class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                <i class="bi bi-x"></i>
                                            </a>
                                        </div>
                                        @endforeach
                                        @if($getImages->isEmpty())
                                        <div class="text-muted">No attachments found</div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-check-circle me-1"></i> Update Request
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

        // Dynamic file upload fields
        let fileIndex = 1;
        $('#add-more-files').click(function() {
            $('#new-attachments').append(`
                <div class="mb-3 d-flex gap-2">
                    <input type="file" name="option[${fileIndex}][attachment_image]" class="form-control">
                    <button type="button" class="btn btn-sm btn-outline-danger remove-file">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            `);
            fileIndex++;
        });

        $(document).on('click', '.remove-file', function() {
            $(this).parent().remove();
        });

        // Load subcategories dynamically when category changes
        $('#category_id').change(function() {
            var cat_id = $(this).val();
            $('#sub_category_id').html('<option value="">Loading...</option>');

            $.ajax({
                url: "{{ url('user/book_service/sub_category') }}",
                type: "POST",
                data: {
                    cat_id: cat_id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function (result) {
                    $('#sub_category_id').html('<option value="">Select Subcategory</option>');
                    $.each(result.get_sub_category, function (key, value) {
                        $("#sub_category_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function() {
                    $('#sub_category_id').html('<option value="">Error loading subcategories</option>');
                }
            });
        });
    });
</script>
@endsection