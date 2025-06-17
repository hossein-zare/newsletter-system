@section('title', __('Subscribers'))

<x-layouts.app>
    <div class="bg-white shadow rounded-xl p-5">
        <div class="overflow-x-auto">
            <table class="default">
                <thead>
                    <tr>
                        <th class="text-start">#</th>
                        <th class="text-start">{{ __('Name') }}</th>
                        <th class="text-start">{{ __('Email') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th class="text-start">{{ __('Subscription Date') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <td class="text-start">{{ $subscriber->id }}</td>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td class="text-center">
                                @if ($subscriber->is_active)
                                    <span class="badge badge-success">{{ __('Active') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                @endif
                            </td>
                            <td>{{ $subscriber->created_at }}</td>
                            <td>
                                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse">
                                    <a href="{{ route('dashboard.subscribers.edit', $subscriber) }}">{{ __('Edit') }}</a>

                                    <form action="{{ route('dashboard.subscribers.destroy', $subscriber) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button>{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($subscribers->isEmpty())
                        <tr>
                            <td class="text-center" colspan="100">{{ __('There\'s nothing to show.') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    {{ $subscribers->links() }}
</x-layouts.app>
