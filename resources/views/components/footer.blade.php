<!-- resources/views/components/footer.blade.php -->
<footer class="bg-gray-100 border-t border-gray-200">
    <div class="container mx-auto px-4 py-8">
        <!-- Grille responsive -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Section "À propos" -->
            <div>
                <h3 class="text-base md:text-lg font-semibold text-brand-blue mb-4">À propos de Media System</h3>
                <p class="text-gray-600 text-sm md:text-base">Media System est votre partenaire de confiance pour toutes vos solutions de communication par SMS. Nous offrons des services de bulk SMS et SMS marketing de haute qualité.</p>
            </div>
            <!-- Section "Liens rapides" -->
            <div>
                <h3 class="text-base md:text-lg font-semibold text-brand-blue mb-4">Liens rapides</h3>
                <ul class="space-y-2">
                    <li><a href="#offres" class="text-gray-600 hover:text-brand-red transition-colors text-sm md:text-base">Nos offres</a></li>
                    <li><a href="#promotions" class="text-gray-600 hover:text-brand-red transition-colors text-sm md:text-base">Promotions</a></li>
                    <li><a href="#comment-ca-marche" class="text-gray-600 hover:text-brand-red transition-colors text-sm md:text-base">Comment ça marche</a></li>
                    <li>
                        <a href="{{ asset('downloads/template-smspro.xlsx') }}" class="text-gray-600 hover:text-brand-red transition-colors text-sm md:text-base" download>
                            Télécharger le modèle Excel
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Section "Contactez-nous" -->
            <div>
                <h3 class="text-base md:text-lg font-semibold text-brand-blue mb-4">Contactez-nous</h3>
                <p class="text-gray-600 text-sm md:text-base mb-2">Email: contact@mediasystem.cm</p>
                <p class="text-gray-600 text-sm md:text-base mb-2">Téléphone: +237 673 940 405</p>
                <div class="flex space-x-4 mt-4 justify-center md:justify-start">
                    <!-- Lien Facebook -->
                    <a href="https://www.fb.com/mediasystem2" target="_blank" class="text-brand-blue hover:text-brand-red transition-colors">
                        <svg class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>
                    <!-- Lien LinkedIn -->
                    <a href="https://www.linkedin.com/company/mediasystem-cm" target="_blank" class="text-brand-blue hover:text-brand-red transition-colors">
                        <svg class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19 0h-14c-2.75 0-5 2.25-5 5v14c0 2.75 2.25 5 5 5h14c2.75 0 5-2.25 5-5v-14c0-2.75-2.25-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.5c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm13.5 11.5h-3v-5.6c0-1.34-.48-2.25-1.68-2.25-.91 0-1.45.61-1.69 1.2-.09.22-.11.53-.11.84v5.81h-3s.04-9.44 0-10.44h3v1.48c.39-.6 1.09-1.48 2.67-1.48 1.95 0 3.42 1.27 3.42 4v6.44z"/>
                        </svg>
                    </a>
                    <!-- Lien Instagram -->
                    <a href="https://www.instagram.com/mediasystem027" target="_blank" class="text-brand-blue hover:text-brand-red transition-colors">
                        <svg class="h-5 w-5 md:h-6 md:w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.348 3.608 1.323.975.975 1.261 2.242 1.323 3.608.058 1.266.07 1.646.07 4.84s-.012 3.584-.07 4.85c-.062 1.366-.348 2.633-1.323 3.608-.975.975-2.242 1.261-3.608 1.323-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.348-3.608-1.323-.975-.975-1.261-2.242-1.323-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.348-2.633 1.323-3.608.975-.975 2.242-1.261 3.608-1.323 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.67.014-4.947.072-1.53.07-2.585.334-3.517 1.267-.932.932-1.196 1.987-1.267 3.517-.058 1.277-.072 1.688-.072 4.947s.014 3.67.072 4.947c.07 1.53.334 2.585 1.267 3.517.932.932 1.987 1.196 3.517 1.267 1.277.058 1.688.072 4.947.072s3.67-.014 4.947-.072c1.53-.07 2.585-.334 3.517-1.267.932-.932 1.196-1.987 1.267-3.517.058-1.277.072-1.688.072-4.947s-.014-3.67-.072-4.947c-.07-1.53-.334-2.585-1.267-3.517-.932-.932-1.987-1.196-3.517-1.267-1.277-.058-1.688-.072-4.947-.072zm0 5.838a6.163 6.163 0 100 12.326 6.163 6.163 0 000-12.326zm0 10.163a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 pt-8 border-t border-gray-200 text-center">
            <p class="text-gray-600 text-sm">&copy; 2024 Media System. Tous droits réservés.</p>
        </div>
    </div>
</footer>
