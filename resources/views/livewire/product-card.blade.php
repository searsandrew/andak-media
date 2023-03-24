<div>

    @forelse($companyNews as $news)
        <a href="{{ route('view.news', $news) }}" class="group w-full h-72 sm:h-52 bg-white overflow-hidden shadow hover:shadow-lg hover:shadow-teal-800 sm:rounded relative flex flex-col justify-between js-show-on-scroll transition duration-700 ease-in-out">
            <span class="w-full bg-black bg-opacity-50 group-hover:bg-andakTeal group-hover:bg-opacity-75 z-20 flex flex-row justify-between transition">
                <x-category-icon :icon="$news->category" />
                <span class="text-white text-sm pr-1 leading-6">{{ $news->created_at->toFormattedDateString() }}</span>
            </span>
            <img src="{{ Storage::url($news->image->image) }}" class="absolute z-10 w-auto min-w-full min-h-full max-w-full" />
            <span class="w-full bg-black group-hover:bg-teal-900 z-20 flex flex-row transition">
                <span class="text-white text-sm leading-4 px-2 py-1">{{ $news->title }}</span>
            </span>
        </a>
    @empty
        <span class="text-slate-800 lighter text-lg antialiased">{{ __('Sadly, there is no news to report.') }}</span>
    @endforelse

</div>
