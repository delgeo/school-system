<h1>Welcome, {{ $user->name }} ({{ $user->role }})</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

<h2>All Schools</h2>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>No.</th>
            <th>School Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Status</th>
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
        </tr>
        @endforeach
    </tbody>
</table>