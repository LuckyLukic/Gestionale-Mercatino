<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ "$title | LaraGest" ?? 'LaraGest' }}</title>

    @livewireStyles
</head>

<body>
    <header>

        <livewire:navbar>

    </header>
    <div class="my-6">
        <livewire:flash>
    </div>


    {{ $slot }}

    @livewireScripts
</body>

</html>
