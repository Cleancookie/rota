<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $key }}">
    Edit
</button>
<div class="modal fade" id="modal-edit-{{ $key }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route("admin.$itemName.update", $id) }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
