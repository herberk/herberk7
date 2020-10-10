@if (Session::has('message'))
    <div class="alert alert-success" style="width: 600px; text-align: justify">
            <strong>{{ Session::get('message')}}</strong>
    </div>
@endif
