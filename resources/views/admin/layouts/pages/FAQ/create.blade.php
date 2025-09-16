@extends('admin.layouts.app')
@section('title', 'Add FAQ')
@section('admin_content')
<div class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Add FAQ</h5>
                        <a href="{{ route('faq.index') }}" class="btn btn-outline-primary px-5 rounded-0">All FAQ</a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form id="addFaqForm">
                        @csrf

                        {{-- Question --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Question</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="question" rows="2"
                                    placeholder="Enter FAQ question" />
                            </div>
                        </div>

                        {{-- Answer --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Answer</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="answer" rows="4"
                                    placeholder="Enter FAQ answer"></textarea>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">DeActive</option>
                                </select>
                            </div>
                        </div>


                        {{-- Submit --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Submit</span>
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
        $("#addFaqForm").submit(function(e){
            e.preventDefault();
            let formData = $(this).serialize();

            // Spinner show
            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('faq.store') }}",
                type : "POST",
                data : formData,

                success:function(response){
                    $("#addFaqForm")[0].reset();
                    if (response.status === 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message ?? 'Something went wrong!');
                    }
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An unexpected error occurred. Please try again.');
                    }
                },
                complete: function () {
                    // Spinner hide & button reset
                    $('#btnText').text('Submit');
                    $('#btnSpinner').addClass('d-none');
                    $('#submitBtn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
