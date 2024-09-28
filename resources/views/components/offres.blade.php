<!-- Section des Offres -->
<section id="offres" class="py-10">
    <h2 class="text-3xl font-bold text-brand-blue-600 text-center mb-8">Nos Offres</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($packages as $package)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="text-4xl mb-3 text-center">{{ $package['icon'] }}</div> <!-- Affichage de l'icône -->
                <h3 class="text-xl font-bold text-brand-blue-600">{{ $package['name'] }}</h3>
                <p class="text-gray-600">{{ $package['sms_quantity'] }}</p>
                <ul class="mt-4 text-left">
                    @foreach ($package['features'] as $feature)
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
                <!-- Bouton pour ouvrir le popup -->
                <button onclick="openPopup({{ json_encode($package) }})"
                   class="mt-6 inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors text-center">
                    Acheter maintenant
                </button>
            </div>
        @endforeach
    </div>
</section>

<!-- Popup pour saisir la quantité de SMS -->
<div id="sms-popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
        <h3 class="text-xl font-bold text-brand-blue-600 mb-4">Acheter des SMS</h3>
        <label class="block text-gray-700 mb-2">Entrez la quantité de SMS :</label>
        <input type="number" id="sms-quantity" class="w-full p-2 border border-gray-300 rounded mb-4" min="1000" placeholder="Ex: 5000" oninput="calculatePrice()" />

        <p id="sms-price" class="text-gray-700 mb-4"></p>

        <!-- Bouton pour commander via WhatsApp -->
        <a id="whatsapp-link" href="#" target="_blank" class="hidden mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors text-center">
            Commander via WhatsApp
        </a>

        <div class="mt-4 flex justify-end space-x-4">
            <button onclick="closePopup()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition-colors">Annuler</button>
        </div>
    </div>
</div>

<script>
    let currentPackage = null;

    function openPopup(packageDetails) {
        currentPackage = packageDetails;
        document.getElementById('sms-popup').classList.remove('hidden');
        document.getElementById('sms-price').innerText = ''; // Reset the price
        document.getElementById('whatsapp-link').classList.add('hidden'); // Hide the WhatsApp link initially
    }

    function closePopup() {
        document.getElementById('sms-popup').classList.add('hidden');
    }

    function calculatePrice() {
        const quantity = parseInt(document.getElementById('sms-quantity').value);
        if (isNaN(quantity) || quantity < 1000) {
            document.getElementById('sms-price').innerText = "Veuillez entrer une quantité valide d'au moins 1000 SMS.";
            document.getElementById('whatsapp-link').classList.add('hidden'); // Hide the WhatsApp link
            return;
        }

        let pricePerSms;
        if (quantity >= 1000 && quantity <= 4999) {
            pricePerSms = 15;
        } else if (quantity >= 5000 && quantity <= 9999) {
            pricePerSms = 13;
        } else if (quantity >= 10000) {
            pricePerSms = 11.5;
        }

        const totalPrice = quantity * pricePerSms;
        
        // Mettre en gras le nombre de SMS et le prix
        document.getElementById('sms-price').innerHTML = `Le prix total pour <strong>${quantity}</strong> SMS est : <strong>${totalPrice.toLocaleString()} FCFA</strong>`;

        // Créer un message pré-rempli pour WhatsApp
        const whatsappMessage = `Je voudrais acheter *${quantity}* SMS du pack *${currentPackage.name}*. Le prix total est de *${totalPrice.toLocaleString()} FCFA*.`;

        // Modifier l'URL de WhatsApp avec le message
        document.getElementById('whatsapp-link').href = `https://wa.me/237673940405?text=${encodeURIComponent(whatsappMessage)}`;
        document.getElementById('whatsapp-link').classList.remove('hidden'); // Show the WhatsApp link
    }
</script>
