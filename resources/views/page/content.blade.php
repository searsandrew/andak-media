<x-guest-layout>
    <livewire:page-banner :content="$content" />
    <div class="sm:py-12">
        <livewire:product-card :content="$content" />
        <x-social-card />
    </div>
</x-guest-layout>