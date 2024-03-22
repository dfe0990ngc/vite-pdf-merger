@extends('layouts.app')

@section('title', 'PDF Merger | Support or Donate')
@section('description', 'Free PDF Merger or Join multiple PDF files into single a file.')

@section('content')
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
@endsection
