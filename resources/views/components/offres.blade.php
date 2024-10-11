<!-- Section des Offres -->
<section id="offres" class="py-10">
    <h2 class="text-3xl font-bold text-brand-blue-600 text-center mb-8">Nos Offres</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($packages as $package)
            <div class="relative bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 border {{ $package['popular'] ? 'border-red-500' : 'border-gray-200' }}">
                
                <!-- Affichage du badge "Le plus populaire" -->
                @if($package['popular'])
                    <div class="absolute top-0 right-0 bg-red-500 text-white px-4 py-1 rounded-bl-lg text-sm font-bold">
                        Le plus populaire
                    </div>
                @endif

                <!-- Icône du package -->
                <div class="text-4xl mb-3 text-center">{{ $package['icon'] }}</div>

                <!-- Nom et description du package -->
                <h3 class="text-xl font-bold text-brand-blue-600 mb-2">{{ $package['name'] }}</h3>
                <p class="text-gray-600 mb-2">{{ $package['sms_quantity'] }}</p>

                 <!-- Prix par SMS -->
                <p class="text-gray-700 font-bold text-lg mt-2">
                    Prix par SMS : {{ $package['price'] }} FCFA/SMS
                </p>

                <!-- Liste des fonctionnalités -->
                <ul class="mt-4 text-left space-y-2">
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
                   class="mt-6 inline-block bg-red-500 text-black-900  text-md font-bold px-4 py-2 rounded hover:bg-red-600 transition-colors text-center w-full">
                    {{ $package['cta'] }}
                </button>
            </div>
        @endforeach
    </div>
</section>

<!-- Popup pour saisir la quantité de SMS -->
<div id="sms-popup" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 w-96 shadow-lg relative">
        <h3 class="text-xl font-bold text-brand-blue-600 mb-4">Acheter des SMS</h3>
        
        <!-- Champs de saisie du formulaire -->
        <label class="block text-gray-700 mb-2">Nom :</label>
        <input type="text" id="client-name" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Votre nom" oninput="validateForm()">

        <label class="block text-gray-700 mb-2">Numéro de téléphone :</label>
        <input type="text" id="client-phone" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Numéro de téléphone" oninput="validateForm()">

       <!-- Liste déroulante pour sélectionner la ville -->
       <label class="block text-gray-700 mb-2">Ville :</label>
        <select id="client-city" name="client_city" class="w-full p-2 border border-gray-300 rounded mb-4" onchange="validateForm()">
            <option value="">Choisir une ville</option>
            @foreach($villes as $ville)
                <option value="{{ $ville }}">{{ $ville }}</option>
            @endforeach
        </select>

        <label class="block text-gray-700 mb-2">Quantité de SMS :</label>
        <input type="number" id="sms-quantity" class="w-full p-2 border border-gray-300 rounded mb-4" min="1000" placeholder="Ex: 5000" oninput="calculatePrice()">

        <p id="sms-price" class="text-gray-700 mb-4"></p>

        <!-- Texte "Commande via" et icônes -->
        <p class="text-lg font-semibold mb-2">Commandez :</p>
        <div class="flex items-center justify-between mb-4">
            <!-- Commande via WhatsApp -->
            <div class="flex items-center space-x-2">
                <a id="whatsapp-link" href="#" target="_blank" class="opacity-50 cursor-not-allowed inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors text-center flex items-center space-x-2" disabled>
                <span>via </span>   
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 1.419.371 2.746 1.02 3.905L0 16l4.204-1.02C5.25 15.63 6.605 16 8 16c4.42 0 8-3.58 8-8s-3.58-8-8-8zm0 14.621c-1.31 0-2.58-.344-3.688-.998l-.26-.153-2.495.605.531-2.523-.16-.266A6.583 6.583 0 011.383 8c0-3.663 2.983-6.646 6.646-6.646S14.676 4.338 14.676 8s-2.983 6.646-6.676 6.646z"/>
                        <path d="M10.834 9.793c-.142-.071-.84-.414-.971-.461-.13-.048-.226-.072-.32.071-.097.145-.368.46-.451.555-.084.097-.168.107-.31.035-.142-.071-.6-.22-1.143-.699-.421-.373-.704-.833-.787-.975-.083-.145-.009-.223.061-.31.064-.078.142-.177.214-.265.071-.088.095-.146.142-.244.047-.098.024-.184-.011-.256-.036-.071-.321-.77-.441-1.057-.116-.282-.235-.244-.32-.244l-.274-.003c-.096 0-.256.036-.39.184-.13.146-.514.5-.514 1.221s.527 1.418.6 1.518c.071.097 1.043 1.65 2.525 2.264.353.151.627.242.84.31.353.112.674.096.93.058.283-.042.868-.353.99-.694.122-.341.122-.634.085-.694-.036-.06-.131-.097-.274-.166z"/>
                    </svg>
                </a>
            </div>
            
            <!-- Commande via Paiement en ligne -->
            <div class="flex items-center space-x-2">
                <form  action="{{ route('pay') }}" method="POST" id="payment-form" class="w-full">
                    @csrf
                    <input type="hidden" id="amount" name="amount" value="0">
                    <input type="hidden" id="email" name="email" value="user@example.com">
                    <input type="hidden" id="package_name" name="package_name" value="">
                    <input type="hidden" id="sms_quantity" name="sms_quantity" value="">
                    <button type="submit" id="pay-button" disabled class="opacity-50 cursor-not-allowed inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors text-center flex items-center space-x-2">
                        <img src="/images/payment.webp" alt="Paiement" class="w-6 h-6"> <!-- Remplacez l'URL de l'icône par celle souhaitée -->
                        <span>Payer en ligne</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-4 flex justify-end">
            <button onclick="closePopup()" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition-colors">Annuler</button>
        </div>
    </div>
