@php
    $news = App\Models\News::firstWhere('slug', $news);
@endphp

<x-guest-layout>
    <x-slot name="header">
        <!-- Header -->
        <header class="relative flex flex-col items-top justify-top h-[50vh] overflow-hidden">
            @livewire('site-menu')
            <img src="../media/banner.png" class="absolute z-10 w-auto min-w-full min-h-full max-w-full" />
        </header>
    </x-slot>


    <div class="py-12">
        <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-1/4 shrink-0">
                Sidebar
            </div>
            
            <article class="bg-white rounded drop-shadow px-4 py-3">
                <h2 class="text-lg text-slate-800 antialiased lighter">{{ $news->title }}</h2>
                <small>{{ $news->created_at->toFormattedDateString() }} by {{ $news->user->name }}</small>
                <hr class="my-3" />
                {!! Str::markdown($news->content, ['html_input' => 'strip']) !!}
            </article>
        </div>
    </div>
</x-guest-layout>