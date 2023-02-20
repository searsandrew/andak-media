<x-guest-layout>
    <div class="py-12">
        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse(App\Models\News::all() as $news)
                <span class="w-full px-2 py-3 sm:w-1/4 h-1/3 bg-white overflow-hidden shadow-xl sm:rounded">
                    <h2 class="text-slate-700 lighter text-lg antialiased">{{ $news->title }}</h2>
                    <img src="{{ asset($news->image->image) }}" />

                    @if(File::exists($news->image->image))
                        Fuck yes
                    @else
                        Fuck No
                    @endif
                </span>
            @empty
                <span class="text-slate-800 lighter text-lg antialiased">{{ __('Sadly, there is no news to report.') }}</span>
            @endforelse
        </div>
    </div>
</x-guest-layout>
