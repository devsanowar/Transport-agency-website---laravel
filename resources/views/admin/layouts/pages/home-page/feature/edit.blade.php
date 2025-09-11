@extends('admin.layouts.app')
@section('title', 'Edit Feature')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Edit Feature</h5>
                        <a href="{{ route('feature.index') }}" class="btn btn-outline-primary px-5 rounded-0">All
                            Feature</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="editFeatureForm">
                        @csrf
                        @method('PUT')

                        {{-- feature Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="feature_title"
                                    value="{{ $feature->feature_title }}" placeholder="Enter Feature Title">
                            </div>
                        </div>


                        {{-- Content --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Contents</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="feature_content"
                                    placeholder="Enter feature contents">{{ old('feature_content', $feature->feature_content) }}</textarea>
                            </div>
                        </div>

                        {{-- Thumbnail --}}
                        <div class="row mb-3" style="margin-top:60px">
                            <label class="col-sm-3 col-form-label">Feature Image (Max-size: 200kb)</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="feature_image">

                                @if(!empty($feature->feature_image))
                                <img id="previewImage" src="{{ asset($feature->feature_image) }}" alt="Feature Image"
                                    class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Feature order by --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Order By</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="order_by"
                                    value="{{ $feature->order_by }}" placeholder="Edit Order By ">
                            </div>
                        </div>


                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1" {{ $feature->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $feature->status == 0 ? 'selected' : '' }}>DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- --- SEO Fields --- --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>

                        {{-- Meta Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $feature->meta_title }}" placeholder="SEO title">
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ $feature->meta_keywords }}" placeholder="keyword1, keyword2">
                            </div>
                        </div>

                        {{-- Meta Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" rows="3"
                                    placeholder="SEO description">{{ $feature->meta_description }}</textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Update</span>
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
        $("#editFeatureForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            // Spinner show
            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('feature.update', $feature->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        if (response.image) {
                            $('#previewImage').attr('src', response.image);
                        }
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
                    // Spinner hide
                    $('#btnText').text('Update');
                    $('#btnSpinner').addClass('d-none');
                    $('#submitBtn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
