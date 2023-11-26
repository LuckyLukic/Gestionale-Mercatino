<div>

    <h1 class="text-center mb-8">UTENTI</h1>

    <div class="grid grid-cols-4 max-w-7xl mx-auto px-8 mb-2">
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
            <div> azione</div>
        </div>
    @endforeach
</div>
