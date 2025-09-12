@extends('admin.layouts.app')
@section('title', 'Achievements')
@section('admin_content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="">All Achievements</h5>
                        <a href="{{ route('achievement.create') }}" class="btn btn-outline-primary px-3 rounded-0">Add Achievement</a>
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
                                    <th>Count</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($achievements as $key => $achievement)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        <img src="{{ asset($achievement->achievement_icon) }}" width="24" alt="achievement icon">
                                    </td>
                                    <td>{{ $achievement->achievement_title ?? '-' }}</td>
                                    <td>{{ $achievement->achievement_count ?? '-' }}</td>
                                    <td>{{ $achievement->order_by ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($achievement->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('achievement.edit', $achievement->id) }}"
                                            class="action-icon border border-primary text-primary me-2">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <form action="{{ route('achievement.destroy', $achievement->id) }}"
                                            method="POST" class="deleteMenuForm" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                class="action-icon border border-danger text-danger deleteBtn"
                                                data-id="{{ $achievement->id }}">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
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
