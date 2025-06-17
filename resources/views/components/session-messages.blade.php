@if (session()->has('success'))
    <x-alert type="success" :message="session('success')" :closable="true" />
@endif

@if (session()->has('error'))
    <x-alert type="error" :message="session('error')" :closable="true" />
@endif
