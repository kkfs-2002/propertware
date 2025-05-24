@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="bi bi-chat-left-text me-2"></i>Feedback & Comments</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Feedback</li>
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
                <div class="card mb-4">
                    <div class="card-header bg-white border-bottom py-3">
                        <h5 class="mb-0 fw-semibold text-dark">
                            <i class="bi bi-pencil-square text-primary me-2"></i>Share Your Feedback
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ url('user/comments/store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="comment_type" class="form-label fw-medium">Feedback Type <span class="text-danger">*</span></label>
                                    <select name="type" id="comment_type" class="form-select" required>
                                        <option value="general">General System Feedback</option>
                                        <option value="vendor">Vendor Specific Feedback</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3" id="vendor_select_container" style="display: none;">
                                    <label for="vendor_id" class="form-label fw-medium">Select Vendor</label>
                                    <select name="vendor_id" id="vendor_id" class="form-select">
                                        <option value="">-- Select Vendor --</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="comment_text" class="form-label fw-medium">Your Feedback <span class="text-danger">*</span></label>
                                <textarea name="comment" id="comment_text" class="form-control" rows="5"
                                          placeholder="Please share your detailed feedback here..."
                                          required></textarea>
                                <div class="form-text text-muted">We value your input to help improve our services</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-send-fill me-2"></i> Submit Feedback
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- List of Comments -->
                <div class="card">
                    <div class="card-header bg-white border-bottom py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0 fw-semibold text-dark">
                                <i class="bi bi-chat-square-text text-primary me-2"></i>
                                Recent Feedback
                            </h5>
                            <span class="badge bg-primary-soft text-primary rounded-pill">{{ count($comments) }} items</span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @forelse($comments as $comment)
                            <div class="comment-item p-4 border-bottom" id="comment-{{ $comment->id }}">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar bg-light-primary text-primary rounded-circle d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $comment->user->name }}</h6>
                                                <small class="text-muted">
                                                    <i class="bi bi-clock me-1"></i>
                                                    {{ $comment->created_at->format('M j, Y \a\t g:i a') }}
                                                </small>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                @if($comment->type === 'vendor' && $comment->vendor)
                                                    <span class="badge bg-light-info text-info fs-12">
                                                        <i class="bi bi-shop me-1"></i>
                                                        {{ $comment->vendor->name }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-light-secondary text-secondary fs-12">
                                                        <i class="bi bi-gear me-1"></i>
                                                        System
                                                    </span>
                                                @endif
                                                
                                                @if(Auth::id() == $comment->user_id)
                                                    <form action="{{ route('comments.delete', $comment) }}" method="POST" class="ms-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-icon btn-outline-danger delete-comment"
                                                                onclick="return confirm('Are you sure you want to delete this comment?')"
                                                                title="Delete this comment">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="comment-content mt-2 ps-2 border-start border-2 border-light">
                                            <p class="mb-0 text-dark">{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center">
                                <div class="empty-state">
                                    <i class="bi bi-chat-square-text text-muted" style="font-size: 3rem;"></i>
                                    <h5 class="mt-3 mb-2">No feedback yet</h5>
                                    <p class="text-muted">Your feedback helps us improve</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    
                    @if(count($comments) > 0)
                        <div class="card-footer bg-white py-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Showing {{ count($comments) }} of {{ count($comments) }} feedback items</small>
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

    // Handle delete button click
    document.querySelectorAll('.delete-comment').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            if (confirm('Are you sure you want to delete this comment? This action cannot be undone.')) {
                // Create a form to submit the delete request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('user/comments/delete') }}/${commentId}`;
                
                // Add CSRF token
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);
                
                // Add method spoofing for DELETE
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
</script>
@endpush

<style>
    .avatar {
        font-weight: 500;
    }
    .empty-state {
        max-width: 300px;
        margin: 0 auto;
    }
    .comment-content {
        padding-left: 12px;
    }
    .fs-12 {
        font-size: 12px;
    }
    .bg-primary-soft {
        background-color: rgba(13, 110, 253, 0.1);
    }
    .btn-icon {
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }
    .border-light {
        border-color: #f0f2f5 !important;
    }
</style>
@endsection