<!-- Edit Feature Modal -->
<div class="modal fade" id="editFeatureModal" tabindex="-1" aria-labelledby="editFeatureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editFeatureModalLabel">Edit Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editFeatureForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <input type="hidden" name="id" id="feature_id">

                    <div class="mb-3">
                        <label class="form-label">Feature Title</label>
                        <input type="text" class="form-control" name="title" id="edit_title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit_description" rows="4"
                            required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Feature Icon</label>
                        <input type="file" class="form-control" name="icon">
                        <div id="old_icon" class="mt-2"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
