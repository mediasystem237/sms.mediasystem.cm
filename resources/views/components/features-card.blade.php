<!-- resources/views/components/features-card.blade.php -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-brand-blue-600 mb-12">
            Cas d'utilisation du Bulk SMS Marketing par secteur d'activité
        </h2>
        <!-- Grid layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($features as $feature)
                <div class="relative bg-white p-6 rounded-lg shadow-lg border-t-4 border-brand-red-500 transition-transform transform hover:scale-105 hover:shadow-2xl">
                    <!-- Icône et Titre -->
                    <div class="flex items-center mb-4">
                        <!-- Icône avec taille adaptée et couleur -->
                        <span class="text-brand-blue-600 mr-3 flex-shrink-0">
                            {!! $feature['icon'] !!}
                        </span>
                        <!-- Titre -->
                        <h3 class="text-2xl font-bold text-brand-blue-700">{{ $feature['title'] }}</h3>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-base leading-relaxed mb-4">
                        {{ $feature['description'] }}
                    </p>

                    <!-- Cas d'utilisation -->
                    <ul class="space-y-2 text-gray-600 text-sm">
                        @foreach($feature['use_cases'] as $use_case)
                            <li class="flex items-start">
                                <!-- Checkmark Icon -->
                                <svg class="w-5 h-5 text-brand-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <!-- Use case text -->
                                <span>{{ $use_case }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Hover effect: Floating icon at the top-right -->
                    <div class="absolute top-0 right-0 p-2">
                        <div class="bg-brand-blue-600 p-2 rounded-full shadow-lg text-white hover:bg-brand-blue-700 transition-colors">
                            {!! $feature['icon'] !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
