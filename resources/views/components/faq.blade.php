<section id="faq" class="py-10 bg-gradient-to-r from-blue-50 to-blue-100">
    <h2 class="text-3xl sm:text-4xl font-bold text-brand-blue-600 text-center mb-8">Questions Fréquemment Posées</h2>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Grid avec deux colonnes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Question 1 -->
            <div class="bg-white shadow-md rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <button class="w-full text-left p-6 font-bold text-lg text-brand-blue-600 flex justify-between items-center focus:outline-none" onclick="toggleFaq(1)">
                    Quelle est la durée de validité des SMS achetés ?
                    <span class="text-brand-blue-600 transition-transform transform" id="icon-1">+</span>
                </button>
                <div id="faq-1" class="hidden px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-200">
                    Les SMS achetés sont valides pendant une période de 12 mois à partir de la date d'achat. Vous pouvez les utiliser à tout moment durant cette période.
                </div>
            </div>

            <!-- Question 2 -->
            <div class="bg-white shadow-md rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <button class="w-full text-left p-6 font-bold text-lg text-brand-blue-600 flex justify-between items-center focus:outline-none" onclick="toggleFaq(2)">
                    Quels opérateurs sont couverts par le service ?
                    <span class="text-brand-blue-600 transition-transform transform" id="icon-2">+</span>
                </button>
                <div id="faq-2" class="hidden px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-200">
                    Nous couvrons les principaux opérateurs au Cameroun, tels que MTN, Orange, Camtel, et Nexttel. Vous pouvez envoyer des SMS vers tous ces réseaux sans souci.
                </div>
            </div>

            <!-- Question 3 -->
            <div class="bg-white shadow-md rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <button class="w-full text-left p-6 font-bold text-lg text-brand-blue-600 flex justify-between items-center focus:outline-none" onclick="toggleFaq(3)">
                    Y a-t-il un volume minimum de SMS à acheter ?
                    <span class="text-brand-blue-600 transition-transform transform" id="icon-3">+</span>
                </button>
                <div id="faq-3" class="hidden px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-200">
                    Oui, le volume minimum d'achat est de 1000 SMS. Plus vous achetez de SMS, plus le prix par SMS diminue.
                </div>
            </div>

            <!-- Question 4 -->
            <div class="bg-white shadow-md rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <button class="w-full text-left p-6 font-bold text-lg text-brand-blue-600 flex justify-between items-center focus:outline-none" onclick="toggleFaq(4)">
                    Comment puis-je suivre l’état de mes campagnes ?
                    <span class="text-brand-blue-600 transition-transform transform" id="icon-4">+</span>
                </button>
                <div id="faq-4" class="hidden px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-200">
                    Vous pouvez suivre l’état de vos campagnes en temps réel via notre tableau de bord, où vous verrez les statistiques sur les SMS envoyés, livrés et les éventuels échecs.
                </div>
            </div>

            <!-- Question 5 -->
            <div class="bg-white shadow-md rounded-lg transition-transform transform hover:scale-105 hover:shadow-xl duration-300">
                <button class="w-full text-left p-6 font-bold text-lg text-brand-blue-600 flex justify-between items-center focus:outline-none" onclick="toggleFaq(5)">
                    Quels sont les modes de paiement disponibles ?
                    <span class="text-brand-blue-600 transition-transform transform" id="icon-5">+</span>
                </button>
                <div id="faq-5" class="hidden px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-200">
                    Nous acceptons les paiements via mobile money (MTN et Orange), ainsi que via carte bancaire. Tous les paiements sont sécurisés et traités par notre partenaire NotchPay.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFaq(id) {
        const faq = document.getElementById('faq-' + id);
        const icon = document.getElementById('icon-' + id);

        if (faq.classList.contains('hidden')) {
            faq.classList.remove('hidden');
            icon.textContent = '-';
            icon.classList.add('rotate-180');
        } else {
            faq.classList.add('hidden');
            icon.textContent = '+';
            icon.classList.remove('rotate-180');
        }
    }
</script>
