<div>
{{--
    <div x-data="{ showSuccess: false, showError: false }"
    x-init=" $nextTick(() =>
    window.livewire.on('userCreated', () => { showSuccess = true;
        setTimeout(() => showSuccess = false, 3000); });
    window.livewire.on('userCreationFailed', () => { showError = true;
        setTimeout(() => showError = false, 3000); })">

        <div x-show="showSuccess" class="alert alert-success"
            style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
            User successfully created.
        </div>


        <div x-show="showError" class="alert alert-danger"
            style="position: fixed; top: 20px; right: 20px; z-index: 1000;">
            Failed to create user.
        </div>

    </div> --}}

    <form wire:submit='create'>

        <div class="space-y-12 max-w-7xl mx-auto px-8">


            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

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

                    <div class="sm:col-span-3">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="mt-2">
                            <input wire:model='password' type="password" name="password" id="password"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('password')
                            <em>{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="passwordConfirmation"
                            class="block text-sm font-medium leading-6 text-gray-900">repeat Password</label>
                        <div class="mt-2">
                            <input wire:model='passwordConfirmation' type="password" name="passwordConfirmation"
                                id="passwordConfirmation"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @error('passwordConfirmation')
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
                            <input wire:model='city' type="text" name="city" id="city" autocomplete="address-level2"
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
            <button type="button" wire:click='clear'
                class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
