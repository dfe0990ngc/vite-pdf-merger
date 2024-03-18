<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <link rel="shortcut icon" href="{{ asset('images/img-logo.webp') }}" type="image/png">

    @vite('./resources/css/app.css')
</head>
<body class="font-sans antialiased min-h-screen relative">
    <table class="w-full h-full absolute m-0 p-0 gap-0 border-0 bg-page bg-contain dark:bg-black dark:text-white/50">
        <thead>
            <tr class="bg-header-footer h-16">
                <td class="p-0">
                    @include('templates.header')
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-0">
                    <main class="w-full flex justify-center items-start">
                        <div class="w-[90%] sm:max-w-screen-lg flex flex-col justify-start items-center py-5">
                            @yield('content')
                        </div>
                    </main>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="bg-header-footer">
                <td class="py-5">
                    @include('templates.footer')
                </td>
            </tr>
        </tfoot>
    </table>
    @vite('./resources/js/app.js')
</body>
</html>
