<x-guest-layout>
    @livewire('site-menu')

    <div class="min-h-[100vh] z-30">
        <livewire:view-product :content="$product" />
        <x-social-card />
    </div>
</x-guest-layout>