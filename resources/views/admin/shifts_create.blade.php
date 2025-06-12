<form method="POST" action="{{ route('admin.shifts.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Shift Name" required>
    <input type="text" name="start_time" placeholder="Start Time (e.g. 09:00)">
    <input type="text" name="end_time" placeholder="End Time (e.g. 17:00)">
    <input type="text" name="css_class" placeholder="CSS Class (e.g. shift-morning)">
    <button type="submit">Add Shift</button>
</form>
