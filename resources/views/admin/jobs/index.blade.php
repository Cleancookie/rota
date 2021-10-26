<x-admin-layout>
    @slot('title')
       Jobs
    @endslot


    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $key => $job)
                <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->name}}</td>
                    <td>
                        <x-modals.edit-modal :key="$key" :itemName="'jobs'" :id="$job->id">
                            <div class="mb-3">
                                <label for="name{{ $job->id }}" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name{{ $job->id }}" value="{{ $job->name }}">
                            </div>
                            <hr>
                            @foreach ($timeslots as $key => $timeslot)
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="timeslot"
                                        value="{{ $timeslot->id }}"
                                        id="flexCheck-{{ $key }}" {{ $job->timeslot == $timeslot ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheck-{{ $key }}">
                                        {{ $timeslot->name }} ({{ $timeslot->start }})
                                    </label>
                                </div>
                            @endforeach

                        </x-modals.edit-modal>
                    </td>
                    <td>
                        <x-modals.delete-modal :key="$key" :itemName="'jobs'" :id="$job->id">
                            You are about to delete {{ $job->name }}
                        </x-modals.delete-modal>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
