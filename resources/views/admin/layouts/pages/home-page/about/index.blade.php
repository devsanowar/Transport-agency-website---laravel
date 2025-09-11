@extends('admin.layouts.app')
@section('title', 'About | Home')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Update About</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form id="editHomeAboutForm" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Tagline --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Tagline</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tagline" value="{{ $about->tagline }}"
                                    placeholder="Enter tagline (e.g. ABOUT US)">
                            </div>
                        </div>

                        {{-- Title Main --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Main Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title_main"
                                    value="{{ $about->title_main }}" placeholder="Enter main title">
                            </div>
                        </div>

                        {{-- Title Highlight --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Highlight Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title_highlight"
                                    value="{{ $about->title_highlight }}" placeholder="Enter highlight part of title">
                            </div>
                        </div>

                        {{-- Description One --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description One</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description_one" rows="3"
                                    placeholder="Enter first description">{{ old('description_one', $about->description_one) }}</textarea>
                            </div>
                        </div>

                        {{-- Description Two --}}
                        {{-- <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description Two</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description_two" rows="3"
                                    placeholder="Enter second description">{{ old('description_two', $about->description_two) }}</textarea>
                            </div>
                        </div> --}}

                        {{-- Counter --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Counter Number</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="counter_number"
                                    value="{{ $about->counter_number }}" placeholder="e.g. 25">
                            </div>
                            <label class="col-sm-2 col-form-label">Counter Label</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="counter_label"
                                    value="{{ $about->counter_label }}" placeholder="e.g. Years Of Experience">
                            </div>
                        </div>

                        {{-- Progress One --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Progress One Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="progress_one_title"
                                    value="{{ $about->progress_one_title }}" placeholder="e.g. Supper Fast Delivery">
                            </div>
                            <label class="col-sm-2 col-form-label">Value (%)</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="progress_one_value"
                                    value="{{ $about->progress_one_value }}" placeholder="e.g. 95">
                            </div>
                        </div>

                        {{-- Progress Two --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Progress Two Title</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="progress_two_title"
                                    value="{{ $about->progress_two_title }}" placeholder="e.g. Customer Satisfied">
                            </div>
                            <label class="col-sm-2 col-form-label">Value (%)</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="progress_two_value"
                                    value="{{ $about->progress_two_value }}" placeholder="e.g. 97">
                            </div>
                        </div>

                        {{-- Points --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Point One</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="point_one" value="{{ $about->point_one }}"
                                    placeholder="e.g. Safety And Reliability">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Point Two</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="point_two" value="{{ $about->point_two }}"
                                    placeholder="e.g. End-to-End Transportation">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Point Three</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="point_three"
                                    value="{{ $about->point_three }}" placeholder="e.g. Warehousing & Distribution">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Point Four</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="point_four"
                                    value="{{ $about->point_four }}" placeholder="e.g. Fast Transportation">
                            </div>
                        </div>

                        {{-- Button --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Button Text</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="button_text"
                                    value="{{ $about->button_text }}" placeholder="e.g. Read More">
                            </div>
                            <label class="col-sm-2 col-form-label">Button Link</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="button_link"
                                    value="{{ $about->button_link }}" placeholder="e.g. about.html">
                            </div>
                        </div>

                        {{-- Author --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Author Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="author_name"
                                    value="{{ $about->author_name }}" placeholder="e.g. Dainel Brain">
                            </div>
                            <label class="col-sm-2 col-form-label">Designation</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="author_designation"
                                    value="{{ $about->author_designation }}" placeholder="e.g. Co-Founder">
                            </div>
                        </div>

                        {{-- Author Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Author Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="author_image">
                                @if(!empty($about->author_image))
                                <img id="previewAuthorImage" src="{{ asset($about->author_image) }}" alt="Author Image"
                                    class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Video Link --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Video Link</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="video_link"
                                    value="{{ $about->video_link }}" placeholder="Enter YouTube video link">
                            </div>
                        </div>

                        {{-- Images --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Main Image One</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image_one">
                                @if(!empty($about->image_one))
                                <img id="previewImageOne" src="{{ asset($about->image_one) }}"
                                    class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Main Image Two</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image_two">
                                @if(!empty($about->image_two))
                                <img id="previewImageTwo" src="{{ asset($about->image_two) }}"
                                    class="mt-2 border rounded" width="120">
                                @endif
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
<script src="{{ asset('backend') }}/assets/js/sweetalert2.js"></script>

<script>
    $(document).ready(function(){
        $("#editHomeAboutForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            // Spinner show
            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('home-about.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        if(response.images.image_one){
                            $('#previewImageOne').attr('src', response.images.image_one);
                        }
                        if(response.images.image_two){
                            $('#previewImageTwo').attr('src', response.images.image_two);
                        }
                        if(response.images.author_image){
                            $('#previewAuthorImage').attr('src', response.images.author_image);
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