</div>


<script>
    let currentPackage = null;

    function openPopup(packageDetails) {
        currentPackage = packageDetails;
        document.getElementById('sms-popup').classList.remove('hidden');
        document.getElementById('sms-price').innerText = ''; // Réinitialiser le prix
        validateForm(); // Réinitialiser la validation des champs
    }

    function closePopup() {
        document.getElementById('sms-popup').classList.add('hidden');
    }

    function calculatePrice() {
        const quantity = parseInt(document.getElementById('sms-quantity').value);
        if (isNaN(quantity) || quantity < 1000) {
            document.getElementById('sms-price').innerText = "Veuillez entrer une quantité valide d'au moins 1000 SMS.";
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

        // Mettre à jour le prix total
        document.getElementById('sms-price').innerHTML = `Le prix total pour <strong>${quantity}</strong> SMS est : <strong>${totalPrice.toLocaleString()} FCFA</strong>`;

        // Mettre à jour les informations du formulaire de paiement
        document.getElementById('amount').value = totalPrice;
        document.getElementById('package_name').value = currentPackage.name;
        document.getElementById('sms_quantity').value = quantity;

        validateForm();
    }

    // Fonction pour valider les champs du formulaire
    function validateForm() {
        const name = document.getElementById('client-name').value.trim();
        const phone = document.getElementById('client-phone').value.trim();
        const city = document.getElementById('client-city').value.trim();
        const quantity = parseInt(document.getElementById('sms-quantity').value);
        const isValid = name && phone && city && !isNaN(quantity) && quantity >= 1000;

        // Activer ou désactiver les boutons selon la validité des champs
        const whatsappLink = document.getElementById('whatsapp-link');
        const payButton = document.getElementById('pay-button');

        if (isValid) {
            whatsappLink.classList.remove('opacity-50', 'cursor-not-allowed');
            whatsappLink.removeAttribute('disabled');
            payButton.classList.remove('opacity-50', 'cursor-not-allowed');
            payButton.removeAttribute('disabled');

           // Créer un message pré-rempli pour WhatsApp
            const whatsappMessage = `Nom: *${name}*\nTéléphone: *${phone}*\nVille: *${city}*\nJe voudrais acheter *${quantity}* SMS du pack *${currentPackage.name}*. Le prix total est de *${document.getElementById('amount').value} FCFA*.`;
            whatsappLink.href = `https://wa.me/237673940405?text=${encodeURIComponent(whatsappMessage)}`;
        } else {
            whatsappLink.classList.add('opacity-50', 'cursor-not-allowed');
            whatsappLink.setAttribute('disabled', true);
            payButton.classList.add('opacity-50', 'cursor-not-allowed');
            payButton.setAttribute('disabled', true);
        }
    }
</script>
