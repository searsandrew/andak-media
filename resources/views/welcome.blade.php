<x-guest-layout>
    <div class="py-12">
        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse(App\Models\News::all() as $news)
                <a href="#" class="w-full sm:w-1/4 h-52 bg-white overflow-hidden shadow-xl sm:rounded relative flex flex-col">
                    <h2 class="text-slate-700 lighter text-lg antialiased 8-8 relative z-30 p-5 text-white bg-gray-800 hover:text-slate-800 hover:bg-andakTeal bg-opacity-50 transition">{{ $news->title }}</h2>
                    <img src="{{ Storage::url($news->image->image) }}" class="absolute z-10 w-auto min-w-full min-h-full max-w-full" />
                </a>
            @empty
                <span class="text-slate-800 lighter text-lg antialiased">{{ __('Sadly, there is no news to report.') }}</span>
            @endforelse
        </div>
    </div>
</x-guest-layout>
