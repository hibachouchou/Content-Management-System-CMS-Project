@extends('sidebar')
@section('main')
<div>

    <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Welcome  </span>Admin</h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400"></p>
    @if(session('msg'))
    <script>
        var alertType = "{{ session('alert', 'info') }}"; // Default to 'info' if not set
        alert("{{ session('msg') }}");
    </script>
@endif 
</div>
@stop