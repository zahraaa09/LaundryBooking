@extends('layouts.app')

@section('content')
<div class="flex">
    
    {{-- Sidebar --}}
    @include('partials.admin-sidebar')

    <main class="flex-1 p-6">
        @yield('admin-content')
    </main>

</div>
@endsection
