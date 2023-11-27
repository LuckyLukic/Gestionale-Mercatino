<div>

    <h1 class="text-center mb-8">UTENTI</h1>

    <div class="grid grid-cols-4 max-w-7xl mx-auto px-8 mb-5">
        <div> Nome e Cognome</div>
        <div> Città</div>
        <div> email</div>
        <div> azione</div>
    </div>

    @foreach ($users as $user)
        <div class="grid grid-cols-4 max-w-7xl mx-auto px-8 mb-2">
            <div> {{$user->name}} {{$user->surname}}</div>

                <div> {{$user->address->city}}</div>


            <div> {{$user->email}}</div>
            <div class="grid grid-cols-3 gap-x-2">

                <a href="" class="w-full"><button type="button" class="w-full bg-lime-500 hover:bg-lime-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">View</button> </a>
                <a href="" class="w-full"><button type="button" class="w-full bg-sky-500 hover:bg-sky-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200">Update</button></a>
                <button wire:click='delete({{$user->id}})' wire:confirm='are you sure you want to delete this user?' type="button" class="w-full bg-red-500 hover:bg-red-700 hover:scale-105 text-zinc-200 rounded px-2 py-1 transition ease-in-out delay-50 duration-200 ">Remove</button>

            </div>
        </div>
    @endforeach
</div>
