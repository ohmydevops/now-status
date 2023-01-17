<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('My Status') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Write your own status description 😎') }}
        </p>
    </header>

    <form method="post" action="{{ route('status.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-textarea-input id="current_status" text="{{ $lastStatus->description ?? '' }}" :rows="10" name="description" class="mt-1 block w-full" autocomplete="current-status" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'status-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Updated.') }}</p>
            @endif
        </div>
    </form>
</section>