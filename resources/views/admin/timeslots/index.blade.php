<x-admin-layout>
    @slot('title')
        Timeslot
    @endslot
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
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
                    <td>
                        <x-modals.edit-modal :key="$key" :itemName="'timeslots'" :id="$timeslot->id">
                            <div class="mb-3">
                                <label for="name{{ $timeslot->id }}" class="form-label">Name</label>
                                <input type="text" class="form-control" id="{{ $timeslot->id }}" value="{{ $timeslot->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="start{{ $timeslot->id }}" class="form-label">Start Time</label>
                                <input type="time" class="form-control" id="start{{ $timeslot->id }}" value="{{ $timeslot->start }}">
                            </div>
                        </x-modals.edit-modal>
                    </td>
                    <td>
                        <x-modals.delete-modal :key="$key" :itemName="'timeslots'" :id="$timeslot->id">
                            You are about to delete {{ $timeslot->name }}
                        </x-modals.delete-modal>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
