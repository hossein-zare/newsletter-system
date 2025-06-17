@section('title', __('Newsletter'))

<x-layouts.app :navigation="true">
    <div class="bg-white shadow rounded-xl p-5">
        <h1 class="text-center">@yield('title')</h1>

        <form action="{{ route('dashboard.newsletter.start') }}" method="POST" class="text-center mt-5">
            @csrf

            <button type="submit" class="btn btn-primary">{{ __('Start the Campaign') }}</button>
        </form>
    </div>
</x-layouts.app>
