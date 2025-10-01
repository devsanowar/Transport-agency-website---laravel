@extends('admin.layouts.app')
@section('title', 'Edit Service')
@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    .saanno-features {
        margin-left: 25%;
    }

    @media only screen and (max-width: 600px) {
        .saanno-features {
            margin-left: unset;
        }
    }
</style>
@endpush
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Edit Service</h5>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-primary px-3 rounded-0">All
                            Services</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="editServiceForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Service Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Service Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_title"
                                    value="{{ old('service_title', $service->service_title) }}"
                                    placeholder="Enter Service Title">
                            </div>
                        </div>

                        {{-- Short Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="service_short_description"
                                    placeholder="Enter Short Description">{!! $service->service_short_description !!}</textarea>
                            </div>
                        </div>

                        {{-- Long Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Long Description</label>
                            <div class="col-sm-9">
                                <div id="editor" style="height: 300px;">
                                    {!! $service->service_long_description !!}
                                </div>
                                <input type="hidden" name="service_long_description" id="hiddenDescription">
                            </div>


                        </div>

                        {{-- Service Features --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Service Features</h6>
                        <div id="featureWrapper">
                            @php
                            $features = $service->service_features ?? [];
                            @endphp

                            @forelse($features as $index => $feature)
                            <div class="row mb-3 featureRow">
                                <div class="col-sm-3 {{ $loop->first ? '' : 'd-none' }}">
                                    <label class="col-form-label">Features</label>
                                </div>

                                <div class="col-sm-9 saanno-features d-flex">
                                    <input type="text" class="form-control me-2" name="service_features[]"
                                        value="{{ $feature }}" placeholder="Feature {{ $loop->iteration }}">
                                    @if($loop->first)
                                    <button type="button" class="btn btn-success addFeatureBtn">Add</button>
                                    @else
                                    <button type="button" class="btn btn-danger removeFeatureBtn">Delete</button>
                                    @endif
                                </div>
                            </div>
                            @empty
                            <div class="row mb-3 featureRow">
                                <label class="col-sm-3 col-form-label">Features</label>
                                <div class="col-sm-9 d-flex">
                                    <input type="text" class="form-control me-2" name="service_features[]"
                                        placeholder="Feature 1">
                                    <button type="button" class="btn btn-success addFeatureBtn">Add</button>
                                </div>
                            </div>
                            @endforelse
                        </div>

                        {{-- Thumbnail --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Thumbnail Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_thumbnail">
                                @if($service->service_thumbnail)
                                <img id="previewThumbnail" class="mt-2" src="{{ asset($service->service_thumbnail) }}"
                                    width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Single Page Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Single Page Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_single_page_image">
                                @if($service->service_single_page_image)
                                <img id="previewSinglePage" class="mt-2"
                                    src="{{ asset($service->service_single_page_image) }}" class="mt-2 border rounded"
                                    width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Feature 1 --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Service Feature Details</h6>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_feature_title"
                                    value="{{ old('service_feature_title', $service->service_feature_title) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"
                                    name="service_feature_description">{{ old('service_feature_description', $service->service_feature_description) }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_feature_image">
                                @if($service->service_feature_image)
                                <img id="previewFeature" class="mt-2" src="{{ asset($service->service_feature_image) }}"
                                    class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Feature 2 --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="service_featuretwo_title"
                                    value="{{ old('service_featuretwo_title', $service->service_featuretwo_title) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"
                                    name="service_featuretwo_description">{{ old('service_featuretwo_description', $service->service_featuretwo_description) }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature 2 Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="service_featuretwo_image">
                                @if($service->service_featuretwo_image)
                                <img class="mt-2" id="previewFeatureTwo"
                                    src="{{ asset($service->service_featuretwo_image) }}" class="mt-2 border rounded"
                                    width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- SEO --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ old('meta_title', optional($service->seo)->meta_title) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ old('meta_keywords', optional($service->seo)->meta_keywords) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description"
                                    rows="3">{{ old('meta_description', optional($service->seo)->meta_description) }}</textarea>
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

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Safely set existing content
    quill.root.innerHTML = @json($service->service_long_description);

    // Form submit
    document.getElementById('editServiceForm').addEventListener('submit', function(e) {
        document.getElementById('hiddenDescription').value = quill.root.innerHTML;
    });
</script>


<script>
    $(document).ready(function(){
    $("#editServiceForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('services.update', $service->id) }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status === 'success'){
                    toastr.success(response.message);

                    // 🔥 Realtime preview update
                    if(response.data.service_thumbnail){
                        $('#previewThumbnail').attr('src', response.data.service_thumbnail);
                    }
                    if(response.data.service_single_page_image){
                        $('#previewSinglePage').attr('src', response.data.service_single_page_image);
                    }
                    if(response.data.service_feature_image){
                        $('#previewFeature').attr('src', response.data.service_feature_image);
                    }
                    if(response.data.service_featuretwo_image){
                        $('#previewFeatureTwo').attr('src', response.data.service_featuretwo_image);
                    }

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


    // Dynamic features
    let featureCount = {{ count($features) ?: 1 }};
    $(document).on('click', '.addFeatureBtn', function(){
        featureCount++;
        let html = `
        <div class="row mb-3 featureRow">
            <div class="col-sm-3"></div>
            <div class="col-sm-9 d-flex">
                <input type="text" class="form-control me-2" name="service_features[]" placeholder="Feature ${featureCount}">
                <button type="button" class="btn btn-danger removeFeatureBtn">Delete</button>
            </div>
        </div>`;
        $('#featureWrapper').append(html);
    });

    $(document).on('click', '.removeFeatureBtn', function(){
        $(this).closest('.featureRow').remove();
    });
});
</script>
@endpush
