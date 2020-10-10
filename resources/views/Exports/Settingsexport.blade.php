<table class="table table-sm">
    <tr>
        <thead class="thead-dark">
        <th>Configuracion</th>
        <th>Valor</th>
        <th>Accessor</th>
        </thead>
    </tr>
    @forelse($Settings as $setting)
        <tr>
            <td>{{ $setting->name }}</td>
            <td>{{ $setting->val }}</td>
            <td><code>\setting('{{ $setting->name }}')</code></td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="text-center">No hay configuraciones guardadas en DB.</td>
        </tr>
    @endforelse
</table>