<h1>Welcome, {{ $user->name }} ({{ $user->role }})</h1>

<h2>School List:</h2>
      @foreach ($schools as $index => $school)
        <li>{{ $index + 1 }}. {{ $school->school_name }} - {{ $school->address }} - {{ $school->phone }}</li>
      @endforeach

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>