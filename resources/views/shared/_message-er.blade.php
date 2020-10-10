@if (Session::has('error'))
    <div class="alert alert-danger" style="width: 600px; text-align: justify">
            <strong>{{ Session::get('error')}}</strong>
    </div>
@endif
