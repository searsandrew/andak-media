<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-3 lg:gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
    @forelse($products as $product)
        <a href="{{ route('view.product', [$type, $product]) }}" class="group w-full h-72 sm:h-52 bg-white overflow-hidden shadow hover:shadow-lg hover:shadow-teal-800 sm:rounded relative flex flex-col justify-between js-show-on-scroll transition duration-700 ease-in-out">
            <img src="{{ Storage::url($product->image->image) }}" class="absolute z-10 w-auto min-w-full min-h-full max-w-full place-self-end" />
        </a>
    @empty
        <span class="text-slate-800 lighter text-lg antialiased">{{ __('Sadly, there are no products available.') }}</span>
    @endforelse

</div>
