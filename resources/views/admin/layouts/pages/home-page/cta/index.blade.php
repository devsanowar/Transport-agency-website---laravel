@extends('admin.layouts.app')
@section('title', 'Edit CTA')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Edit CTA (Call To Action)</h5>
                    </div>
                </div>
                <div class="card-body">
                    <form id="editCtaForm">
                        @csrf
                        @method('PUT')

                        {{-- CTA Content --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">CTA Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="cta_content"
                                    placeholder="Enter CTA Content">{{ old('cta_content', $cta->cta_content) }}</textarea>
                            </div>
                        </div>

                        {{-- CTA Phone --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">CTA Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cta_phone"
                                    value="{{ old('cta_phone', $cta->cta_phone) }}" placeholder="Enter phone number">
                            </div>
                        </div>

                        {{-- CTA Email --}}
                        {{-- <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">CTA Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="cta_email"
                                    value="{{ old('cta_email', $cta->cta_email) }}" placeholder="Enter email address">
                            </div>
                        </div> --}}

                        {{-- CTA Button Text --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">CTA Button Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cta_button"
                                    value="{{ old('cta_button', $cta->cta_button) }}" placeholder="Enter button text">
                            </div>
                        </div>

                        {{-- CTA Button URL --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">CTA Button URL</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="cta_button_url"
                                    value="{{ old('cta_button_url', $cta->cta_button_url) }}"
                                    placeholder="https://example.com">
                            </div>
                        </div>

                        {{-- CTA Background Image --}}
                        <div class="row mb-3" style="margin-top:60px">
                            <label class="col-sm-3 col-form-label">CTA Background Image (Max-size: 200kb)</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="cta_bg_image">
                                @if(!empty($cta->cta_bg_image))
                                <img id="previewImage" src="{{ asset($cta->cta_bg_image) }}" alt="CTA Background Image"
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
<script>
    $(document).ready(function(){
        $("#editCtaForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            // Spinner show
            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('cta.update') }}",
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
