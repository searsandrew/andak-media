<div>
    <button type="button" wire:click="$toggle('addingNews')" class="bg-white px-4 py-2 font-lighter uppercase tracking-wider text-sm rounded-lg hover:bg-andakTeal hover:text-teal-100 transition-all duration-300">{{ __('Add News') }}</button>

    <x-dialog-modal wire:model="addingNews">
        <x-slot name="title">
            {{ __('Add News') }}
        </x-slot>

        <x-slot name="content">
            @if($types->count() > 0)
                <div class="input-group mt-3">
                    <x-label for="news.title" value="{{ __('Title') }}" />
                    <x-input id="news.title" type="text" class="mt-1 block w-full" wire:model.defer="news.title" autocomplete="news.title" />
                    <x-input-error for="news.title" class="mt-2" />
                </div>

                <div class="input-group mt-3">
                    <x-label for="news.content" value="{{ __('Content') }}" />
                    <x-input id="news.content" type="text" class="mt-1 block w-full" wire:model.defer="news.content" autocomplete="news.content" />
                    <x-input-error for="news.content" class="mt-2" />
                </div>

                <div class="input-group mt-3">
                    <x-label for="type" value="{{ __('News Type') }}" />
                    <select wire:model="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        <option value="none">{{ __('Select a News Type') }}</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="type" class="mt-2" />
                </div>

                <div class="input-group mt-3">
                    <x-label for="image" value="{{ __('Banner Image') }}" />
                    <input type="file" wire:model="image">
                    <x-input-error for="image" class="mt-2" />
                </div>

            @else
                <div class="flex flex-row items-center">
                    <x-icon.bomb class="h-16 ml-2 mr-6" />
                    <div class="text-red-700 tracking-wider">{{ __('You cannot create a news article without first setting up at least one type.') }}</div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('addingNews')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            @if($types->count() > 0)
                <x-button class="ml-3"
                            wire:click="addNews"
                            wire:loading.attr="disabled">
                    {{ __('Add News') }}
                </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>
