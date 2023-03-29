<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Types') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-form-section submit="createNewType">
                <x-slot name="title">
                    {{ __('Create a new Product Type') }}
                </x-slot>

                <x-slot name="description" class="flex flex-col space-y-6">
                    <p class="w-full">{{ __('Adding product types help categorize the products featured in the application. Product types are high-level categories and have attributes applied to them, which are then required when entering a new product.') }}</p>
                    <p class="w-full">{{ __('If a type does not include an icon definition, it will use a default icon on the news feed.') }}</p>
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <div class="flex flex-row space-x-3 col-span-6 sm:col-span-4">
                        <div class="w-1/2">
                            <x-label for="iconCode" value="{{ __('Icon SVG Code') }}" />
                            <x-input id="iconCode" type="text" class="mt-1 block w-full" wire:model.defer="iconCode" autocomplete="iconCode" />
                            <span class="text-xs italic text-slate-700 leading-3">{{ __('Do not include the SVG tags.') }}</span>
                            <x-input-error for="iconCode" class="mt-2" />
                        </div>
                        <div class="w-1/2">
                            <x-label for="viewBox" value="{{ __('ViewBox') }}" />
                            <x-input id="viewBox" type="text" class="mt-1 block w-full" wire:model.defer="viewBox" autocomplete="viewBox" />
                            <span class="text-xs italic text-slate-700 leading-3">{{ __('Copy the viewBox attribute verbatim.') }}</span>
                            <x-input-error for="viewBox" class="mt-2" />
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3 col-span-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ __('Add Attributes') }}</h3>
                        <p class="text-sm text-gray-600">{{ __('Attributes are used to identify searchable and technical information about a product. This information should be treated at short concise "facts". Descriptive output should be saved for product content.') }}</p>
                        <p class="text-sm text-slate-900 font-bold">{{ __('If an attribute is a selectable variant, be sure to check the "variable" flag.') }}</p>
                    </div>
                    <div class="flex flex-col space-y-3 col-span-6 sm:col-span-4">
                        <div class="flex flex-rowflex items-start space-x-3">
                            <div class="w-1/2">
                                <x-label for="attribute.name" class="sr-only" value="{{ __('Attribute Name') }}" />
                                <x-input id="attribute.name" type="text" class="block w-full" placeholder="Attribute Name" wire:model="attribute.name" autocomplete="attribute.name" />
                                <x-input-error for="attribute.name" class="mt-2" />
                            </div>
                            <div class="input-group w-1/3">
                                <x-label for="type" class="sr-only" value="{{ __('Attribute Type') }}" />
                                <select wire:model="attribute.type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full @if($attribute['type'] == 'default') text-slate-500 @else text-black @endif">
                                    <option value="default" >{{ __('Select Type') }}</option>
                                    <option value="string">{{ __('Text Field') }}</option>
                                    <option value="float">{{ __('Number Only (No Text)') }}</option>
                                    <option value="array">{{ __('Variable') }}</option>
                                </select>
                                <x-input-error for="attribute.type" class="mt-2" />
                            </div>
                            <div class="input-group w-1/6 flex items-center">
                                <span class="inline-flex items-center px-4 py-2 bg-gray-50 border border-transparent rounded-md font-semibold text-sm text-teal-800 uppercase tracking-widest hover:bg-andakTeal/30 hover:text-teal-900 active:bg-teal-800 active:text-teal-50 transition ease-in-out duration-150 cursor-pointer place-content-center text-center" wire:click="addRowToAttributes">{{ __('Add') }}</span>
                            </div>
                        </div>
                    </div>
                    <ul class="col-span-6 divide-y col-span-6 sm:col-span-4">
                        @foreach($attributes as $key => $attribute)
                            <li class="py-3" data-index="{{ $key }}">{{ $attribute['name'] }} ({{ $attribute['type'] }}) <input type="hidden" wire:model='attributes.{{ $key }}' /></li>
                        @endforeach
                    </ul>
                </x-slot>


                <x-slot name="actions">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-action-message>

                    <x-button wire:loading.attr="disabled" wire:target="photo">
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>
            <x-section-border />
        </div>
    </div>
</div>