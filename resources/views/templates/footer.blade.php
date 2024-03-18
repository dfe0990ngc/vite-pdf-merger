<footer class="text-white w-full flex justify-center items-center">
    <nav aria-label="footer navigation" class="w-[90%] sm:max-w-screen-lg flex flex-col justify-start sm:flex-row sm:justify-between">
        <div class="flex flex-col justify-start items-start gap-3">
            <a href="{{ url('/') }}">
                <figure class="flex flex-row justify-start items-center gap-2">
                    <img width="52px" height="52px" src="{{ asset('/images/img-logo.webp') }}" alt="PDF Merger Logo">
                    <figcaption class="text-2xl font-bold">PDF Merger</figcaption>
                </figure>
            </a>
            <div class="flex flex-col">
                <p>&copy; Copyright <?= date('Y'); ?> | <a class="underline" href="{{ url('/privacy-policy') }}">Privacy Policy</a></p>
            </div>
        </div>
        <hr class="sm:hidden bg-white/50 my-8">
        <ul class="list-none flex flex-col gap-3 justify-start items-start">
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/about-us') }}">About</a></li>
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/contact-us') }}">Contact Us</a></li>
            <li><a class="hover:opacity-45 font-semibold" href="{{ url('/donate') }}">Donate</a></li>
        </ul>
        <hr class="sm:hidden bg-white/50 my-8">
        <div class="flex flex-col gap-3">
            <h2 class="font-bold text-lg text-left sm:text-center">Let's keep in-touch!</h2>
            <form id="frm-add-subscriber" class="flex flex-row gap-0" action="{{ url('/add-subscriber') }}" method="post">
                @csrf
                <input required autocomplete="off" class="shadow-sm rounded-tl-md rounded-bl-md h-9 p-2 mx-0 text-black dark:text-white/50 w-full" type="email" name="email" id="email" placeholder="Email">
                <button class="shadow-sm h-9 bg-white px-2 mx-0 rounded-tr-full rounded-br-full font-bold text-red-900 transition-all duration-700" type="submit" name="submit">Submit</button>
            </form>
            <p id="add-subsciber-message" class="text-yellow-200 text-sm -mt-3 w-full sm:w-[262px]"></p>
        </div>
    </nav>
</footer>
