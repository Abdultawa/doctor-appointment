<nav class="bg-gray-800 shadow-lg fixed w-full top-0 z-10">
  <div class="container mx-auto px-4 py-2 flex items-center justify-between">
    <!-- Logo and toggle button -->
    <div class="flex items-center">
      <img class="h-7 w-auto mr-4" src="http://localhost:8000/index_data/logo-inverse-294x44.png" alt="Your Company">
      <!-- Hamburger menu button for mobile -->
      <button id="mobile-menu-button" class="block sm:hidden text-gray-400 hover:text-white focus:outline-none">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
          <path id="hamburger-icon" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
    </div>
    
    <!-- Desktop navigation menu -->
    <ul class="hidden sm:flex space-x-4">
      <li><a href="#home" class="text-white hover:text-gray-300">Home</a></li>
      <li><a href="#about" class="text-white hover:text-gray-300">About</a></li>
      <li><a href="#dept" class="text-white hover:text-gray-300">Department</a></li>
      <li><a href="#news" class="text-white hover:text-gray-300">News</a></li>
      <li><a href="#contact" class="text-white hover:text-gray-300">Contact</a></li>
    </ul>
    
    <!-- Right section -->
    <div class="flex items-center space-x-4">
      <!-- Notification button -->
      <button type="button" class="text-gray-400 hover:text-white focus:outline-none">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
          <path d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
        </svg>
      </button>
      
      <!-- Authentication links -->
      <div class="hidden sm:block">
        @if (Route::has('login'))
          <div class="flex space-x-4">
            @auth
              <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-300">Dashboard</a>
            @else
              <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
              @endif
            @endauth
          </div>
        @endif
      </div>
    </div>
  </div>
  
  <!-- Mobile menu -->
  <div class="sm:hidden bg-gray-900" id="mobile-menu">
    <div class="container px-4 py-2">
      <ul class="flex flex-col space-y-2">
        <li><a href="#home" class="text-white hover:text-gray-300">Home</a></li>
        <li><a href="#about" class="text-white hover:text-gray-300">About</a></li>
        <li><a href="#dept" class="text-white hover:text-gray-300">Department</a></li>
        <li><a href="#news" class="text-white hover:text-gray-300">News</a></li>
        <li><a href="#contact" class="text-white hover:text-gray-300">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
