<section class="py-20 px-4 md:px-8 lg:px-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-12 text-center">
            Comment ça <span class="text-brand-blue-600">fonctionne</span> ?
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="bg-brand-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-brand-blue-600">1</span>
                </div>
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-3">Inscrivez-vous</h3>
                <p class="text-gray-700">Créez votre compte en quelques clics et accédez à notre plateforme intuitive.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="bg-brand-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-brand-blue-600">2</span>
                </div>
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-3">Importez vos contacts</h3>
                <p class="text-gray-700">Ajoutez facilement votre liste de diffusion avec notre outil d'importation sécurisé.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="bg-brand-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-brand-blue-600">3</span>
                </div>
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-3">Créez votre message</h3>
                <p class="text-gray-700">Rédigez un SMS accrocheur et personnalisé grâce à nos modèles et outils d'édition.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 transform hover:-translate-y-1">
                <div class="bg-brand-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-6">
                    <span class="text-3xl font-bold text-brand-blue-600">4</span>
                </div>
                <h3 class="text-xl font-semibold text-brand-blue-600 mb-3">Envoyez et analysez</h3>
                <p class="text-gray-700">Lancez votre campagne et suivez ses performances en temps réel avec nos analytics avancés.</p>
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

.hover\:shadow-xl:hover {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>