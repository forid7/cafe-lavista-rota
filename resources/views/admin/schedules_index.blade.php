<h2>Assign New Shift</h2>
<form method="POST" action="{{ route('admin.schedules.store') }}">
    @csrf
    <select name="employee_id">
        @foreach($employees as $employee)
            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
        @endforeach
    </select>
    <select name="shift_id">
        @foreach($shifts as $shift)
            <option value="{{ $shift->id }}">{{ $shift->name }}</option>
        @endforeach
    </select>
    <input type="date" name="work_date">
    <button type="submit">Assign Shift</button>
</form>

<hr>

<h2>Existing Schedules</h2>
@foreach($schedules as $schedule)
    <p>{{ $schedule->employee_id }} - {{ $schedule->shift_id }} - {{ $schedule->work_date }}</p>
@endforeach
