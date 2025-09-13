@extends('admin.layouts.app')

@section('title', 'Brands')

@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Brand List</h5>
                    <a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm">+ Add New Brand</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Brand Image</th>
                                <th>Status</th>
                                <th width="150">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $key => $brand)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>
                                        @if($brand->brand_image)
                                            <img src="{{ asset($brand->brand_image) }}"
                                                 alt="{{ $brand->brand_name }}"
                                                 width="60" class="border rounded">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($brand->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('brands.edit', $brand->id) }}"
                                            class="action-icon border border-primary text-primary me-2 editReviewBtn">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                            class="deleteReviewForm" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="action-icon border border-danger text-danger deleteBtn"
                                                data-id="{{ $brand->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No brands found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('backend') }}/assets/js/sweetalert2.js"></script>

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
