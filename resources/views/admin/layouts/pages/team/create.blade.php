@extends('admin.layouts.app')
@section('title', 'Create Team Member')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Team Members</h5>
                    <a href="{{ route('team.index') }}" class="btn btn-primary btn-sm"> All Members</a>
                </div>
                <div class="card-body">
                    <form id="createTeamForm" enctype="multipart/form-data">
                        @csrf

                        {{-- Name --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_name" placeholder="Enter name" required>
                            </div>
                        </div>

                        {{-- Designation --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Designation <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_designation" placeholder="Enter designation" required>
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Phone <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_phone" placeholder="Enter phone number" required>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="team_member_email" placeholder="Enter email address">
                            </div>
                        </div>

                        {{-- About --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">About</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="team_member_about" rows="3" placeholder="Write about team member..."></textarea>
                            </div>
                        </div>

                        {{-- Client Image --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Team Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="team_member_image" accept="image/*">
                                <img id="previewImage" src="#" alt="Preview Image" class="mt-2 border rounded d-none" width="120">
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="team_member_address" placeholder="Enter address">
                            </div>
                        </div>

                        {{-- Social Links --}}
                        <h6 class="mb-3 mt-4 text-uppercase">Social Links</h6>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Facebook</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_facebook" placeholder="Facebook URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">LinkedIn</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_linkeding" placeholder="LinkedIn URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Instagram</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_instagram" placeholder="Instagram URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Twitter</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_twitter" placeholder="Twitter URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">YouTube</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_youtube" placeholder="YouTube URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Website</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_website" placeholder="Website URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Pinterest</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_printerest" placeholder="Pinterest URL">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">TikTok</label>
                            <div class="col-sm-9">
                                <input type="url" class="form-control" name="team_member_tiktok" placeholder="TikTok URL">
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-md-9">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-5 rounded-0" id="submitBtn">
                                        <span id="btnText">Save</span>
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
        $("#createTeamForm").submit(function(e){
            e.preventDefault();
            let formData = new FormData(this);

            $('#btnText').text('Saving...');
            $('#btnSpinner').removeClass('d-none');
            $('#submitBtn').prop('disabled', true);

            $.ajax({
                url: "{{ route('team.store') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status === 'success'){
                        toastr.success(response.message);
                        $('#createTeamForm')[0].reset();
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
                    $('#btnText').text('Save');
                    $('#btnSpinner').addClass('d-none');
                    $('#submitBtn').prop('disabled', false);
                }
            });
        });
    });
</script>
@endpush
