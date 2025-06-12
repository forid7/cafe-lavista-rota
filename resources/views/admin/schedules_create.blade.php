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
    <input type="date" name="work_date" required>
    <button type="submit">Assign Shift</button>
</form>
