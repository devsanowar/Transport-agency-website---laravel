@extends('admin.layouts.app')
@section('title', 'Customer Reviews')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
 <form id="addTitlesForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            {{-- Client Title --}}
                            <div class="col-md-3">
                                <label class="form-label">Tag Line</label>
                                <input type="text" name="review_tagline" class="form-control" placeholder="Happy Client" value="{{ $sectionTitle->review_tagline }}"
                                    required>
                            </div>

                            {{-- About Service Title --}}
                            <div class="col-md-3">
                                <label class="form-label">Section Title</label>
                                <input type="text" name="review_title" class="form-control"
                                    placeholder="About Our Service" value="{{ $sectionTitle->review_title }}" required>
                            </div>

                            {{-- Third Title --}}
                            <div class="col-md-4">
                                <label class="form-label">Section Title Highlight</label>
                                <input type="text" name="review_title_highlight" class="form-control" value="{{ $sectionTitle->review_title_highlight }}" placeholder="Other Title"
                                    required>
                            </div>

                            {{-- Fourth Title --}}
                            <div class="col-md-2">

                                <button type="submit" class="btn btn-primary" id="submitBtn" style="margin-top: 28px;">
                                    <span id="btnText">Update</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">All Customer Reviews</h5>
                        <a href="{{ route('reviews.create') }}" class="btn btn-outline-primary px-3 rounded-0">Add
                            Review</a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Client Image</th>
                                    <th>Client Name</th>
                                    <th>Designation</th>
                                    <th>Ratings</th>
                                    <th>Review</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customerReviews as $key => $review)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($review->client_image)
                                        <img src="{{ asset($review->client_image) }}" alt="client image" width="50">
                                        @else
                                        <img src="{{ asset('backend/assets/images/default.png') }}" alt="default image"
                                            width="50">
                                        @endif
                                    </td>
                                    <td>{{ $review->client_name ?? '-' }}</td>
                                    <td>{{ $review->client_designation ?? '-' }}</td>
                                    <td>{{ $review->client_ratings ?? '-' }}</td>
                                    <td>{{ Str::limit($review->client_review ?? '-', 45, '...') }}</td>
                                    <td class="text-center">
                                        @if($review->status)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('reviews.edit', $review->id) }}"
                                            class="action-icon border border-primary text-primary me-2 editReviewBtn">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                            class="deleteReviewForm" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="action-icon border border-danger text-danger deleteBtn"
                                                data-id="{{ $review->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend') }}/assets/js/sweetalert2.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteBtn', function() {
            let button = $(this);
            let form = button.closest('form');
            let rowId = button.data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

<script>
$(document).ready(function() {
    $("#addTitlesForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('review.title.update') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status === 'success'){
                    $("#addTitlesForm")[0].reset();
                    toastr.success(response.message);
                } else {
                    toastr.error(response.message ?? 'Something went wrong!');
                }
            },
            error: function(xhr){
                if(xhr.status === 422){
                    $.each(xhr.responseJSON.errors, function(key, value){
                        toastr.error(value[0]);
                    });
                } else {
                    toastr.error('An unexpected error occurred. Please try again.');
                }
            },
            complete: function(){
                $('#btnText').text('Submit');
                $('#btnSpinner').addClass('d-none');
                $('#submitBtn').prop('disabled', false);
            }
        });
    });
});
</script>

@endpush
