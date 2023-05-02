<header class="relative flex flex-col items-top justify-center h-[30vh] sm:h-[50vh] overflow-hidden">
    @livewire('site-menu')
    <video autoplay loop muted class="absolute z-10 w-auto sm:min-w-full min-h-full sm:max-w-full">
        <source src="media/header.mp4" type="video/mp4" />
        {{ __('Your browser does not support the video tag.') }}
    </video>
</header>