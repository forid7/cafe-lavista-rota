<form method="POST" action="{{ route('admin.employees.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Employee Name" required>
    <button type="submit">Add Employee</button>
</form>
