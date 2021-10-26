<x-admin-layout>
        <div class="row">
            <div class="col">
                <h1>Staff</h1>
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
            @foreach ($staff as $key => $aStaff)
                <tr>
                    <td>{{$aStaff->id}}</td>
                    <td>{{$aStaff->name}}</td>
                    <td>
                        <x-modals.edit-modal :key="$key" :itemName="'staff'" :id="$aStaff->id">
                            <div class="mb-3">
                                <label for="name{{ $aStaff->id }}" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name{{ $aStaff->id }}" value="{{ $aStaff->name }}">
                            </div>
                        </x-modals.edit-modal>
                    </td>
                    <td>
                        <x-modals.delete-modal :key="$key" :itemName="'staff'" :id="$aStaff->id">
                            You are about to delete {{ $aStaff->name }}
                        </x-modals.delete-modal>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
