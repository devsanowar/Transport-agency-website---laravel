@extends('admin.layouts.app')
@section('title', 'Edit About Section')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit About Section</h5>
                </div>
                <div class="card-body">
                    <form id="editAboutForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Tag Line --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Tag Line</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_tag_line" class="form-control"
                                    value="{{ old('about_tag_line', $about->about_tag_line) }}"
                                    placeholder="Enter tag line">
                            </div>
                        </div>

                        {{-- Section Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Section Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_section_title" class="form-control"
                                    value="{{ old('about_section_title', $about->about_section_title) }}"
                                    placeholder="Enter section title" required>
                            </div>
                        </div>

                        {{-- Section Highlight Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Highlight Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_section_highlight_title" class="form-control"
                                    value="{{ old('about_section_highlight_title', $about->about_section_highlight_title) }}"
                                    placeholder="Enter highlight title">
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="about_description" class="form-control" rows="4" placeholder="Enter description">{{ old('about_description', $about->about_description) }}</textarea>
                            </div>
                        </div>

                        {{-- Founder Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Founder Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_founder_name" class="form-control"
                                    value="{{ old('about_founder_name', $about->about_founder_name) }}"
                                    placeholder="Enter founder name">
                            </div>
                        </div>

                        {{-- Founder Designation --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Founder Designation</label>
                            <div class="col-sm-9">
                                <input type="text" name="about_founder_designation" class="form-control"
                                    value="{{ old('about_founder_designation', $about->about_founder_designation) }}"
                                    placeholder="Enter designation">
                            </div>
                        </div>

                        {{-- Founder Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Founder Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="about_founder_founder_image" class="form-control">
                                @if(!empty($about->about_founder_founder_image))
                                    <img id="founderImage" src="{{ asset($about->about_founder_founder_image) }}"
                                        alt="Founder Image" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- About Image One --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About Image One</label>
                            <div class="col-sm-9">
                                <input type="file" name="about_image" class="form-control">
                                @if(!empty($about->about_image))
                                    <img id="about_image" src="{{ asset($about->about_image) }}"
                                        alt="About Image One" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- About Image Two --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About Image Two</label>
                            <div class="col-sm-9">
                                <input type="file" name="about_imageTwo" class="form-control">
                                @if(!empty($about->about_imageTwo))
                                    <img id="aboutImageTwo" src="{{ asset($about->about_imageTwo) }}"
                                        alt="About Image Two" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- --- SEO Fields --- --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>

                        {{-- Meta Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $about->meta_title }}" placeholder="SEO title">
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ $about->meta_keywords }}" placeholder="keyword1, keyword2">
                            </div>
                        </div>

                        {{-- Meta Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" rows="3"
                                    placeholder="SEO description">{{ $about->meta_description }}</textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Update</span>
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
        $("#editAboutForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('about_page.about.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        if(response.images.about_founder_founder_image){
                            $('#founderImage').attr('src', response.images.about_founder_founder_image);
                        }
                        if(response.images.about_image){
                            $('#about_image').attr('src', response.images.about_image);
                        }
                        if(response.images.about_imageTwo){
                            $('#aboutImageTwo').attr('src', response.images.about_imageTwo);
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
