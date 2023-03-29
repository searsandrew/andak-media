<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div class="flex flex-rows flex-wrap items-center space-between px-4 sm:px-0 mb-6">
            <div class="flex-auto">
                <div class="mt-8 text-2xl">
                    {{ now()->greet() }}
                </div>
                <div class="mb-6 text-gray-500">
                    {{ __('Here\'s whats happening with your :Application account today.', ['application' => config('app.name')]) }}
                </div>
            </div>
            <div class="flex flex-row space-x-2 justify-center">
                @can('author')<button type="button" class="bg-white px-4 py-2 font-lighter uppercase tracking-wider text-sm rounded-lg hover:bg-andakTeal hover:text-teal-100 transition-all duration-300">{{ __('Add News Article') }}</button>@endcan
                @can('admin')<livewire:add-product />@endcan
                @can('order')<button type="button" class="bg-white px-4 py-2 font-lighter uppercase tracking-wider text-sm rounded-lg hover:bg-andakOrange hover:text-orange-100 transition-all duration-300">{{ __('Start an Order') }}</button>@endcan
            </div>
        </div>    
        <div class="flex flex-rows space-x-4">
            <div class="w-full sm:w-2/3 md:w-1/2 flex flex-rows">
                <div class="w-full bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    Charts and shit to look official
                </div>
            </div>
            <div class="w-full sm:w-1/3 md:w-1/4 flex-0 bg-purple-300 sm:rounded-lg">
                New Product add
            </div>
            <div class="w-fill md:w-1/4">
                You probably have a bill to pay
            </div>
        </div>
    </div>
</x-app-layout>