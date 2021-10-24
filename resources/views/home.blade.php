<x-layout>

    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Rota for today</h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Timeslot</th>
                            <th>Job</th>
                            <th>Staff</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rotas as $rota)
                            <tr>
                                <td>{{ $rota->timeslot->start }}</td>
                                <td>{{ $rota->job->name }}</td>
                                <td>{{ $rota->staff->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
