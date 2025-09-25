@extends('admin.layouts.app')
@section('title', 'Create Achievement')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Create Achievement</h5>
                        <a href="{{ route('achievement.index') }}" class="btn btn-outline-primary px-3 rounded-0">All
                            Achievements</a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="addAchievementForm">
                        @csrf

                        {{-- Achievement Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Achievement Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="achievement_title"
                                    placeholder="Enter Achievement Title">
                            </div>
                        </div>

                        {{-- Achievement Count --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Achievement Count</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="achievement_count"
                                    placeholder="ex: 80">
                            </div>
                        </div>

                        {{-- Achievement Icon --}}
                        <div class="row mb-3" style="margin-top:60px">
                            <label class="col-sm-3 col-form-label">Achievement Icon (Max-size: 200kb)</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="achievement_icon">

                                @if(!empty($achievement->achievement_icon))
                                <img src="{{ asset('uploads/achievement_icons/'.$achievement->achievement_icon) }}"
                                    alt="Achievement Icon" class="mt-2 border rounded" width="60">
                                @endif
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- --- SEO Fields --- --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>

                        {{-- Meta Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title" placeholder="SEO title">
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    placeholder="keyword1, keyword2">
                            </div>
                        </div>

                        {{-- Meta Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" rows="3"
                                    placeholder="SEO description"></textarea>
                            </div>
                        </div>


                        {{-- Submit Button --}}
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
    $("#addAchievementForm").submit(function(e){
        e.preventDefault();
        let formData = new FormData(this);

        // Spinner show
        $('#btnText').text('Processing...');
        $('#btnSpinner').removeClass('d-none');
        $('#submitBtn').prop('disabled', true);

        $.ajax({
            url: "{{ route('achievement.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $("#addAchievementForm")[0].reset();
                if(response.status === 'success'){
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
                $('#btnText').text('Submit');
                $('#btnSpinner').addClass('d-none');
                $('#submitBtn').prop('disabled', false);
            }
        });
    });
});
</script>
@endpush
