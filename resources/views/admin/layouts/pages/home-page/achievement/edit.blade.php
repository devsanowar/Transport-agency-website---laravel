@extends('admin.layouts.app')
@section('title', 'Edit Achievement')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">Edit Achievement</h5>
                        <a href="{{ route('achievement.index') }}" class="btn btn-outline-primary px-3 rounded-0">
                            All Achievements
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form id="editAchievementForm">
                        @csrf
                        @method('PUT')

                        {{-- Achievement Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Achievement Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="achievement_title"
                                    value="{{ old('achievement_title', $achievement->achievement_title) }}"
                                    placeholder="Enter Achievement Title">
                            </div>
                        </div>

                        {{-- Achievement Count --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Achievement Count</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="achievement_count"
                                    value="{{ old('achievement_count', $achievement->achievement_count) }}"
                                    placeholder="Enter Achievement Count">
                            </div>
                        </div>

                        {{-- Achievement Icon --}}
                        <div class="row mb-3" style="margin-top:60px">
                            <label class="col-sm-3 col-form-label">Achievement Icon (Max-size: 200kb)</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="achievement_icon">
                                @if(!empty($achievement->achievement_icon))
                                    <img id="previewImage" src="{{ asset($achievement->achievement_icon) }}"
                                         alt="Achievement Icon"
                                         class="mt-2 border rounded" width="60">
                                @endif
                            </div>
                        </div>

                        {{-- Order By --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Order By</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="order_by"
                                    value="{{ old('order_by', $achievement->order_by) }}"
                                    placeholder="Enter Order By">
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1" {{ $achievement->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $achievement->status == 0 ? 'selected' : '' }}>DeActive</option>
                                </select>
                            </div>
                        </div>

                        {{-- --- SEO Fields --- --}}
                        <h6 class="mb-3 mt-4 text-uppercase">SEO Meta Information</h6>

                        {{-- Meta Title --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ old('meta_title', $achievement->meta_title) }}"
                                    placeholder="SEO title">
                            </div>
                        </div>

                        {{-- Meta Keywords --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Keywords</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords"
                                    value="{{ old('meta_keywords', $achievement->meta_keywords) }}"
                                    placeholder="keyword1, keyword2">
                            </div>
                        </div>

                        {{-- Meta Description --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" rows="3"
                                    placeholder="SEO description">{{ old('meta_description', $achievement->meta_description) }}</textarea>
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
        $("#editAchievementForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            // Spinner show
            $('#btnText').text('Processing...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('achievement.update', $achievement->id) }}",
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
