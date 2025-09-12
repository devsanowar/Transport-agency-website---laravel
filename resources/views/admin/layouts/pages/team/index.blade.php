@extends('admin.layouts.app')
@section('title', 'Team Members')
@push('styles')
<link href="{{ asset('backend') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="addTitlesForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-2 align-items-center">
                            {{-- Tag Line --}}
                            <label class="col-md-1 col-form-label">Tag Line</label>
                            <div class="col-md-4">
                                <input type="text" name="review_tagline" class="form-control" placeholder="Team tag line"
                                    value="" required>
                            </div>

                            {{-- Section Title --}}
                            <label class="col-md-2 col-form-label">Section Title</label>
                            <div class="col-md-3">
                                <input type="text" name="review_title" class="form-control"
                                    placeholder="Team members section titile" value="" required>
                            </div>

                            <div class="col-md-2 text-start">
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <span id="btnText">Update</span>
                                    <span id="btnSpinner" class="spinner-border spinner-border-sm d-none ms-2"></span>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Team Members</h5>
                    <a href="{{ route('team.create') }}" class="btn btn-primary btn-sm">+ Add Member</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th width="150">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teams as $key => $team)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($team->team_member_image) }}" alt="team img" width="30"></td>
                                    <td>{{ $team->team_member_name }}</td>
                                    <td>{{ $team->team_member_designation }}</td>
                                    <td>{{ $team->team_member_phone }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('team.edit', $team->id) }}"
                                            class="action-icon border border-primary text-primary me-2 editReviewBtn">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('team.destroy', $team->id) }}" method="POST"
                                            class="deleteReviewForm" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="action-icon border border-danger text-danger deleteBtn"
                                                data-id="{{ $team->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No Team Members Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/sweetalert2.js"></script>
<script>
    $(document).ready(function() {
			$('#example').DataTable();
		  } );
</script>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
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
