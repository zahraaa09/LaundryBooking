<nav class="bg-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">

        <a href="/" class="text-xl font-bold text-blue-600">LaundryBooking</a>

        <div class="flex items-center gap-4">

            @auth

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" 
                       class="hover:text-blue-600">Admin Dashboard</a>
                @else
                    <a href="{{ route('customer.dashboard') }}" 
                       class="hover:text-blue-600">Dashboard</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:text-red-800 font-semibold">
                        Logout
                    </button>
                </form>

            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
            @endauth
        </div>

    </div>
</nav>
