
{{-- @if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </div>
@endif --}}

{{-- @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p>{{ session('message') }}</p>
    </div>
@endif --}}

@if (session('success_message'))
        {{ session('success_message') }}
@endif


{{-- @if (session('error'))
        {{ session('errors_message') }}
@endif --}}





