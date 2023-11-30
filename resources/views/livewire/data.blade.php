<div>

    <h1 class="text-center mb-8">UTENTI</h1>

    {{-- <livewire:search-bar> --}}
    <form x-data="{ isOpen: false }" class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-8">
        <div class="flex">
            <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only"></label>
            <button @click="isOpen = !isOpen" id="dropdown-button" data-dropdown-toggle="dropdown"
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                type="button">{{ $term }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg></button>
            <div x-show="isOpen" id="dropdown" class="z-10 bg-white rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdown-button">
                    <li>
                        <button type="button" wire:click="updateTerm('name')"
                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100  "
                            @click="isOpen = false">Name</button>
                    </li>
                    <li>
                        <button type="button" wire:click="updateTerm('surname')"
                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100  "
                            @click="isOpen = false">Surname</button>
                    </li>
                    <li>
                        <button type="button" wire:click="updateTerm('city')"
                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100  "
                            @click="isOpen = false">City</button>
                    </li>
                    <li>
                        <button type="button" wire:click="updateTerm('email')"
                            class="inline-flex w-full px-4 py-2 hover:bg-gray-100 "
                            @click="isOpen = false">Email</button>
                    </li>
                </ul>
            </div>
            <div class="relative w-full">
                <input type="search" id="search-dropdown" wire:model.live.bounce.3='todo'='search'
                    class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500     "
                    placeholder="Your Search." name="search" wire:model.live='search'>
                <button type="button"
                    class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>




    <div class="relative overflow-x-auto  sm:rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-8">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mb-8">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="pe-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        surname
                    </th>
                    <th scope="col" class="px-6 py-3">
                        city
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="ps-6 py-3">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr wire:key='{{ $user->id }}' class="bg-white border-b  hover:bg-gray-50 ">
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap ">
                            <div> {{ $user->id }}</div>
                        </th>
                        <td class="px-6 py-4">
                            <div> {{ $user->name }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div>{{ $user->surname }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div> {{ optional($user->address)->city }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div> {{ $user->email }}</div>
                        </td>
                        <td class="ps-6 py-4">
                            <div class="grid grid-cols-3 gap-x-2">

                                <a wire:navigate href="/user/{{ $user->id }}" class="w-full"><button type="button"
                                        class="w-full bg-lime-500 hover:bg-lime-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">View</button>
                                </a>
                                <a wire:navigate href="/user/{{ $user->id }}/update" class="w-full"><button
                                        type="button"
                                        class="w-full bg-sky-500 hover:bg-sky-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Update</button></a>
                                <button wire:click='delete({{ $user->id }})'
                                    wire:confirm='are you sure you want to delete this user?' type="button"
                                    class="w-full bg-red-500 hover:bg-red-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200 ">Remove</button>

                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $users->links() }}

    </div>
</div>
