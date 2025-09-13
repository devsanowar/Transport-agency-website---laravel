@extends('admin.layouts.app')
@section('title', 'Create Brand')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Brand</h5>
                    <a href="{{ route('brands.index') }}" class="btn btn-primary btn-sm"> All Brands</a>
                </div>

                <div class="card-body">
                    <form id="createBrandForm" enctype="multipart/form-data">
                        @csrf

                        {{-- Brand Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="brand_name" placeholder="Enter brand name" required>
                            </div>
                        </div>

                        {{-- Brand Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Brand Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="brand_image" accept="image/*">
                                <img id="previewImage" src="#" alt="Preview Image" class="mt-2 border rounded d-none" width="120">
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-select">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4 rounded-0" id="submitBtn">
                                        <span id="btnText">Save</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2"></span>
                                    </button>
                                </div>
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
    $(document).ready(function(){
        // image preview
        $('input[name="brand_image"]').on('change', function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#previewImage').attr('src', e.target.result).removeClass('d-none');
            }
            reader.readAsDataURL(this.files[0]);
        });

        $("#createBrandForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $('#btnText').text('Saving...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('brands.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        toastr.success(response.message);
                        $('#createBrandForm')[0].reset();
                        $('#previewImage').addClass('d-none');
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
                    $('#btnText').text('Save');
                    $('#btnSpinner').addClass('d-none');
                    $('#submitBtn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
