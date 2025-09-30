@extends('admin.dashboard')
@section('title', 'Transport Agency | Website Settings')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css" />

<style>
    .image-wrapper {
        position: relative;
        display: inline-block;
    }

    .delete-icon {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        border-radius: 50%;
        padding: 3px 6px;
        cursor: pointer;
        font-size: 14px;
    }
</style>
@endpush
@section('admin_content')
<div class="page-content">
    <!--end breadcrumb-->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-website-settings"
                                role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx  bx-cog font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Website Settings</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#website-color-settings" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx  bx-color-fill font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Website Color Settings</div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#header-breadcrumb" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx  bx-captions font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Website Breadcrumb</div>
                                </div>
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="primary-pills-website-settings" role="tabpanel">
                            <form id="websiteSettingForm" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Website Title -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_title" class="form-label">Website Title</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-globe-alt'></i></span>
                                        <input type="text" name="website_title" class="form-control" id="website_title"
                                            value="{{ $websiteSetting->website_title ?? '' }}"
                                            placeholder="Website Title">
                                    </div>
                                </div>

                                <!-- Website Header Logo -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_header_logo" class="form-label">Website Logo</label>
                                    <input class="form-control" type="file" name="website_header_logo"
                                        id="website_header_logo">
                                    @if($websiteSetting && $websiteSetting->website_header_logo)
                                    <img id="preview_website_header_logo"
                                        src="{{ asset($websiteSetting->website_header_logo ?? '') }}" alt="logo"
                                        class="mt-2" width="100">
                                    @endif
                                </div>

                                <!-- Favicon -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_favicon" class="form-label">Favicon Icon</label>
                                    <input class="form-control" type="file" name="website_favicon" id="website_favicon">

                                    @if($websiteSetting && $websiteSetting->website_favicon)
                                    <img id="preview_website_favicon"
                                        src="{{ asset($websiteSetting->website_favicon ?? '') }}" alt="favicon"
                                        class="mt-2" width="50">
                                    @endif
                                </div>

                                <!-- Footer Logo -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_footer_logo" class="form-label">Footer Logo</label>
                                    <input class="form-control" type="file" name="website_footer_logo"
                                        id="website_footer_logo">
                                    @if($websiteSetting && $websiteSetting->website_footer_logo)
                                    <img id="preview_website_footer_logo"
                                        src="{{ asset($websiteSetting->website_footer_logo ?? '') }}" alt="footer logo"
                                        class="mt-2" width="100">
                                    @endif
                                </div>

                                <!-- Footer Background Image -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_footer_bg_image" class="form-label">Footer Background
                                        Image</label>
                                    <input class="form-control" type="file" name="website_footer_bg_image"
                                        id="website_footer_bg_image">
                                    @if($websiteSetting && $websiteSetting->website_footer_bg_image)
                                    <img id="preview_website_footer_bg_image"
                                        src="{{ asset($websiteSetting->website_footer_bg_image) }}" alt="footer bg"
                                        class="mt-2" width="150">
                                    @endif
                                </div>

                                <!-- Footer Background Color -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_footer_bg_color" class="form-label">Footer Background
                                        Color</label>
                                    <div class="input-group">
                                        <span class="input-group-text">HEX</span>
                                        <input type="text" id="hexValue" name="website_footer_bg_color"
                                            class="form-control"
                                            value="{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}"
                                            readonly>

                                        <input type="color" id="colorInput" class="d-none"
                                            value="{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}">

                                        <span class="input-group-text p-0" style="width: 5%; cursor: pointer;">
                                            <div id="previewBox"
                                                style="width: 100%; height: 100%; background:{{ $websiteSetting->website_footer_bg_color ?? '#FFFFFF' }}; border-radius: 0 0.375rem 0.375rem 0;">
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <h6 class="mb-3 mt-4 text-uppercase">Contact Information</h6>

                                <div class="col-md-12 mb-3">
                                    <label for="working_hour" class="form-label">Working Hour</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-time'></i></span>
                                        <input type="text" name="working_hour" class="form-control"
                                            id="working_hour"
                                            value="{{ $websiteSetting->working_hour ?? ''}}"
                                            placeholder="Working hour here">
                                    </div>
                                </div>

                                <!-- Website URL -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_website_url" class="form-label">Website Url</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-link'></i></span>
                                        <input type="text" name="website_website_url" class="form-control"
                                            id="website_website_url"
                                            value="{{ $websiteSetting->website_website_url ?? ''}}"
                                            placeholder="http://devsanowr.com">
                                    </div>
                                </div>

                                <!-- Email One -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_email_one" class="form-label">Email One</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-envelope-open'></i></span>
                                        <input type="email" name="website_email_one" class="form-control"
                                            id="website_email_one"
                                            value="{{ $websiteSetting->website_email_one ?? '' }}"
                                            placeholder="example@gmail.com">
                                    </div>
                                </div>

                                <!-- Email Two -->
                                <div class="col-md-12 mb-3">
                                    <label for="website_email_two" class="form-label">Email Two</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class='bx bx-envelope-open'></i></span>
                                        <input type="email" name="website_email_two" class="form-control"
                                            id="website_email_two" value="{{ $websiteSetting->website_email_two ?? ''}}"
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
                                        <input type="text" name="website_address" class="form-control"
                                            id="website_address" value="{{ $websiteSetting->website_address ?? ''}}"
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
                                            <span id="btnSpinner" class="spinner-border spinner-border-sm d-none"
                                                role="status" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="website-color-settings" role="tabpanel">
                            <form id="websiteColorsForm">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Fonts -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Primary Font</label>
                                        <input type="text" class="form-control" name="font_primary"
                                            value='"Poppins", sans-serif'>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Font</label>
                                        <input type="text" class="form-control" name="font_secondary"
                                            value='"Rubik", sans-serif'>
                                    </div>

                                    <!-- Gray -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gray Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="grayHex" name="gray"
                                                value="#585b6b">
                                            <input type="color" id="grayHexPicker" value="#585b6b"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gray Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="grayRgb" name="gray_rgb"
                                                value="88, 91, 107">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="grayRgbBtn">🎨</button>
                                            <input type="color" id="grayRgbPicker" style="display:none;">
                                        </div>
                                    </div>

                                    <!-- Base -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Base Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="baseHex" name="base"
                                                value="#FD5523">
                                            <input type="color" id="baseHexPicker" value="#FD5523"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Base Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="baseRgb" name="base_rgb"
                                                value="253, 85, 35">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="baseRgbBtn">🎨</button>
                                            <input type="color" id="baseRgbPicker" style="display:none;">
                                        </div>
                                    </div>

                                    <!-- Primary -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Primary Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="primaryHex" name="primary"
                                                value="#F4F5F9">
                                            <input type="color" id="primaryHexPicker" value="#F4F5F9"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Primary Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="primaryRgb" name="primary_rgb"
                                                value="244, 245, 249">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="primaryRgbBtn">🎨</button>
                                            <input type="color" id="primaryRgbPicker" style="display:none;">
                                        </div>
                                    </div>

                                    <!-- Black -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Black Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="blackHex" name="black"
                                                value="#062f3a">
                                            <input type="color" id="blackHexPicker" value="#062f3a"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Black Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="blackRgb" name="black_rgb"
                                                value="6, 47, 58">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="blackRgbBtn">🎨</button>
                                            <input type="color" id="blackRgbPicker" style="display:none;">
                                        </div>
                                    </div>

                                    <!-- White -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">White Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="whiteHex" name="white"
                                                value="#ffffff">
                                            <input type="color" id="whiteHexPicker" value="#ffffff"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">White Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="whiteRgb" name="white_rgb"
                                                value="255, 255, 255">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="whiteRgbBtn">🎨</button>
                                            <input type="color" id="whiteRgbPicker" style="display:none;">
                                        </div>
                                    </div>

                                    <!-- Border -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Border Color (HEX)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="borderHex" name="border_color"
                                                value="#e6e6e6">
                                            <input type="color" id="borderHexPicker" value="#e6e6e6"
                                                style="width:40px;height:38px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Border Color (RGB)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="borderRgb"
                                                name="border_color_rgb" value="230, 230, 230">
                                            <button type="button" class="btn btn-outline-secondary"
                                                id="borderRgbBtn">🎨</button>
                                            <input type="color" id="borderRgbPicker" style="display:none;">
                                        </div>
                                    </div>


                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <span id="colorBtnText">Submit</span>
                                        <span id="colorBtnSpinner" class="spinner-border spinner-border-sm d-none"
                                            role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>

                        </div>

                        <div class="tab-pane fade" id="header-breadcrumb" role="tabpanel">

                            <form id="updateBreadcrumbForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Background Image --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Background Image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="breadcrumb_bg_image" type="file">
                                        <div class="image-wrapper mt-2" id="bgWrapper"
                                            style="{{ $breadcrumb->breadcrumb_bg_image ? '' : 'display:none;' }}">
                                            <span class="delete-icon" data-target="bgPreview">✖</span>
                                            <img id="bgPreview"
                                                src="{{ $breadcrumb->breadcrumb_bg_image ? asset($breadcrumb->breadcrumb_bg_image) : '' }}"
                                                width="200">
                                        </div>
                                    </div>
                                </div>

                                {{-- Header Image --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Header Image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="page_header_image" type="file">
                                        <div class="image-wrapper mt-2" id="headerWrapper"
                                            style="{{ $breadcrumb->page_header_image ? '' : 'display:none;' }}">
                                            <span class="delete-icon" data-target="headerPreview">✖</span>
                                            <img id="headerPreview"
                                                src="{{ $breadcrumb->page_header_image ? asset($breadcrumb->page_header_image) : '' }}"
                                                width="200">
                                        </div>
                                    </div>
                                </div>

                                {{-- Container Image --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Container Image</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="container_box_image" type="file">
                                        <div class="image-wrapper mt-2" id="containerWrapper"
                                            style="{{ $breadcrumb->container_box_image ? '' : 'display:none;' }}">
                                            <span class="delete-icon" data-target="containerPreview">✖</span>
                                            <img id="containerPreview"
                                                src="{{ $breadcrumb->container_box_image ? asset($breadcrumb->container_box_image) : '' }}"
                                                width="200">
                                        </div>
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" name="status">
                                            <option value="1" {{ $breadcrumb->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="2" {{ $breadcrumb->status == 2 ? 'selected' : '' }}>DeActive
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary px-4">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
</div>
@endsection
@push('scripts')

<script>
document.addEventListener("DOMContentLoaded", function() {
    // HEX ↔ Color Picker Sync
    function bindHexColorSync(hexInputId, colorPickerId) {
        const hexInput = document.getElementById(hexInputId);
        const colorPicker = document.getElementById(colorPickerId);

        if (!hexInput || !colorPicker) return;

        // Color Picker → Hex Input
        colorPicker.addEventListener("input", function () {
            hexInput.value = this.value;
        });

        // Hex Input → Color Picker
        hexInput.addEventListener("input", function () {
            const val = this.value;
            if (/^#([0-9A-F]{3}){1,2}$/i.test(val)) { // valid hex
                colorPicker.value = val;
            }
        });
    }

    // RGB ↔ Color Picker Sync
    function bindRgbColorSync(rgbInputId, colorPickerId, buttonId) {
        const rgbInput = document.getElementById(rgbInputId);
        const colorPicker = document.getElementById(colorPickerId);
        const btn = document.getElementById(buttonId);

        if (!rgbInput || !colorPicker) return;

        // Button click → open color picker
        btn.addEventListener("click", () => colorPicker.click());

        // Color Picker → RGB Input
        colorPicker.addEventListener("input", function () {
            const hex = this.value;
            const rgb = hexToRgb(hex);
            rgbInput.value = `${rgb.r}, ${rgb.g}, ${rgb.b}`;
        });

        // RGB Input → Color Picker
        rgbInput.addEventListener("input", function () {
            const rgb = this.value.split(",").map(n => parseInt(n.trim()));
            if (rgb.length === 3 && rgb.every(n => !isNaN(n) && n >= 0 && n <= 255)) {
                const hex = rgbToHex(rgb[0], rgb[1], rgb[2]);
                colorPicker.value = hex;
            }
        });
    }

    // Helper: HEX → RGB
    function hexToRgb(hex) {
        hex = hex.replace(/^#/, "");
        if (hex.length === 3) {
            hex = hex.split("").map(x => x + x).join("");
        }
        const num = parseInt(hex, 16);
        return { r: (num >> 16) & 255, g: (num >> 8) & 255, b: num & 255 };
    }

    // Helper: RGB → HEX
    function rgbToHex(r, g, b) {
        return "#" + [r, g, b].map(x => {
            const hex = x.toString(16);
            return hex.length === 1 ? "0" + hex : hex;
        }).join("");
    }

    // Bind all fields
    bindHexColorSync("grayHex", "grayHexPicker");
    bindRgbColorSync("grayRgb", "grayRgbPicker", "grayRgbBtn");

    bindHexColorSync("baseHex", "baseHexPicker");
    bindRgbColorSync("baseRgb", "baseRgbPicker", "baseRgbBtn");

    bindHexColorSync("primaryHex", "primaryHexPicker");
    bindRgbColorSync("primaryRgb", "primaryRgbPicker", "primaryRgbBtn");

    bindHexColorSync("blackHex", "blackHexPicker");
    bindRgbColorSync("blackRgb", "blackRgbPicker", "blackRgbBtn");

    bindHexColorSync("whiteHex", "whiteHexPicker");
    bindRgbColorSync("whiteRgb", "whiteRgbPicker", "whiteRgbBtn");

    bindHexColorSync("borderHex", "borderHexPicker");
    bindRgbColorSync("borderRgb", "borderRgbPicker", "borderRgbBtn");
});
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


// Website Color update

$(document).ready(function(){
    $('#websiteColorsForm').submit(function(e){
        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        let $submitBtn = $('#submitBtn');
        $submitBtn.prop('disabled', true);
        $('#colorBtnText').text('Processing...');
        $('#colorBtnSpinner').removeClass('d-none');

        $.ajax({
            url: "{{ route('admin.website.setting.color.update') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $submitBtn.prop('disabled', false);
                $('#colorBtnText').text('Submit');
                $('#colorBtnSpinner').addClass('d-none');

                if (response.status === 'success') {
                    toastr.success(response.message);

                } else {
                    toastr.error(response.message || 'An error occurred.');
                }
            },

            error: function(xhr) {
                $submitBtn.prop('disabled', false);
                $('#colorBtnText').text('Submit');
                $('#colorBtnSpinner').addClass('d-none');

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(key, messages) {
                        toastr.error(messages[0]);
                    });
                } else {
                    toastr.error(xhr.responseJSON?.message || 'Something went wrong!');
                }
            }
        });
    });
});
</script>

<script>
    $(document).on("submit", "#updateBreadcrumbForm", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    // Extra hidden field (delete flags)
    $(".delete-flag").each(function() {
        formData.append($(this).attr("name"), $(this).val());
    });

    $.ajax({
        url: "{{ route('breadcrumb.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            if (res.success) {
                toastr.success(res.message);

                // Background
                if (res.data.breadcrumb_bg_image) {
                    $("#bgWrapper").show();
                    $("#bgPreview").attr("src", "/" + res.data.breadcrumb_bg_image);
                } else {
                    $("#bgWrapper").hide();
                }

                // Header
                if (res.data.page_header_image) {
                    $("#headerWrapper").show();
                    $("#headerPreview").attr("src", "/" + res.data.page_header_image);
                } else {
                    $("#headerWrapper").hide();
                }

                // Container
                if (res.data.container_box_image) {
                    $("#containerWrapper").show();
                    $("#containerPreview").attr("src", "/" + res.data.container_box_image);
                } else {
                    $("#containerWrapper").hide();
                }
            }

            if (res.data.breadcrumb_bg_image) {
                $("#bgWrapper").show();
                $("#bgPreview").attr("src", "/" + res.data.breadcrumb_bg_image);
            } else {
                $("#bgWrapper").hide();
            }

        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert("⚠️ Error occurred!");
        }
    });
});

// Delete button click
$(document).on("click", ".delete-icon", function () {
    let target = $(this).data("target");
    $("#" + target).attr("src", "").parent().hide();

    // delete flag input যোগ করি যাতে backend এ বুঝতে পারে কোন image delete হবে
    if ($("#" + target + "_delete").length === 0) {
        $("#updateBreadcrumbForm").append(
            `<input type="hidden" class="delete-flag" id="${target}_delete" name="${target}_delete" value="1">`
        );
    } else {
        $("#" + target + "_delete").val("1");
    }
});

</script>

@endpush
