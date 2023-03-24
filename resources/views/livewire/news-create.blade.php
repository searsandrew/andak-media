<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add News Article') }}
        </h2>
    </x-slot>

    @if($types->count > 0)
        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="save">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="news.title" value="{{ __('Title') }}" />
                    <x-input id="news.title" type="text" class="mt-1 block w-full" wire:model.defer="news.title" autocomplete="news.title" />
                    <x-input-error for="news.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="news.content" value="{{ __('Content') }}" />
                    <x-input id="news.content" type="text" class="mt-1 block w-full" wire:model.defer="news.content" autocomplete="news.content" />
                    <x-input-error for="news.content" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="image" value="{{ __('Banner Image') }}" />
                    <input type="file" wire:model="image">
                    <x-input-error for="image" class="mt-2" />
                </div>
                
                <x-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-action-message>

                <x-button>
                    {{ __('Save') }}
                </x-button>
            </form>
        </div>
    @else
        <h3 class="text-lg text-lighter text-slate-700">{{ __('Setup Types Before Continuing') }}</h3>
    @endif
</div>