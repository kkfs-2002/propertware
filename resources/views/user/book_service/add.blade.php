@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-plus-circle me-2"></i>New Service Request</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('user/service_history/list') }}">Service Requests</a></li>
                <li class="breadcrumb-item active">New Request</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm rounded-3">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger"><ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul></div>
                        @endif
                        <form method="POST" action="{{ url('user/book_service/store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_type_id" class="form-label">Service Type <span class="text-danger">*</span></label>
                                    <select class="form-select" id="service_type_id" name="service_type_id" required>
                                        <option value="">Select Service Type</option>
                                        @foreach($getServiceType as $serviceType)
                                            <option value="{{ $serviceType->id }}" {{ old('service_type_id') == $serviceType->id ? 'selected' : '' }}>
                                                {{ $serviceType->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('service_type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach($getCategory as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="sub_category_id" class="form-label">Sub Category</label>
                                    <select class="form-select" id="sub_category_id" name="sub_category_id">
                                        <option value="">Select Sub Category</option>
                                        @foreach($getSubCategory as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>
                                                {{ $subCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if($getAMC && isset($getAMC->freeServices))
                                <div class="col-md-6">
                                    <label for="amc_free_service_id" class="form-label">AMC Free Service</label>
                                    <select class="form-select" id="amc_free_service_id" name="amc_free_service_id">
                                        <option value="">Select AMC Free Service</option>
                                        @foreach($getAMC->freeServices as $freeService)
                                            <option value="{{ $freeService->id }}" {{ old('amc_free_service_id') == $freeService->id ? 'selected' : '' }}>
                                                {{ $freeService->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('amc_free_service_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @endif
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="special_instructions" class="form-label">Special Instructions</label>
                                    <textarea class="form-control" id="special_instructions" name="special_instructions" rows="2">{{ old('special_instructions') }}</textarea>
                                    @error('special_instructions')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="pet" class="form-label">Pets in Home</label>
                                    <input type="text" class="form-control" id="pet" name="pet" value="{{ old('pet') }}" placeholder="e.g., Dog, Cat, etc.">
                                    @error('pet')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="available_date" class="form-label">Preferred Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="available_date" name="available_date" value="{{ old('available_date') }}" required min="{{ date('Y-m-d') }}">
                                    @error('available_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="attachment_image" class="form-label">Attachments (Multiple allowed)</label>
                                    <input class="form-control" type="file" id="attachment_image" name="attachment_image[]" multiple>
                                    <small class="text-muted">Max 5 files (2MB each, jpg/png/gif/pdf)</small>
                                    @error('attachment_image.*')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                                <a href="{{ url('user/service_history/list') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('user/book_service/sub_category') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        cat_id: category_id
                    },
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append('<option value="">Select Sub Category</option>');
                        $.each(data, function(key, value) {
                            $('#sub_category_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                        // Restore old sub category, if any
                        var oldSubCategory = "{{ old('sub_category_id') }}";
                        if (oldSubCategory) {
                            $('#sub_category_id').val(oldSubCategory);
                        }
                    }
                });
            } else {
                $('#sub_category_id').empty();
                $('#sub_category_id').append('<option value="">Select Sub Category</option>');
            }
        });

        @if(old('category_id'))
            $('#category_id').trigger('change');
        @endif
    });
</script>
@endsection