<!-- resources/views/components/package-card.blade.php -->
@props(['package'])

<div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-brand-blue-600 flex flex-col h-full">
    <h3 class="text-2xl font-semibold text-brand-blue-600 mb-4">{{ $package['name'] }}</h3>
    <p class="text-3xl font-bold text-brand-red-700 mb-4">
        @if($package['price'] === 'Sur mesure')
            {{ $package['price'] }}
        @else
            {{ number_format($package['price'], 0, ',', ' ') }} FCFA
        @endif
    </p>
    <ul class="text-gray-700 mb-6 flex-grow">
        @foreach($package['features'] as $feature)
            <li class="mb-2 flex items-start">
                <svg class="w-5 h-5 text-brand-blue-500 mr-2 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                {{ $feature }}
            </li>
        @endforeach
    </ul>
    <a href="{{ $package['link'] }}" target="_blank" rel="noopener noreferrer" 
       class="block w-full text-center bg-brand-blue-600 text-white px-4 py-2 rounded-lg hover:bg-brand-blue-700 transition-colors mt-auto">
        {{ $package['cta'] ?? 'Choisir ce forfait' }}
    </a>
</div>