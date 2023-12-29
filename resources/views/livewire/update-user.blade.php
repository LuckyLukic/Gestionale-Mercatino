<div>

    <form wire:submit='create'>

        <div class="space-y-12 max-w-7xl mx-auto px-8">


            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="id" class="block text-sm font-medium leading-6 text-gray-900">ID</label>
                        <div class="mt-2">
                            <input wire:model='userId' type="text" name="id" id="id" readonly
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input wire:model='name' type="text" name="name" id="name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('name')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>


                    <div class="sm:col-span-3">
                        <label for="surname" class="block text-sm font-medium leading-6 text-gray-900">Last
                            name</label>
                        <div class="mt-2">
                            <input wire:model='surname' type="text" name="surname" id="surname"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('surname')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address</label>
                        <div class="mt-2">
                            <input wire:model='email' id="email" name="email" type="email"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('email')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Street
                            address</label>
                        <div class="mt-2">
                            <input wire:model='address' type="text" name="address" id="address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('address')
                                <em>{{ $message }}</em>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <input wire:model='city' type="text" name="city" id="city"
                                autocomplete="address-level2"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                            @error('city')
                                <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="province" class="block text-sm font-medium leading-6 text-gray-900">State /
                            Province</label>
                        <div class="mt-2">
                            <input wire:model='province' type="text" name="province" id="province"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('province')
                                <em>{{ $message }}</em>
                            @enderror

                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="postalcode" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                            code</label>
                        <div class="mt-2">
                            <input wire:model='postalcode' type="text" name="postalcode" id="postalcode"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('zipcode')
                                <em>{{ $message }}</em>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-6 max-w-7xl mx-auto px-8 flex items-center justify-end gap-x-6">

            <a href="/user/{{ $userId }}/create-item/" class="w-full"> <button type="button"
                    class="w-full bg-green-500 hover:bg-green-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Add
                    Item</button></a>

            <button type="button" wire:click='update()' wire:confirm='are you sure you want to update this user?'
                class="w-full bg-sky-500 hover:bg-sky-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Update</button>
            <button wire:click='delete()' wire:confirm='are you sure you want to delete this user?' type="button"
                class="w-full bg-red-500 hover:bg-red-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200 ">Remove</button>

        </div>
    </form>

</div>
