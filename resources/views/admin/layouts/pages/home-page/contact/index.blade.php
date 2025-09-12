@extends('admin.layouts.app')
@section('title', 'Home Contact Section')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Home Contact Section</h5>
                </div>
                <div class="card-body">
                    <form id="editContactSectionForm">
                        @csrf
                        @method('PUT')

                        {{-- Background Color --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Background Color</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="grayHex" name="background_color"
                                        value="#F65323">
                                    <input type="color" id="grayHexPicker" value="#F65323"
                                        style="width:40px;height:38px;" name="background_color">
                                </div>
                            </div>
                        </div>


                        {{-- Background Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Background Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="background_image">
                                @if(!empty($section->background_image))
                                <img id="previewBgImage" src="{{ asset($section->background_image) }}"
                                    alt="Background Image" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Background Shape Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Background Shape Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="background_shape_image">
                                @if(!empty($section->background_shape_image))
                                <img id="previewShapeImage" src="{{ asset($section->background_shape_image) }}"
                                    alt="Background Shape" class="mt-2 border rounded" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4 rounded-0" id="submitBtn">
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
    // যখন color picker এ select করা হবে
    document.getElementById("grayHexPicker").addEventListener("input", function () {
        document.getElementById("grayHex").value = this.value;
    });

    // যখন text input এ লিখা হবে
    document.getElementById("grayHex").addEventListener("input", function () {
        let val = this.value;
        if(/^#([0-9A-F]{3}){1,2}$/i.test(val)){ // valid hex হলে
            document.getElementById("grayHexPicker").value = val;
        }
    });
</script>


<script>
    $(document).ready(function(){
        $("#editContactSectionForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('home.contact.section.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        if (response.background_image) {
                            $('#previewBgImage').attr('src', response.background_image);
                        }
                        if (response.background_shape_image) {
                            $('#previewShapeImage').attr('src', response.background_shape_image);
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
