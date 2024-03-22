@extends('layouts.app')

@section('title', 'PDF Merger | Unsubscribe')
@section('description', 'Free PDF Merger or Join multiple PDF files into single a file.')

@section('content')
    <div class="flex flex-col justify-start w-full items-center my-5 py-5">
        @if ($is_subscribed !== FALSE)
            <h1 class="text-5xl text-[#9F0000] font-bold mt-3 mb-5 text-center w-full">
                Unsubscribe Confirmation
            </h1>
            <p class="mt-6 text-xl text-black text-left w-full">
                We're sorry to see you leave! If you have a moment, we'd love to hear why you're 
                unsubscribing. Your feedback helps us improve.
            </p>

            <p class="mt-10 text-xl text-black text-left w-full">
                Thank you for being part of our PDF Merger community!
            </p>

            <form class="w-full my-5" action="{{ route('subscriber.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <button class="p-2 bg-[#9F0000] font-bold mt-8 text-white w-64 border-none rounded-full transition-all duration-700">Click here to unsubscribe</button>
            </form>
        @else
            <h1 class="text-5xl text-[#9F0000] font-bold mt-3 mb-5 text-center w-full">
                You are already unsubscribed!
            </h1>
            <p class="mt-10 text-xl text-black text-center w-full">
                You can re-subscribe anytime using the form at the bottom of this page.
            </p>
        @endif
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
@endsection
