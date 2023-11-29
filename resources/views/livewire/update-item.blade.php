<div>
    <form wire:submit='updateItem'>

        <div class="space-y-12 max-w-7xl mx-auto px-8">


            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">New Item</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input wire:model='name' type="text" name="name" id="name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('name')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-2 relative text-left" x-data="{ open: false, selectedOption: @entangle('category') }">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <div class="mt-2 flex">
                            <input type="text" x-model="selectedOption"
                                @input="$wire.set('category', selectedOption)" {{-- conflict with wire:model, this prevent the conflict and pass selectedOption value to category in the component --}}
                                class="block w-full rounded-l-md border-r-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Selected category" name="category" id="category" readonly>

                            <button type="button" @click="open = !open"
                                class="inline-flex justify-center gap-x-1.5 rounded-r-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Options
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                        </div>
                        @error('category')
                            <em>{{ $message }}</em>
                        @enderror

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none" x-show="open" @click.away="open=false">
                                <button type="button"
                                    @click="selectedOption = 'Libro'; $wire.set('category', 'libro'); open = false"
                                    class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                    id="menu-item-0">Libro</button>
                                <button type="button"
                                    @click="selectedOption = 'Gioiello'; $wire.set('category', 'gioiello'); open = false"
                                    class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                    id="menu-item-1">Gioiello</button>
                                <button type="button"
                                    @click="selectedOption = 'Altro'; $wire.set('category', 'altro'); open = false"
                                    class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                    id="menu-item-2">Altro</button>
                            </div>
                        </div>
                    </div>


                    <div class="col-span-1 col-start-1">
                        <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                        <div class="mt-2">
                            <input wire:model='quantity' id="quantity" name="quantity" type="text"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('quantity')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-1 col-start-1">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                        <div class="mt-2">
                            <input wire:model='price' type="text" name="price" id="price"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('price')
                                <em>{{ $message }}</em>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea wire:model='description' type="text" textarea=name="description" id="description"
                                autocomplete="address-level2" rows="5"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            <small class=" col-span-2 flex place content around">Characters left: <span
                                    x-text="255 - $wire.description.length"> </span>
                            </small>
                            @error('description')
                                <em>{{ $message }}</em>
                            @enderror

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-6 max-w-7xl mx-auto px-8 flex items-center justify-end gap-x-6">

            <button type="submit" wire:confirm='are you sure you want to update this item?'
                class="w-full bg-sky-500 hover:bg-sky-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Update
                Item</button>
            <button wire:click='delete' type="button" wire:confirm='are you sure you want to delete this item?'
                class="w-full bg-red-500 hover:bg-red-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200 ">Delete</button>

        </div>
    </form>
</div>
