<x-secondary-button class="flex items-center justify-center" x-data @click="window.location.href='{{ route('social-auth.redirect-to-provider', ['provider' => 'github']) }}'">
    <x-bi-github class="w-5 h-5 mr-1"/>
    <span class="ms-2">{{ __('GitHub') }}</span>
</x-secondary-button>

<x-secondary-button class="flex items-center justify-center" x-data @click="window.location.href='{{ route('social-auth.redirect-to-provider', ['provider' => 'google']) }}'">
    <x-bi-google class="w-5 h-5 mr-1"/>
    <span class="ms-2">{{ __('Google') }}</span>
</x-secondary-button>

