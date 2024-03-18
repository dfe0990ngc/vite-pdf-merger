<header class="text-white flex w-full justify-center items-center">
    <nav  aria-label="header navigation" class="w-[90%] sm:max-w-screen-lg flex flex-row justify-between">
        <a href="{{ url('/') }}">
            <figure class="flex flex-row justify-start items-center gap-2">
                <img width="52px" height="52px" src="{{ asset('/images/img-logo.webp') }}" alt="PDF Merger Logo">
                <figcaption class="text-2xl font-bold">PDF Merger</figcaption>
            </figure>
        </a>
        <ul class="list-none hidden sm:flex sm:flex-row gap-6 justify-end items-center">
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/') }}">Home</a></li>
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/about-us') }}">About</a></li>
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/contact-us') }}">Contact Us</a></li>
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/donate') }}">Donate</a></li>
        </ul>
        <button id="btn-nav-main-menu" class="text-2xl sm:hidden bg-transparent border-solid border-1 border-white/50">&#9776;</button>
    </nav>
</header>

<div id="nav-main-overlay" class="hidden sm:hidden absolute bg-black opacity-70 top-0 min-w-full min-h-full z-40 transition-all duration-300"></div>
<ul id="nav-main-menu" class="hidden z-50 sm:hidden list-none bg-page px-5 py-8 shadow-2xl absolute top-16 right-0 w-60 transition-all duration-500">
    <li class="mb-5"><a class="hover:opacity-45 font-semibold text-black" href="{{ url('/') }}">Home</a></li>
    <li class="mb-5"><a class="hover:opacity-45 font-semibold text-black" href="{{ url('/about-us') }}">About</a></li>
    <li class="mb-5"><a class="hover:opacity-45 font-semibold text-black" href="{{ url('/contact-us') }}">Contact Us</a></li>
    <li class="mb-5"><a class="hover:opacity-45 font-semibold text-black" href="{{ url('/donate') }}">Donate</a></li>
</ul>
