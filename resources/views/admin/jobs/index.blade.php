<x-admin-layout>
    <div class="row">
        <div class="col">
            <h1>Jobs</h1>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
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
