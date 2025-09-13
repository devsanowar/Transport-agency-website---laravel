@extends('admin.layouts.app')
@section('title', 'Why Choose Us Features')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Add Features</h5>
                        <a href="{{ route('why-choose-us.index') }}" class="btn btn-outline-primary px-4 rounded-0">Why
                            Choose Us</a>
                    </div>
                </div>

                <div class="card-body">
                    <form id="addWhyChooseFeature" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="why_choose_id" value="{{ $section->id }}">

                        {{-- Icon --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Icon</label>
                            <div class="col-sm-9">
                                <input type="file" name="icon" class="form-control">
                            </div>
                        </div>

                        {{-- Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Feature Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    placeholder="Enter feature title" required>
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" rows="4"
                                    placeholder="Enter description" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Save Feature</span>
                                        <span id="btnSpinner"
                                            class="spinner-border spinner-border-sm d-none ms-2"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">All Features</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $key => $feature)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($feature->icon)
                                        <img src="{{ asset($feature->icon) }}" alt="Icon" width="50">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ $feature->title }}</td>
                                    <td>{{ Str::limit($feature->description, 50, '...') }}</td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="javascript:void(0);"
                                            class="action-icon border border-primary text-primary me-2 editFeatureBtn"
                                            data-id="{{ $feature->id }}">
                                            <i class="bx bx-edit"></i>
                                        </a>


                                        <!-- Delete Button -->
                                        <form action="{{ route('why-choose-features.destroy', $feature->id) }}"
                                            method="POST" class="deleteFeatureForm" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="action-icon border border-danger text-danger deleteBtn"
                                                data-id="{{ $feature->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @include('admin.layouts.pages.about-page.whyc-choose-us.features.edit')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/assets/js/sweetalert2.js') }}"></script>


<script>
    $(document).ready(function(){
    $("#addWhyChooseFeature").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        // Spinner show
        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('why-choose-features.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $("#addWhyChooseFeature")[0].reset();
                if(response.status === 'success'){
                    toastr.success(response.message);
                    location.reload();
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
                $('#btnText').text('Submit');
                $('#btnSpinner').addClass('d-none');
                $('#submitBtn').prop('disabled', false);
            }
        });
    });
});

</script>

<!-- Edit method -->
<script>
    $(document).on("click", ".editFeatureBtn", function () {
    let id = $(this).data("id");

    // AJAX দিয়ে feature data আনবো
    $.get("/admin/about-page/why-choose-features/" + id + "/edit", function (data) {
        $("#feature_id").val(data.id);
        $("#edit_title").val(data.title);
        $("#edit_description").val(data.description);

        if (data.icon) {
            $("#old_icon").html(`<img src="/${data.icon}" width="80" class="img-thumbnail">`);
        } else {
            $("#old_icon").html(`<span class="text-muted">No Icon</span>`);
        }

        // Modal show
        $("#editFeatureModal").modal("show");
    });
});

</script>

<!-- Update method -->

<script>
    $(document).on("submit", "#editFeatureForm", function(e) {
    e.preventDefault();

    let id = $("#feature_id").val();
    let formData = new FormData(this);

    $.ajax({
        url: "/admin/about-page/why-choose-features/" + id,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(res) {
            if (res.status === "success") {
               toastr.success(res.message);

                $("#editFeatureModal").modal("hide");
                location.reload();
            }
        },
        error: function(xhr) {
            console.log(xhr.responseText);
        }
    });
});

</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.deleteBtn', function() {
            let button = $(this);
            let form = button.closest('form');
            let rowId = button.data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Laravel will handle deletion
                }
            });
        });
    });
</script>
@endpush
