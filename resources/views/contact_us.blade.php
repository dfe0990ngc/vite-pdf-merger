@extends('layouts.app')

@section('title', 'PDF Merger | Contact Us')
@section('description', 'Free PDF Merger or Join multiple PDF files into single a file.')

@section('content')
    @vite('./resources/css/dropzone.css')
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
    @vite('./resources/js/contact_us.js')
@endsection
