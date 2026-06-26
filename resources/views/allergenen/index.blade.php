@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allergenen Pagina</title>
</head>
<body>
    <div class="Container">

        <h1>{{ $title }}</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
            </div>

            <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">

            @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
            </div>

            <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">
        @endif 

        @if (session('succes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" aria-label="sluiten" data-bs-dismiss="alert"></button>
            </div>
            <meta http-equiv="refresh" content="3;url={{ route('allergeen.index') }}">

        @endif



        <a href="{{ route('allergeen.create') }}" class="btn btn-primary mt-2">Nieuwe Allergeen</a>


        <table class="table">
            <thead>
                <tr>
                    
                    <th>Naam</th>
                    <th>Omschrijving</th>
                    <th class="text-center">Verwijder</th>
                    <th class="text-center">Wijzig</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($allergenen as $allergeen)
                    <tr>
                     
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                        <td>
                            <form action="{{ route('allergeen.destroy', $allergeen->Id) }}" method="POST"
                                onsubmit="return confirm('weet je zeker dat je dit allergeen wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('allergeen.edit', $allergeen->Id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-success btn-sm">Wijzig</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Geen allergenen gevonden</td>
                    </tr>

                @endforelse
            </tbody>
        </table>

    </div>

</body>

</html>