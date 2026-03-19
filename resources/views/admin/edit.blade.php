<h1>Edit School</h1>

<form method="POST" action="{{ route('admin.schools.update', $school->id) }}">
    @csrf
    @method('PUT')

    <div>
        <label>School Name:</label>
        <input type="text" name="school_name" value="{{ old('school_name', $school->school_name) }}" required>
    </div>

    <div>
        <label>Address:</label>
        <input type="text" name="address" value="{{ old('address', $school->address) }}">
    </div>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $school->phone) }}">
    </div>

    <div>
        <label>Active:</label>
        <input type="checkbox" name="is_active" value="1" {{ $school->is_active ? 'checked' : '' }}>
    </div>

    <button type="submit">Update School</button>
</form>