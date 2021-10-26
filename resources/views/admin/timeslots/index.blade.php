<x-admin-layout>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Timeslots</h1>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Start Time</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($timeslots as $key => $timeslot)
                    <tr>
                        <td>{{$timeslot->id}}</td>
                        <td>{{$timeslot->name}}</td>
                        <td>{{$timeslot->start}}</td>
                        <td>Edit</td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $key }}">
                                Delete
                            </button>
                            <div class="modal fade" id="modal-{{ $key }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.timeslots.destroy', $timeslot) }}" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                You are about to delete {{ $timeslot->name }} ({{ $timeslot->start }})
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
