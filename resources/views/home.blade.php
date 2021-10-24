<x-layout>
    <div class="container">
        @foreach($timeslotRotas as $timeslot)
        <hr>
        <div class="row print-break">
            <div class="col">
                <h3>{{ $timeslot['timeslot']->start }} ({{ $timeslot['timeslot']->name }})</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Job</th>
                            <th>Staff</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timeslot['assignments'] as $assignment)
                        <tr>
                            <td>{{ $assignment->job->name }}</td>
                            <td>{{ $assignment->staff->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col">
                @if (count($timeslot['openJobs']))
                    <h3>Open jobs:</h3>
                    <ul>
                        @foreach ($timeslot['openJobs'] as $openJob)
                            <li><mark>{{ $openJob->name }}</mark></li>
                        @endforeach
                    </ul>
                @endif

                @if (count($timeslot['openStaff']))
                    <h3>Open staff:</h3>
                    <ul>
                        @foreach ($timeslot['openStaff'] as $openStaff)
                            <li><mark>{{ $openStaff->name }}</mark></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</x-layout>
