@extends('admin.dashboard')
@section('title', 'Transport Agency | Website Settings')
@section('admin_content')
<div class="page-content">
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Website Settings</h5>
                    <form id="websiteSettingForm" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Website Title -->
                        <div class="col-md-12 mb-3">
                            <label for="website_title" class="form-label">Website Title</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-globe-alt'></i></span>
                                <input type="text" name="website_title" class="form-control" id="website_title"
                                    value="{{ $websiteSetting->website_title ?? '' }}" placeholder="Website Title">
                            </div>
                        </div>

                        <!-- Website Header Logo -->
                        <div class="col-md-12 mb-3">
                            <label for="website_header_logo" class="form-label">Website Logo</label>
                            <input class="form-control" type="file" name="website_header_logo" id="website_header_logo">
                            @if($websiteSetting && $websiteSetting->website_header_logo)
                            <img id="preview_website_header_logo"
                                src="{{ asset($websiteSetting->website_header_logo ?? '') }}" alt="logo" class="mt-2"
                                width="100">
                            @endif
                        </div>

                        <!-- Favicon -->
                        <div class="col-md-12 mb-3">
                            <label for="website_favicon" class="form-label">Favicon Icon</label>
                            <input class="form-control" type="file" name="website_favicon" id="website_favicon">

                            @if($websiteSetting && $websiteSetting->website_favicon)
                            <img id="preview_website_favicon" src="{{ asset($websiteSetting->website_favicon ?? '') }}"
                                alt="favicon" class="mt-2" width="50">
                            @endif
                        </div>

                        <!-- Footer Logo -->
                        <div class="col-md-12 mb-3">
                            <label for="website_footer_logo" class="form-label">Footer Logo</label>
                            <input class="form-control" type="file" name="website_footer_logo" id="website_footer_logo">
                            @if($websiteSetting && $websiteSetting->website_footer_logo)
                            <img id="preview_website_footer_logo"
                                src="{{ asset($websiteSetting->website_footer_logo ?? '') }}" alt="footer logo"
                                class="mt-2" width="100">
                            @endif
                        </div>

                        <!-- Footer Background Image -->
                        <div class="col-md-12 mb-3">
                            <label for="website_footer_bg_image" class="form-label">Footer Background Image</label>
                            <input class="form-control" type="file" name="website_footer_bg_image"
                                id="website_footer_bg_image">
                            @if($websiteSetting && $websiteSetting->website_footer_bg_image)
                            <img id="preview_website_footer_bg_image" src="{{ asset($websiteSetting->website_footer_bg_image) }}" alt="footer bg"
                                class="mt-2" width="150">
                            @endif
                        </div>

                        <!-- Footer Background Color -->
                        <div class="col-md-12 mb-3">
                            <label for="website_footer_bg_color" class="form-label">Footer Background Color</label>
                            <div class="input-group">
                                <span class="input-group-text">HEX</span>
                                <input type="text" id="hexValue" name="website_footer_bg_color" class="form-control"
                                    value="{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}" readonly>

                                <input type="color" id="colorInput" class="d-none"
                                    value="{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}">

                                <span class="input-group-text p-0" style="width: 5%; cursor: pointer;">
                                    <div id="previewBox"
                                        style="width: 100%; height: 100%; background:{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}; border-radius: 0 0.375rem 0.375rem 0;">
                                    </div>
                                </span>
                            </div>
                        </div>

                        <!-- Website URL -->
                        <div class="col-md-12 mb-3">
                            <label for="website_website_url" class="form-label">Website Url</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-link'></i></span>
                                <input type="text" name="website_website_url" class="form-control"
                                    id="website_website_url" value="{{ $websiteSetting->website_website_url ?? ''}}"
                                    placeholder="http://devsanowr.com">
                            </div>
                        </div>

                        <!-- Email One -->
                        <div class="col-md-12 mb-3">
                            <label for="website_email_one" class="form-label">Email One</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-envelope-open'></i></span>
                                <input type="email" name="website_email_one" class="form-control" id="website_email_one"
                                    value="{{ $websiteSetting->website_email_one ?? '' }}"
                                    placeholder="example@gmail.com">
                            </div>
                        </div>

                        <!-- Email Two -->
                        <div class="col-md-12 mb-3">
                            <label for="website_email_two" class="form-label">Email Two</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-envelope-open'></i></span>
                                <input type="email" name="website_email_two" class="form-control" id="website_email_two"
                                    value="{{ $websiteSetting->website_email_two ?? ''}}"
                                    placeholder="example2@gmail.com">
                            </div>
                        </div>

                        <!-- Phone Number One -->
                        <div class="col-md-12 mb-3">
                            <label for="website_phone_number_one" class="form-label">Phone Number One</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-phone'></i></span>
                                <input type="text" name="website_phone_number_one" class="form-control"
                                    id="website_phone_number_one"
                                    value="{{ $websiteSetting->website_phone_number_one ?? ''}}"
                                    placeholder="017XXXXXXX">
                            </div>
                        </div>

                        <!-- Phone Number Two -->
                        <div class="col-md-12 mb-3">
                            <label for="website_phone_number_two" class="form-label">Phone Number Two</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-phone'></i></span>
                                <input type="text" name="website_phone_number_two" class="form-control"
                                    id="website_phone_number_two"
                                    value="{{ $websiteSetting->website_phone_number_two ?? ''}}"
                                    placeholder="016XXXXXXX">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label for="website_address" class="form-label">Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-map'></i></span>
                                <input type="text" name="website_address" class="form-control" id="website_address"
                                    value="{{ $websiteSetting->website_address ?? ''}}"
                                    placeholder="Enter address here">
                            </div>
                        </div>

                        <!-- Footer Content -->
                        <div class="col-md-12 mb-3">
                            <label for="website_footer_content" class="form-label">About (Short Content)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-edit'></i></span>
                                <textarea name="website_footer_content" class="form-control" rows="3"
                                    id="website_footer_content"
                                    placeholder="Footer content here ...">{{ $websiteSetting->website_footer_content ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Copyright Text -->
                        <div class="col-md-12 mb-3">
                            <label for="website_copyright_text" class="form-label">Copy Right Text</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bx-copyright'></i></span>
                                <input type="text" name="website_copyright_text" class="form-control"
                                    id="website_copyright_text"
                                    value="{{ $websiteSetting->website_copyright_text ?? ''}}"
                                    placeholder="Copy right text here">
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span id="btnText">Submit</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
@endsection
@push('scripts')
<script>
    const colorInput = document.getElementById('colorInput');
  const hexValue   = document.getElementById('hexValue');
  const previewBox = document.getElementById('previewBox');

  // preview box এ ক্লিক করলে hidden color picker trigger হবে
  previewBox.addEventListener('click', () => colorInput.click());

  // color change হলে HEX update হবে
  colorInput.addEventListener('input', (e) => {
    const hex = e.target.value.toUpperCase();
    hexValue.value = hex;
    previewBox.style.background = hex;
  });

  // initialize
  hexValue.value = colorInput.value.toUpperCase();
  previewBox.style.background = colorInput.value;
</script>


<script>
    $(document).ready(function() {

    $('#websiteSettingForm').on('submit', function(e) {
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        let $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true);
        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');

        $.ajax({
            url: "{{ route('admin.website.setting.update') }}", // Laravel route
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Ensure CSRF token is included
            },
            success: function(response) {
                $submitBtn.prop('disabled', false);
                $('#btnText').text('Submit');
                $('#btnSpinner').addClass('d-none');

                if (response.status === 'success') {
                    toastr.success(response.message);

                    if (response.data) {
                        if(response.data.website_header_logo){
                            $('#preview_website_header_logo').attr('src', response.data.website_header_logo + '?t=' + new Date().getTime());
                        }
                        if(response.data.website_favicon){
                            $('#preview_website_favicon').attr('src', response.data.website_favicon + '?t=' + new Date().getTime());
                        }
                        if(response.data.website_footer_logo){
                            $('#preview_website_footer_logo').attr('src', response.data.website_footer_logo + '?t=' + new Date().getTime());
                        }
                        if(response.data.website_footer_bg_image){
                            $('#preview_website_footer_bg_image').attr('src', response.data.website_footer_bg_image + '?t=' + new Date().getTime());
                        }
                    }

                } else {
                    toastr.error(response.message || 'An error occurred.');
                }
            },

            error: function(xhr) {
                $submitBtn.prop('disabled', false);
                $('#btnText').text('Submit');
                $('#btnSpinner').addClass('d-none');

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, messages) {
                        toastr.error(messages[0]); // Show first error message per field
                    });
                } else {
                    toastr.error(xhr.responseJSON?.message || 'Something went wrong!');
                }
            }
        });

    });

});
</script>




@endpush
