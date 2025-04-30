@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Annual Maintenance Contract</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">AMC</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Add AMC</h5>
                        <form action="{{ url('admin/amc/add') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="mb-4">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" required value="{{ old('name') }}" placeholder="Enter AMC name">
                            </div>

                            <div class="mb-4">
                                <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                <input type="text" name="amount" class="form-control" id="amount" required value="{{ old('amount') }}" 
                                       oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" maxlength="10" placeholder="Enter amount">
                            </div>

                            <div class="mb-4">
                                <label for="business_category" class="form-label">Business Category</label>
                                <select class="form-control" name="business_category" id="business_category">
                                    <option value="0" {{ old('business_category') == '0' ? "selected" : "" }}>Residential</option>
                                    <option value="1" {{ old('business_category') == '1' ? "selected" : "" }}>Common-Area</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="series" class="form-label">Series <span class="text-danger">*</span></label>
                                <input type="text" name="series" class="form-control" id="series" required value="{{ old('series') }}" placeholder="Enter series">
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection