@section('title', __('Edit Subscriber').' #'. $subscriber->id)

<x-layouts.app>
    <div class="bg-white shadow rounded-xl p-5">
        <h1 class="text-center">@yield('title')</h1>

        <form action="{{ route('dashboard.subscribers.update', $subscriber) }}" method="POST" class="mt-5">
            @csrf
            @method('PUT')

            <div class="form-controls">
                <x-form-control name="name">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $subscriber->name) }}" class="default">
                    <x-input-error :messages="$errors->get('name')" />
                </x-form-control>

                <x-form-control name="email">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $subscriber->email) }}" class="default">
                    <x-input-error :messages="$errors->get('email')" />
                </x-form-control>

                <x-form-control name="is_active">
                    <label class="checkbox">
                        <input type="checkbox" name="is_active" value="1" @checked($errors->any() ? old('is_active') : $subscriber->is_active)>
                        <span>{{ __('Active') }}</span>
                    </label>
                </x-form-control>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</x-layouts.app>
