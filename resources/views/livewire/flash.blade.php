<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-8">

    @if (session()->has('success'))
        <div x-show="show" x-transition:leave="transition ease-in duration-2000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="bg-green-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-green-800 items-center text-green-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-xs font-bold mr-3">Ok</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session('success') }}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                </svg>
            </div>
    @endif

    @if (session()->has('error'))
        <div x-show="show" x-transition:leave="transition ease-in duration-2000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="bg-red-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Ok</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session('error') }}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                </svg>
            </div>
    @endif

    @if (session()->has('email'))
        <div x-show="show" x-transition:leave="transition ease-in duration-2000" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="bg-red-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-red-800 items-center text-red-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span class="flex rounded-full bg-red-500 uppercase px-2 py-1 text-xs font-bold mr-3">Ok</span>
                <span class="font-semibold mr-2 text-left flex-auto">{{ session('error') }}</span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                </svg>
            </div>
    @endif

</div>
