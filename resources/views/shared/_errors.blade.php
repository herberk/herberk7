@if ($errors->any())
    <div class="alert alert-danger" style="width: 600px; text-align: justify">
        <h6>Por favor corrige los errores de bajo:</h6>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
