<h1>Welcome, {{ $user->name }} ({{ $user->role }})</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<h2>All Schools</h2>

@if(session('message'))
    <p style="color:green">{{ session('message') }}</p>
@endif

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>#</th>
            <th>School Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schools as $school)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $school->school_name }}</td>
            <td>{{ $school->address }}</td>
            <td>{{ $school->phone }}</td>
            <td>{{ $school->is_active ? 'Active' : 'Inactive' }}</td>
            <td>
                <!-- Edit -->
                <a href="{{ route('admin.schools.edit', $school->id) }}">Edit</a>

                <!-- Toggle Active/Inactive -->
                <form action="{{ route('admin.schools.toggle', $school->id) }}" method="POST" style="display:inline;">
                    @csrf

                    @if($school->is_active)
                        <button type="submit">Deactivate</button>
                    @else
                        <button type="submit">Activate</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Add New School</h2>

<form method="POST" action="{{ route('admin.schools.store') }}">
    @csrf

    <div>
        <label>School Name:</label>
        <input type="text" name="school_name" required>
    </div>

    <div>
        <label>Address:</label>
        <input type="text" name="address">
    </div>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone">
    </div>

    <button type="submit">Add School</button>
</form>