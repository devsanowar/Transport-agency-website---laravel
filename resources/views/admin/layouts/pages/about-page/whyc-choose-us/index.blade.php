@extends('admin.layouts.app')
@section('title', 'Edit Why Choose Us')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Edit Why Choose Us</h5>
                        <a href="{{ route('why-choose-features.index') }}" class="btn btn-outline-primary px-4 rounded-0">Add
                            Feature</a>
                    </div>
                </div>

                <div class="card-body">
                    <form id="editWhyChooseUsForm">
                        @csrf
                        @method('PUT')

                        {{-- Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="why_choose_us_title" class="form-control"
                                    value="{{ old('why_choose_us_title', $why->why_choose_us_title) }}"
                                    placeholder="Enter title" required>
                            </div>
                        </div>

                        {{-- Subtitle --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Subtitle</label>
                            <div class="col-sm-9">
                                <input type="text" name="why_choose_us_subtitle" class="form-control"
                                    value="{{ old('why_choose_us_subtitle', $why->why_choose_us_subtitle) }}"
                                    placeholder="Enter subtitle">
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="why_choose_us_description" class="form-control" rows="4"
                                    placeholder="Enter description">{{ old('why_choose_us_description', $why->why_choose_us_description) }}</textarea>
                            </div>
                        </div>

                        {{-- Button Text --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Button Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="why_choose_us_button_text" class="form-control"
                                    value="{{ old('why_choose_us_button_text', $why->why_choose_us_button_text) }}"
                                    placeholder="Enter button text">
                            </div>
                        </div>

                        {{-- Button Link --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Button Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="why_choose_us_button_link" class="form-control"
                                    value="{{ old('why_choose_us_button_link', $why->why_choose_us_button_link) }}"
                                    placeholder="Enter button link">
                            </div>
                        </div>

                        {{-- background Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Background Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="why_choose_us_bg_image" class="form-control">
                                @if(!empty($why->why_choose_us_bg_image))
                                <img id="previewBackgroundImage" src="{{ asset($why->why_choose_us_bg_image) }}"
                                    alt="background Image" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Background Overlay image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Bacground Overlay image</label>
                            <div class="col-sm-9">
                                <input type="file" name="why_choose_us_shape_image" class="form-control">
                                @if(!empty($why->why_choose_us_shape_image))
                                <img id="previewShapeImage" src="{{ asset($why->why_choose_us_shape_image) }}"
                                    alt="Shape Image" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- About Image Two --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Why Choose Us Truck Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="why_choose_us_truck_image" class="form-control">
                                @if(!empty($why->why_choose_us_truck_image))
                                <img id="previewTruckImage" src="{{ asset($why->why_choose_us_truck_image) }}"
                                    alt="truck Image Two" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end gap-3">
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
    $("#editWhyChooseUsForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('why-choose-us.update') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status === 'success'){
                    if(response.images.why_choose_us_bg_image){
                            $('#previewBackgroundImage').attr('src', response.images.why_choose_us_bg_image);
                        }
                        if(response.images.why_choose_us_shape_image){
                            $('#previewShapeImage').attr('src', response.images.why_choose_us_shape_image);
                        }
                        if(response.images.why_choose_us_truck_image){
                            $('#previewTruckImage').attr('src', response.images.why_choose_us_truck_image);
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
                $('#btnText').text('Update');
                $('#btnSpinner').addClass('d-none');
                $('#submitBtn').prop('disabled', false);
            }
        });
    });
});
</script>
@endpush
