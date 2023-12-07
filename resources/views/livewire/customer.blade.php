<div class="space-y-12 max-w-7xl mx-auto px-8">

    <livewire:flash>

        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Customer Information </h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">ID {{ $user->id }}</p>
        </div>
        <div class="mt-6 border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->name }}
                        {{ $user->surname }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Full Address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        {{ optional($user->address)->address }}, {{ optional($user->address)->city }},
                        {{ optional($user->address)->province }}, {{ optional($user->address)->postalcode }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Total Items on sale</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $totalItems }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-gray-900">Total amount on sale</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">$120,000</dd>
                </div>

                <div id="accordionExample" x-data="{ open: false }">
                    <div class="rounded-t-lg border border-neutral-200 bg-white mb-8">
                        <h2 class="mb-0" id="headingOne">
                            <button @click="open = !open"
                                class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] "
                                type="button" data-te-collapse-init data-te-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                SHOW ITEMS
                                <span
                                    class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </span>
                            </button>
                        </h2>
                        <div x-show="open" id="collapseOne" class="!visible" data-te-collapse-item
                            data-te-collapse-show aria-labelledby="headingOne" data-te-parent="#accordionExample">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg max-w-7xl mx-auto px-8">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                        <tr>
                                            <th scope="col" class="pe-6 py-3">
                                                id
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                name
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                description
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                price
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                quantity
                                            </th>
                                            <th scope="col" class="ps-6 py-3">
                                                action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->items as $item)
                                            <tr wire:key='{{ $item->id }}'
                                                class="bg-white border-b  hover:bg-gray-50 ">
                                                <th scope="row"
                                                    class="py-4 font-medium text-gray-900 whitespace-nowrap ">
                                                    <div> {{ $item->id }}</div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    <div> {{ $item->name }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div>{{ str($item->description)->words(8) }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div> {{ $item->price }}</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div> {{ $item->quantity }}</div>
                                                </td>
                                                <td class="ps-6 py-4">
                                                    <div class="grid grid-cols-2 gap-x-2">

                                                        <a wire:navigate
                                                            href="/user/{{ $user->id }}/update-item/{{ $item->id }}"
                                                            class="w-full"><button type="button"
                                                                class="w-full bg-sky-500 hover:bg-sky-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Update</button></a>
                                                        <button wire:click='delete({{ $item->id }})'
                                                            wire:confirm='are you sure you want to delete this user?'
                                                            type="button"
                                                            class="w-full bg-red-500 hover:bg-red-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200 ">Remove</button>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


            </dl>
        </div>

</div>
