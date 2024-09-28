<!-- resources/views/components/header.blade.php -->
<header class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="container mx-auto px-4 py-4 md:py-6 flex items-center justify-between">
        <!-- Logo et titre -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Media System Logo" class="h-8 w-auto md:h-10 mr-2 md:mr-4">
            <h1 class="text-lg md:text-2xl font-bold text-brand-blue">Bulk SMS</h1>
        </div>

        <!-- Bouton du menu hamburger pour les petits écrans -->
        <div class="md:hidden">
            <button id="menu-btn" class="text-brand-red focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Menu de navigation -->
        <nav id="menu" class="hidden md:flex space-x-4 md:space-x-6">
            <ul class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                <li><a href="#offres" class="text-brand-red hover:text-brand-blue transition-colors">Offres</a></li>
                <li><a href="#promotions" class="text-brand-red hover:text-brand-blue transition-colors">Promotions</a></li>
                <li><a href="#comment-ca-marche" class="text-brand-red hover:text-brand-blue transition-colors">Comment ça marche</a></li>
                <li>
                    <a href="https://smspro.cm" target="_blank" rel="noopener noreferrer" 
                       class="bg-brand-blue text-white px-4 py-2 rounded hover:bg-opacity-80 transition-colors">
                        S'inscrire
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<script>
    // JavaScript pour rendre le menu déroulant fonctionnel
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
