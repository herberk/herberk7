<tr>
{{--    <td>{{ $activites->id }}</td>--}}
    <td>{{ $activites->created_at->format('d/m/Y') }}</td>
    <td>{{ $activites->log_name }}</td>
    <td>{{ $activites->description }}</td>
    <td>{{ $activites->causer_id }}</td>
    <td>{{ $activites->properties }}</td>
</tr>

