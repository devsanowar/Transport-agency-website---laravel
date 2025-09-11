@extends('admin.layouts.app')
@section('title', 'Create Service')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Create Service</h5>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-primary px-5 rounded-0">All
                            Services</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="addServiceForm" enctype="multipart/form-data">
                        @csrf

                        {{-- Service Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Service Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_title"
                                    placeholder="Enter Service Title">
                            </div>
                        </div>

                        {{-- Service Short Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="service_short_description"
                                    placeholder="Enter Short Description"></textarea>
                            </div>
                        </div>

                        {{-- Service Long Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="service_long_description"
                                    placeholder="Enter Long Description"></textarea>
                            </div>
                        </div>

                        {{-- Service Features (JSON array) --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Service Features</h6>
                        <div id="featureWrapper">
                            <div class="row mb-3 featureRow">
                                <label class="col-sm-3 col-form-label">Features</label>
                                <div class="col-sm-9 d-flex">
                                    <input type="text" class="form-control me-2" name="service_features[]"
                                        placeholder="Feature 1">
                                    <button type="button" class="btn btn-success addFeatureBtn"><i class='bx bx-plus-circle' style="margin-right: 0px;"></i> </button>
                                </div>
                            </div>
                        </div>

                        {{-- Thumbnail --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Thumbnail Image (Max-size: 200kb)</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_thumbnail">
                            </div>
                        </div>

                        {{-- Single Page Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Single Page Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_single_page_image">
                            </div>
                        </div>

                        {{-- Feature Images --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Service Feature Details</h6>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_feature_title"
                                    placeholder="Feature Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="service_feature_description"
                                    placeholder="Feature Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_feature_image">
                            </div>
                        </div>

                        {{-- Feature 2 --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_featuretwo_title"
                                    placeholder="Feature 2 Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="service_featuretwo_description"
                                    placeholder="Feature 2 Description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_featuretwo_image">
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- SEO Fields --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title" placeholder="SEO Title">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    placeholder="keyword1, keyword2">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" rows="3"
                                    placeholder="SEO Description"></textarea>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end gap-3">
                                    <a href="{{ route('services.index') }}"
                                        class="btn btn-outline-primary px-4 rounded-0">
                                        Back</a>
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Submit</span>
                                        <span id="btnSpinner"
                                            class="spinner-border spinner-border-sm d-none ms-2"></span>
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
    $("#addServiceForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('services.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $("#addServiceForm")[0].reset();
                if(response.status === 'success'){
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


<script>
$(document).ready(function(){
    let featureCount = 1;

    // Add new feature input
    $(document).on('click', '.addFeatureBtn', function(){
        featureCount++;
        let html = `
        <div class="row mb-3 featureRow">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 d-flex">
                <input type="text" class="form-control me-2" name="service_features[]" placeholder="Feature ${featureCount}">
                <button type="button" class="btn btn-danger removeFeatureBtn"><i class='bx  bx-trash-alt' style="margin-right:0px"></i></button>
            </div>
        </div>
        `;
        $('#featureWrapper').append(html);
    });

    // Remove dynamically added feature input
    $(document).on('click', '.removeFeatureBtn', function(){
        $(this).closest('.featureRow').remove();
    });
});
</script>

@endpush
