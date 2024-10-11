<!-- resources/views/components/header.blade.php -->
<header class="bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 text-gray-900 fixed w-full top-0 z-50 shadow-lg backdrop-blur-md transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-4 py-4 md:py-6 flex items-center justify-between">
        <!-- Logo et titre -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.webp') }}" alt="Media System Logo" class="h-10 w-auto md:h-12 mr-3 md:mr-6 transition-transform duration-500 ease-in-out transform hover:scale-110">
            <h1 class="text-xl md:text-3xl font-extrabold text-brand-blue tracking-wide">Bulk SMS</h1>
        </div>

        <!-- Bouton du menu hamburger pour les petits écrans -->
        <div class="md:hidden">
        <button 
            id="menu-btn" 
            class="text-gray-900 focus:outline-none" 
            aria-label="Ouvrir le menu" 
            onclick="toggleMenu()" 
            onkeypress="if(event.key === 'Enter' || event.key === ' ') toggleMenu();">
            <svg class="h-8 w-8 transition-transform duration-300 ease-in-out" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        </div>

        <!-- Menu de navigation -->
        <nav id="menu" class="hidden md:flex space-x-12 md:space-x-16">
            <ul class="flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-12">
                <li>
                    <a href="#offres" class="text-gray-900 hover:text-brand-blue transition-all duration-300 ease-in-out font-medium tracking-wide">
                        Offres
                    </a>
                </li>
                <li>
                    <a href="#promotions" class="text-gray-900 hover:text-brand-blue transition-all duration-300 ease-in-out font-medium tracking-wide">
                        Promotions
                    </a>
                </li>
                <li>
                    <a href="https://smspro.cm" target="_blank" rel="noopener noreferrer" 
                       class="bg-brand-blue text-white px-5 py-2 rounded-full shadow-lg hover:bg-opacity-90 transition-all duration-300 ease-in-out font-semibold tracking-wide">
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
