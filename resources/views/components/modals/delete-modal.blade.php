<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $key }}">
    Delete
</button>
<div class="modal fade" id="modal-delete-{{ $key }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route("admin.$itemName.destroy", $id) }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
