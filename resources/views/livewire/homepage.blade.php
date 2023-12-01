<div>

    <livewire:flash>

        <div class="bg-white py-24 sm:py-60 ">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                        <dt class="text-base leading-7 text-gray-600">Active Customers</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            {{ $totalUsers }}
                        </dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                        <dt class="text-base leading-7 text-gray-600">Total Items</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            {{ $totalItems }}

                        </dd>
                    </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                        <dt class="text-base leading-7 text-gray-600">Total Items Value</dt>
                        <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                            ${{ $totalItemsValue }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="bg-white py-24 sm:py-32 ">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-3">
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Avg. Items per Client</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                {{ $averageItemsPerClient }}
                            </dd>
                        </div>
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Best Category</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                {{ $bestCategory->category }}
                            </dd>
                        </div>
                        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                            <dt class="text-base leading-7 text-gray-600">Potential earnings</dt>
                            <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                                ${{ $potentialEarning }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
