@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="bi bi-chat-left-text me-2"></i>User Comments</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Comments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Comment Form -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-pencil-square fs-5 me-2"></i>
                            <h5 class="mb-0">Leave a Comment</h5>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ url('user/comments/store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="comment_type" class="form-label fw-semibold">Comment Type <span class="text-danger">*</span></label>
                                <select name="type" id="comment_type" class="form-select form-select-lg" required>
                                    <option value="general">General System Comment</option>
                                    <option value="vendor">Vendor Related Comment</option>
                                </select>
                            </div>
                            
                            <div class="mb-4" id="vendor_select_container" style="display: none;">
                                <label for="vendor_id" class="form-label fw-semibold">Select Vendor</label>
                                <select name="vendor_id" id="vendor_id" class="form-select form-select-lg">
                                    <option value="">-- Select Vendor --</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-text">Please select the vendor this comment relates to</div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="comment_text" class="form-label fw-semibold">Your Comment <span class="text-danger">*</span></label>
                                <textarea name="comment" id="comment_text" class="form-control form-control-lg" rows="6"
                                          style="resize: vertical; min-height: 150px; border-radius: 8px;"
                                          placeholder="Type your detailed comment here..." required></textarea>
                                <div class="form-text">Your feedback helps us improve our services</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-lg px-4 py-2">
                                    <i class="bi bi-send-fill me-2"></i> Submit Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- List of Comments -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 fw-semibold">
                                <i class="bi bi-chat-square-text-fill text-primary me-2"></i>
                                Recent Comments
                            </h5>
                            <span class="badge bg-primary rounded-pill">{{ count($comments) }} comments</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @forelse($comments as $comment)
                            <div class="comment-item p-4 border-bottom hover-bg">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar bg-light-primary text-primary rounded-circle" 
                                             style="width: 48px; height: 48px; line-height: 48px; text-align: center; font-size: 1.1rem;">
                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-0 fw-semibold">{{ $comment->user->name }}</h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-clock-history me-1"></i>
                                                    {{ $comment->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                            <div>
                                                @if($comment->type === 'vendor' && $comment->vendor)
                                                    <span class="badge bg-light-info text-info">
                                                        <i class="bi bi-shop me-1"></i>
                                                        {{ $comment->vendor->name }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-light-secondary text-secondary">
                                                        <i class="bi bi-gear me-1"></i>
                                                        System
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="comment-content mt-2 ps-2">
                                            <p class="mb-0 text-dark">{{ $comment->comment }}</p>
                                        </div>
                                        <div class="mt-3 d-flex align-items-center">
                                            <button class="btn btn-sm btn-outline-secondary me-2">
                                                <i class="bi bi-reply me-1"></i> Reply
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-flag me-1"></i> Report
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center">
                                <div class="empty-state">
                                    <i class="bi bi-chat-square-text text-muted" style="font-size: 3rem;"></i>
                                    <h5 class="mt-3 mb-2">No comments yet</h5>
                                    <p class="text-muted">Be the first to share your thoughts</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    @if(count($comments) > 0)
                        <div class="card-footer bg-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Showing {{ count($comments) }} comments</small>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-arrow-clockwise me-1"></i> Load More
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    document.getElementById('comment_type').addEventListener('change', function() {
        const vendorSelect = document.getElementById('vendor_select_container');
        if (this.value === 'vendor') {
            vendorSelect.style.display = 'block';
        } else {
            vendorSelect.style.display = 'none';
        }
    });
</script>
@endpush

<style>
    .hover-bg:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
    }
    .avatar {
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .empty-state {
        max-width: 300px;
        margin: 0 auto;
    }
    .comment-content {
        border-left: 3px solid #e9ecef;
        padding-left: 15px;
    }
</style>
@endsection