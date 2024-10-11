<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-12 text-center leading-tight">
            Prêt à <span class="text-brand-blue-600">révolutionner</span> votre communication ?
        </h2>
        
        <!-- Grille à deux colonnes -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Colonne CTA à gauche -->
            <div class="bg-white p-8 md:p-12 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out text-center max-w-xl mx-auto lg:mx-0">
                <p class="text-xl md:text-2xl text-gray-700 mb-8 leading-relaxed">
                    Rejoignez les entreprises innovantes qui ont déjà 
                    <span class="text-brand-red-600 font-semibold">transformé leur approche marketing</span> 
                    grâce à notre plateforme SMS.
                </p>
                
                <a href="https://smspro.cm" target="_blank" rel="noopener noreferrer" 
                   class="inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-brand-red-600 to-brand-red-700 text-white text-lg md:text-xl font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:from-brand-red-700 hover:to-brand-red-800 transition-all duration-300 group">
                    <span>Lancez-vous maintenant</span>
                    <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Colonne image à droite -->
            <div class="flex justify-center lg:justify-start">
                <img src="{{ asset('images/sms.webp') }}" alt="Image d'un téléphone avec SMS reçu" class="w-80 h-auto md:w-96 transform rotate-20 animate-vibration-cycle">
            </div>
        </div>
    </div>
</section>

<style>
@keyframes gradientAnimation {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.bg-gradient-to-br {
    background-size: 200% 200%;
    animation: gradientAnimation 15s ease infinite;
}

.hover\:shadow-2xl:hover {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Animation de vibration */
@keyframes vibration {
    0%, 100% { transform: translateX(0) rotate(6deg); }
    25% { transform: translateX(-5px) rotate(6deg); }
    50% { transform: translateX(5px) rotate(6deg); }
    75% { transform: translateX(-5px) rotate(6deg); }
}

.animate-vibration-cycle {
    animation: vibration 3s ease-in-out 1s 1, vibration 3s ease-in-out 33s infinite;
    /* 
    * La première animation démarre après 1 seconde pour durer 3 secondes
    * La seconde démarre après 33 secondes et est définie pour se répéter infiniment
    */
}
</style>
