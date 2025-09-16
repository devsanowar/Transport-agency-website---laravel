@extends('admin.layouts.app')
@section('title', 'Edit FAQ')
@section('admin_content')
<div class="page-content">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Edit FAQ</h5>
                        <a href="{{ route('faq.index') }}" class="btn btn-outline-primary px-5 rounded-0">All FAQ</a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form id="editFaqForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $faq->id }}">

                        {{-- Question --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Question</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="question" value="{{ $faq->question }}"
                                    placeholder="Enter FAQ question" required>
                            </div>
                        </div>

                        {{-- Answer --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Answer</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="answer" rows="4" placeholder="Enter FAQ answer"
                                    required>{{ $faq->answer }}</textarea>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status" required>
                                    <option value="1" {{ $faq->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $faq->status == 0 ? 'selected' : '' }}>DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- Submit --}}
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
        $("#editFaqForm").submit(function(e){
            e.preventDefault();
            let formData = $(this).serialize();

            // Spinner show
            $('#btnText').text('Updating...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('faq.update', $faq->id) }}",
                type : "POST",
                data : formData,

                success:function(response){
                    if (response.status === 'success') {
                        toastr.success(response.message);
                        window.location.href = "{{ route('faq.index') }}";
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
                    $('#btnText').text('Update');
                    $('#btnSpinner').addClass('d-none');
                    $('#submitBtn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
