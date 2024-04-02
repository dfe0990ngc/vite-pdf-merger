@extends('layouts.app')

@section('title', 'PDF Merger | Home')
@section('description', 'Free PDF Merger or Join multiple PDF files into single a file.')

@section('content')

    @vite(['resources/css/dropzone.css','resources/js/home.js','resources/js/contact_us.js'])

    <div class="flex flex-col-reverse justify-center w-full items-center sm:flex-row sm:justify-between sm:items-center my-5">
        <div class="flex flex-col gap-3 w-full sm:w-auto pr-2">
            <h1 class="text-5xl text-[#9F0000] font-bold mt-5 sm:mt-0">
                Let us help <br/>
                merge your PDFs!
            </h1>
            <p class="text-black text-xl">
                We provide pdf merge utility tool<br/>
                <span class="text-[#9F0000] font-bold text-2xl">FREE</span>&nbsp;
                to use for your convenience...
            </p>
        </div>
        <figure class="flex flex-col items-center justify-center w-full sm:w-auto">
            <img class="rounded-2xl w-full" width="449px" height="350px" src="{{ asset('images/img-banner.webp') }}" alt="Home page Banner Image">
        </figure>
    </div>
    <hr class="border-red-950 w-full my-5">
    <div class="flex flex-col-reverse sm:flex-row w-full justify-start sm:justify-between items-center sm:items-start my-5">
        <div class="w-full flex flex-col items-center sm:w-[50%] gap-5">
            <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data" class="dropzone w-full bg-[#CDB2B2] border-none rounded-md flex flex-wrap justify-center relative" id="pdfUploader">
                @csrf
                <div class="fallback p-5">
                    <input type="file" name="file">
                    <button type="submit">Upload</button>
                </div>
            </form>
            <button id="btn-merge-pdf" class="p-2 bg-[#9F0000] font-bold text-white w-64 border-none rounded-full transition-all duration-700">Merge PDFs</button>
        </div>
        <div class="flex flex-col w-full sm:w-[50%] justify-center items-center px-4">
            <h2 class="text-5xl text-[#9F0000] font-bold mt-5 sm:mt-0 text-center mb-5 sm:mb-3">
                UPLOAD YOUR<br/>
                PDF FILES
            </h2>
            <p class="text-black text-lg text-center w-[75%] mx-auto mb-5 sm:mb-3">
                After clicking the <span class="font-bold text-[#9F0000]">Merge PDFs</span> button,
                the merged files will be downloaded automatically.
            </p>
            <p class="text-slate-900 text-sm mb-5 sm:mb-3 text-center">
                <a class="underline text-center" href="{{ url('/privacy-policy') }}">Check out the privacy policy for this website</a>
            </p>
        </div>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6648935279137944"
        crossorigin="anonymous"></script>
    <ins class="adsbygoogle"
        style="display:block; text-align:center;"
        data-ad-layout="in-article"
        data-ad-format="fluid"
        data-ad-client="ca-pub-6648935279137944"
        data-ad-slot="7875664514"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <hr class="border-red-950 w-full my-5">
    <div class="flex flex-col justify-start w-full items-center my-5">
        <h1 class="text-5xl text-[#9F0000] font-bold mt-3 mb-5 text-left w-full">
            About PDF Merger
        </h1>
        <figure class="flex flex-col items-center justify-center w-full">
            <img class="rounded-2xl w-full" width="958px" height="489px" src="{{ asset('images/img-about.webp') }}" alt="About Us Image">
        </figure>
        <p class="mt-6 text-xl text-black text-left w-full">
            Welcome to PDF Merger, the ultimate solution for merging your PDF documents quickly
            and conveniently. Created by <a href="mailto:dfe0990ngc@gmail.com" class="font-bold">Nelson Cañete</a>, our user-friendly tool is designed with
            your convenience in mind, allowing you to merge multiple PDF files effortlessly.
        </p>
        <p class="mt-6 text-xl text-black text-left w-full">
            At PDF Merger, we understand the importance of simplicity and efficiency.
            Our intuitive interface makes it easy for anyone to combine PDFs with just a
            few clicks. Whether you're a student, professional, or simply someone looking to
            streamline their workflow, our tool is perfect for you.
        </p>
        <p class="mt-6 text-xl text-black text-left w-full">
            Say goodbye to cumbersome software and complicated processes. With PDF Merger,
            you can merge your PDFs in seconds, saving you time and hassle. Plus, our tool
            is completely free to use, so you can enjoy all the benefits without breaking
            the bank.
        </p>
        <p class="mt-6 text-xl text-black text-left w-full">
            Our commitment to excellence extends beyond just merging PDFs. We prioritize
            user experience and satisfaction above all else, constantly striving to improve
            our tool to meet your needs. Whether you're merging two documents or twenty,
            PDF Merger is here to make your life easier.
        </p>
        <p class="mt-6 text-xl text-black text-left w-full">
            Experience the convenience of merging PDFs with PDF Merger today. Try it now and
            see the difference for yourself!
        </p>
    </div>
    <hr class="border-red-950 w-full my-5">
    <div class="flex flex-col justify-start w-full items-center my-5">
        <h1 class="text-5xl text-[#9F0000] font-bold mt-3 mb-5 text-left w-full">
            Support for PDF Merger
        </h1>
        <figure class="flex flex-col items-center justify-center w-full">
            <img class="rounded-2xl w-full" width="958px" height="489px" src="{{ asset('images/img-donation.webp') }}" alt="Donation Image">
        </figure>
        <p class="mt-6 text-xl text-black text-left w-full">
            Thank you for considering making a donation to support the development and enhancement
            of PDF Merger. Your generosity helps us continue improving our tool and providing valuable
            features to our users.
        </p>

        <h2 class="text-4xl text-[#9F0000] mt-6 mb-4 w-full text-left font-bold">Donation Options:</h2>
        <div class="flex flex-col justify-start items-center gap-8 sm:flex-row w-full sm:justify-center sm:items-center">
            <div class="relative flex flex-col justify-start items-center bg-white/95 w-80 h-auto p-5 sm:h-96 text-black mt-24 rounded-lg shadow-2xl transition-all hover:scale-105">
                <figure class="w-[120px] -mt-4 absolute -top-12 left-[50%] -translate-x-1/2">
                    <img class="rounded-full shadow-md" src="{{ asset('images/img-gcash-logo.webp') }}" width="186px" height="186px" alt="GCash Logo">
                </figure>
                <div class="w-full mt-6">
                    <p class="text-red-950 font-semibold">Name:</p>
                    <p class="w-full font-bold mb-6 text-lg">NELSON G. CAÑETE</p>
                    <p class="text-red-950 font-semibold">Account Number:</p>
                    <p class="w-full font-bold mb-6 text-lg">+639978509514</p>
                </div>
            </div>
            <div class="relative flex flex-col justify-center items-start bg-white/95 w-80 h-auto p-5 sm:h-96 text-black mt-24 rounded-lg shadow-2xl transition-all hover:scale-105">
                <figure class="w-[120px] -mt-4 absolute -top-12 left-[50%] -translate-x-1/2">
                    <img class="rounded-full shadow-md" src="{{ asset('images/img-bank-logo.webp') }}" width="186px" height="186px" alt="Bank Logo">
                </figure>
                <div class="w-full mt-8">
                    <p class="text-red-950 font-semibold">Bank Name:</p>
                    <p class="w-full font-bold mb-6 text-lg">BANK OF THE PHILIPPINE ISLANDS</p>
                    <p class="text-red-950 font-semibold">Account Name:</p>
                    <p class="w-full font-bold mb-6 text-lg">NELSON G. CANETE</p>
                    <p class="text-red-950 font-semibold">Account Number:</p>
                    <p class="w-full font-bold mb-6 text-lg">8096291967</p>
                    <p class="text-red-950 font-semibold">Branch:</p>
                    <p class="w-full font-bold mb-6 text-lg">BPI AYALA ABREEZA DAVAO</p>
                </div>
            </div>
        </div>

        <p class="mt-10 text-xl text-black text-left w-full">
            Your donation will directly contribute to the ongoing development and maintenance of PDF
            Merge Free, allowing us to implement new features, enhance performance, and provide
            better support to our users.
        </p>

        <p class="mt-6 text-xl text-black text-left w-full">
            We are immensely grateful for your support. Every donation, no matter the size, helps us
            continue our mission of providing a free and efficient PDF merging tool to users worldwide.
        </p>

        <p class="mt-6 text-xl text-black text-left w-full">
            Thank you for helping us make PDF Merge Free even better!
        </p>

        <p class="mt-6 text-xl text-black text-left w-full">
            For any inquiries or to confirm your donation, please contact us at
            <a class="font-bold" href="mailto:pdfmergerauthor@gmail.com">pdfmergerauthor@gmail.com</a>
        </p>
    </div>
    <hr class="border-red-950 w-full my-5">
    <div class="flex flex-col justify-start w-full items-center my-5">
        <h1 class="text-5xl text-[#9F0000] font-bold mt-3 mb-5 text-left w-full">
            Contact Us
        </h1>
        <p class="mt-6 text-xl text-black text-left w-full">
            Have a question, suggestion, or feedback about PDF Merger? We'd love to hear from you!
            Use the form below to get in touch with our team.
        </p>

        <div class="relative flex flex-col justify-start items-center bg-white/95 w-80 sm:w-[65%] sm:max-w-screen-md h-auto p-5 text-black mt-24 rounded-lg shadow-2xl transition-all hover:scale-[1.01]">
            @if(session()->has('message'))
            <p class="text-green-700 font-bold text-lg mt-5 px-5" id="msg-promt">{{ session('message') }}</p>
            @endif

            <figure class="w-[120px] -mt-4 absolute -top-12 -left-[60px]">
                <img class="rounded-full shadow-2xl" src="{{ asset('images/img-pdf-logo.webp') }}" width="186px" height="186px" alt="PDF Logo">
            </figure>
            <form action="{{ url('/contact-us-add') }}" method="POST" id="frm-contact-us">
                @csrf
                <div class="flex flex-col sm:flex-row w-full gap-3 mt-8">
                    <div class="w-full flex flex-col items-start">
                        <label for="name" class="text-sm mb-1">Name:</label>
                        <input required placeholder="e.g John Doe" type="text" name="name" id="name" class="rounded-md p-2 w-full min-w-32 border-slate-700 border-[1px]">
                    </div>

                    <div class="w-full flex flex-col items-start">
                        <label for="email" class="text-sm mb-1">Email:</label>
                        <input required placeholder="sample-email@domain.ext" type="email" name="email" id="email" class="rounded-md p-2 w-full min-w-32 border-slate-700 border-[1px]">
                    </div>
                </div>

                <div class="w-full flex flex-col items-start mt-5">
                    <label for="subject" class="text-sm mb-1">Subject:</label>
                    <input required placeholder="subject" type="text" name="subject" id="subject" class="rounded-md p-2 w-full min-w-32 border-slate-700 border-[1px]">
                </div>

                <div class="w-full flex flex-col items-start mt-5">
                    <label for="message" class="text-sm mb-1">Message/Feedback:</label>
                    <textarea required placeholder="Message/Feedback" name="message" id="message" class="rounded-md p-2 w-full min-w-32 border-slate-700 border-[1px]" rows="7" cols="30"></textarea>
                </div>
            </form>

            <div class="flex flex-col items-center w-full gap-5 mt-5">
                <form action="{{ route('contact_us.upload') }}" method="POST" enctype="multipart/form-data" class="dropzone w-full bg-[#CDB2B2] border-none rounded-md flex flex-wrap justify-center relative" id="multiFilesUploader">
                    @csrf
                    <div class="fallback p-5">
                        <input type="file" name="file">
                        <button type="submit">Upload</button>
                    </div>
                </form>
            </div>

            <button id="btn-submit-message" class="p-2 bg-[#9F0000] font-bold mt-8 text-white w-64 border-none rounded-full transition-all duration-700">Submit</button>
        </div>

        <h2 class="text-4xl text-[#9F0000] mt-8 w-full text-left font-bold">How Can We Help You?</h2>
        <p class="mt-10 text-xl text-black text-left w-full">
            Whether you have a technical issue, a feature request, or just want to share your thoughts,
            we're here to assist you. Our team is dedicated to providing prompt and helpful support to
            all our users.
        </p>

        <p class="mt-6 text-xl text-black text-left w-full">
            Thank you for choosing PDF Merge Free. We appreciate your feedback and look forward to
            serving you better.
        </p>

        <p class="mt-6 text-xl text-black text-left w-full">
            For any inquiries, please contact us at
            <a class="font-bold" href="mailto:pdfmergerauthor@gmail.com">pdfmergerauthor@gmail.com</a>
        </p>
    </div>
@endsection
