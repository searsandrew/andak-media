<div>
    <button type="button" wire:click="$toggle('addingProduct')" class="bg-white px-4 py-2 font-lighter uppercase tracking-wider text-sm rounded-lg hover:bg-andakTeal hover:text-teal-100 transition-all duration-300">{{ __('Add Product') }}</button>

    <x-dialog-modal wire:model="addingProduct">
        <x-slot name="title">
            {{ __('Add Product') }}
        </x-slot>

        <x-slot name="content">
            @if($types->count() > 0)
                <div class="input-group mt-3">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="product.name" autocomplete="name" />
                    <x-input-error for="product.name" class="mt-2" />
                </div>

                <div class="input-group mt-3">
                    <x-label for="type" value="{{ __('Product Type') }}" />
                    <select wire:model.defer="product.type_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="product.type_id" class="mt-2" />
                </div>
            @else
                <div class="flex flex-row items-center">
                    <x-icon.bomb class="h-16 ml-2 mr-6" />
                    <div class="text-red-700 tracking-wider">{{ __('You cannot create a product without first setting up at least one type.') }}</div>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('addingProduct')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            @if($types->count() > 0)
                <x-button class="ml-3"
                            wire:click="addProduct"
                            wire:loading.attr="disabled">
                    {{ __('Add Product') }}
                </x-button>
            @endif
        </x-slot>
    </x-dialog-modal>
</div>
