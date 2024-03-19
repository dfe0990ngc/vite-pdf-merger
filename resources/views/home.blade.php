@extends('layouts.app')

@section('title', 'PDF Merger | Home')
@section('description', 'Free PDF Merger or Join multiple PDF files into single a file.')

@section('content')

    @vite(['resources/css/dropzone.css','resources/js/home.js'])

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
@endsection
