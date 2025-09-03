@extends('admin.dashboard')
@section('title', 'Transport Agency | Social Icon Settings')
@section('admin_content')
<div class="page-content">
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12">

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Social Icon Settings</h5>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="facebook_url" class="form-label">Facebook</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="facebook_url" itemid="facebook_url" class="form-control @error('facebook_url') is-invaild @enderror" id="input25"
                                    placeholder="Facebook Url">
                            </div>
                            @error('facebook_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="instagram_url" class="form-label">Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="instagram_url" itemid="instagram_url" class="form-control @error('instagram_url') is-invaild @enderror" id="input25"
                                    placeholder="Instagram Url">
                            </div>
                            @error('instagram_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="linkedin_url" class="form-label">Linkedin</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="linkedin_url" itemid="linkedin_url" class="form-control @error('linkedin_url') is-invaild @enderror" id="input25"
                                    placeholder="Linkedin Url">
                            </div>
                            @error('linkedin_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="facebook_url" class="form-label">Twitter</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="facebook_url" itemid="facebook_url" class="form-control @error('facebook_url') is-invaild @enderror" id="input25"
                                    placeholder="Facebook Url">
                            </div>
                            @error('facebook_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="youtube_url" class="form-label">Youtube</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="youtube_url" itemid="youtube_url" class="form-control @error('youtube_url') is-invaild @enderror" id="input25"
                                    placeholder="Youtube Url">
                            </div>
                            @error('youtube_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="google_plus_url" class="form-label">Google Plus</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="google_plus_url" itemid="google_plus_url" class="form-control @error('google_plus_url') is-invaild @enderror" id="input25"
                                    placeholder="Google plus Url">
                            </div>
                            @error('google_plus_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="tiktok_url" class="form-label">Tiktok Url</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx  bx-link'  ></i>  </span>
                                <input type="text" name="tiktok_url" itemid="tiktok_url" class="form-control @error('tiktok_url') is-invaild @enderror" id="input25"
                                    placeholder="Tiktok Url">
                            </div>
                            @error('tiktok_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="button" class="btn btn-primary px-4">Submit</button>
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


@endpush
