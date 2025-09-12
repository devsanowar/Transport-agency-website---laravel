@extends('admin.layouts.app')
@section('title', 'Edit Team Member')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Team Member</h5>
                    <a href="{{ route('team.index') }}" class="btn btn-primary btn-sm"> All Members</a>
                </div>
                <div class="card-body">
                    <form id="editTeamForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_name"
                                    value="{{ old('team_member_name', $team->team_member_name) }}" required>
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Designation <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_designation"
                                    value="{{ old('team_member_designation', $team->team_member_designation) }}" required>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_phone"
                                    value="{{ old('team_member_phone', $team->team_member_phone) }}" required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="team_member_email"
                                    value="{{ old('team_member_email', $team->team_member_email) }}">
                            </div>
                        </div>

                        {{-- About --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="team_member_about" rows="3">{{ old('team_member_about', $team->team_member_about) }}</textarea>
                            </div>
                        </div>

                        {{-- Team Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Team Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="team_member_image" accept="image/*">
                                @if(!empty($team->team_member_image))
                                    <img id="previewImage" src="{{ asset($team->team_member_image) }}" alt="Preview Image" class="mt-2 border rounded" width="120">
                                @else
                                    <img id="previewImage" src="#" alt="Preview Image" class="mt-2 border rounded d-none" width="120">
                                @endif
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_address"
                                    value="{{ old('team_member_address', $team->team_member_address) }}">
                            </div>
                        </div>

                        {{-- Social Links --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Social Links</h6>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_facebook"
                                    value="{{ old('team_member_facebook', $team->team_member_facebook) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">LinkedIn</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_linkeding"
                                    value="{{ old('team_member_linkeding', $team->team_member_linkeding) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Instagram</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_instagram"
                                    value="{{ old('team_member_instagram', $team->team_member_instagram) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_twitter"
                                    value="{{ old('team_member_twitter', $team->team_member_twitter) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">YouTube</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_youtube"
                                    value="{{ old('team_member_youtube', $team->team_member_youtube) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_website"
                                    value="{{ old('team_member_website', $team->team_member_website) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Pinterest</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_printerest"
                                    value="{{ old('team_member_printerest', $team->team_member_printerest) }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">TikTok</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_tiktok"
                                    value="{{ old('team_member_tiktok', $team->team_member_tiktok) }}">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Update</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2"></span>
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
        $("#editTeamForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $('#btnText').text('Updating...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('team.update', $team->id) }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        if (response.team_member_image) {
                            $('#previewImage').attr('src', response.team_member_image);
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
