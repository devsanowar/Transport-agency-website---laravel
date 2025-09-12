@extends('admin.layouts.app')
@section('title', 'Add Customer Review')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                    <h5>Add Customer Review</h5>
                    <a href="{{ route('reviews.index') }}" class="btn btn-outline-primary float-end">All Reviews</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="addCustomerReviewForm" enctype="multipart/form-data">
                        @csrf

                        {{-- Client Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Client Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="client_name" placeholder="Enter client name" required>
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="client_designation" placeholder="Enter designation">
                            </div>
                        </div>

                        {{-- Ratings --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Ratings</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="client_ratings" placeholder="Enter ratings (e.g., 4.5)">
                            </div>
                        </div>

                        {{-- Review --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Review</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="client_review" placeholder="Enter client review" rows="4"></textarea>
                            </div>
                        </div>

                        {{-- Client Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Client Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="client_image" accept="image/*">
                                <img id="previewImage" src="#" alt="Preview Image" class="mt-2 border rounded d-none" width="120">
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span id="btnText">Submit</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2"></span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Image preview
    $('input[name="client_image"]').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#previewImage').attr('src', e.target.result).removeClass('d-none');
        }
        reader.readAsDataURL(this.files[0]);
    });

    // Ajax form submit
    $("#addCustomerReviewForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('reviews.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status === 'success'){
                    $("#addCustomerReviewForm")[0].reset();
                    $('#previewImage').attr('src','#').addClass('d-none');
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
