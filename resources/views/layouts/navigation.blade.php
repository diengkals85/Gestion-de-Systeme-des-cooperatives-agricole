<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('DASHBOARD') }}
                    </x-nav-link>
                </div>
				 <!--   Gestion Membres -->
              <div class="menu">
			  
					 <ul>
							<li>
							<x-nav-link :href="route('membres.create')" :active="request()->routeIs('membres.create')">
							{{ __('GESTION MEMBRES') }}
							</x-nav-link>
							<ul class="submenu">
							<li>
							<x-nav-link :href="route('membres.create')" :active="request()->routeIs('membres.create')">
							{{ __('Ajouter Membre') }}
							</x-nav-link>
							</li>
							<li>
							<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Liste Membres') }}
							</x-nav-link>
							</li>
								<li>
							<x-nav-link :href="route('cotisations.create')" :active="request()->routeIs('membres.index')">
							{{ __('Ajouter une Cotisation') }}
							</x-nav-link>
							   </li>
							     
								 <li>
							<x-nav-link :href="route('cotisations.index')" :active="request()->routeIs('membres.index')">
							{{ __('Liste Cotisation') }}
							</x-nav-link>
							   </li>
							   
							</ul>
							</li>
							<!-- Vous pouvez ajouter d'autres éléments de menu ici -->
					</ul>
			  
			 
			
			
            </div>
			
			<!--   GESTION  PROJET AGRICOLE  -->
			    <div class="menu">
			  
					 <ul>
							<li>
							<x-nav-link :href="route('projets.create')" :active="request()->routeIs('projets.create')">
							{{ __(' GESTION PROJETS') }}
							</x-nav-link>
							<ul class="submenu">
							<li>
							<x-nav-link :href="route('projets.create')" :active="request()->routeIs('projets.create')">
							{{ __('Ajouter un Projet') }}
							</x-nav-link>
							</li>
							<li>
							<x-nav-link :href="route('parcelles.create')" :active="request()->routeIs('parcelles.create')">
							{{ __('Ajouter un Parcelle') }}
							</x-nav-link>
							</li>
								<li>
							<x-nav-link :href="route('cultures.create')" :active="request()->routeIs('cultures.index')">
							{{ __('Ajouter Culture ') }}
							</x-nav-link>
							   </li>
							     
								 <li>
				<!--			<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Affecter un Projet a un Membre') }}
							</x-nav-link>
							   </li>
					
							   
							    <li>
							<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Affecter une Parcelle a un Projet') }}
							</x-nav-link>
							   </li>
							   
							     <li>
							<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Affecter Culture a un Parcelle') }}
							</x-nav-link>
							   </li>
					-->		   
							    <li>
							<x-nav-link :href="route('projets.index')" :active="request()->routeIs('projets.index')">
							{{ __('Liste de Projet') }}
							</x-nav-link>
							   </li>
							   <li>
							<x-nav-link :href="route('parcelles.index')" :active="request()->routeIs('parcelles.index')">
							{{ __('Liste de Parcelle') }}
							</x-nav-link>
							   </li>
							   
							    <li>
							<x-nav-link :href="route('cultures.index')" :active="request()->routeIs('cultures.index')">
							{{ __('Liste de Culture') }}
							</x-nav-link>
							   </li>
							</ul>
							</li>
						
					</ul>
            </div>
			
			<!--   FIN GESTION PROJET AGRICOLE -->
			
			<!-- GESTION RESSOURCE -->
			
			<div class="menu">
			  
					 <ul>
							<li>
							<x-nav-link :href="route('ressources.create')" :active="request()->routeIs('ressources.create')">
							{{ __('GESTION RESSOURCE') }}
							</x-nav-link>
							<ul class="submenu">
							<li>
							<x-nav-link :href="route('ressources.create')" :active="request()->routeIs('ressources.create')">
							{{ __('Ajouter Une Ressource') }}
							</x-nav-link>
							</li>
								<li>
							<x-nav-link :href="route('typeressources.create')" :active="request()->routeIs('typeressources.create')">
							{{ __('Ajouter Type Ressource') }}
							</x-nav-link>
							</li>
							<li>
							<x-nav-link :href="route('ressources.index')" :active="request()->routeIs('ressources.index')">
							{{ __('Liste des Ressources') }}
							</x-nav-link>
							</li>
							
								<li>
							<x-nav-link :href="route('typeressources.index')" :active="request()->routeIs('typeressources.index')">
							{{ __('Liste des Type Ressources') }}
							</x-nav-link>
							</li>
					<!--		     
								 <li>
							<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Affecter Ressource Projet') }}
							</x-nav-link>
							   </li>
							   
					-->		 
							   
							   
							     <li>
							<x-nav-link :href="route('produits.create')" :active="request()->routeIs('produits.create')">
							{{ __('Ajouer Un Produit') }}
							</x-nav-link>
							   </li>
								<!--   
							    <li>
							<x-nav-link :href="route('membres.index')" :active="request()->routeIs('membres.index')">
							{{ __('Affecter Produit Membre') }}
							</x-nav-link>
							   </li>
							   -->
							     <li>
							<x-nav-link :href="route('produits.index')" :active="request()->routeIs('produits.index')">
							{{ __('Liste Des Produits') }}
							</x-nav-link>
							   </li>
							</ul>
							</li>
						
					</ul>
            </div>
			
			<!-- FIN GESTION RESSOURCE -->
			
			
				<!-- GESTION Cooperative -->
			
			<div class="menu">
			  
					 <ul>
							<li>
							<x-nav-link :href="route('cooperatives.create')" :active="request()->routeIs('cooperatives.create')">
							{{ __('GESTION COOPERATIVE') }}
							</x-nav-link>
							<ul class="submenu">
							<li>
							<x-nav-link :href="route('cooperatives.create')" :active="request()->routeIs('cooperatives.create')">
							{{ __('Ajouter Une Cooperative') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('cooperatives.index')" :active="request()->routeIs('cooperatives.index')">
							{{ __('Afficher les Cooperatives') }}
							</x-nav-link>
							   </li>
						
							     
								 <li>
							<x-nav-link :href="route('transactions.create')" :active="request()->routeIs('transactions.create')">
							{{ __('Ajouter Une Transaction') }}
							</x-nav-link>
							   </li>
							   
							   <li>
							<x-nav-link :href="route('transactions.index')" :active="request()->routeIs('transactions.index')">
							{{ __('Afficher les Transactions') }}
							</x-nav-link>
							   </li>
							   
							 
							</ul>
							</li>
						
					</ul>
            </div>
			
			<!-- FIN GESTION Cooperative -->
			
			<!--  SUIVI DES PROJET AGRICOLE -->
			
			 <div class="menu">
			      <ul>
							<li>
                    <x-nav-link :href="route('stocks.create')" :active="request()->routeIs('stocks.create')">
                        {{ __('GESTION DES STOCKS') }}
                    </x-nav-link>
					
					<ul class="submenu">
							<li>
							<x-nav-link :href="route('stocks.create')" :active="request()->routeIs('stocks.create')">
							{{ __('Ajouter Un Stock') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('stocks.index')" :active="request()->routeIs('stocks.index')">
							{{ __('Afficher les stocks') }}
							</x-nav-link>
							   </li>
							    <li>
							<x-nav-link :href="route('utilisationressources.create')" :active="request()->routeIs('utilisationressources.create')">
							{{ __('Affecter des ressource') }}
							</x-nav-link>
							   </li>
						 
					 </ul>
					       </li>
						 
					
				 </ul>
                </div>
			
			<!--  FIN SUIVI PROJET AGRICILE -->
			
				<!-- GEOLOCATION-->
			
			 <div class="menu">
			       <ul>
							<li>
                    <x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')">
                        {{ __('GESTION DES VENTES') }}
                    </x-nav-link>
					         <ul class="submenu">
							<li>
							<x-nav-link :href="route('clients.create')" :active="request()->routeIs('clients.create')">
							{{ __('Ajouter Un Client') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.index')">
							{{ __('Afficher les Clients') }}
							</x-nav-link>
							   </li>
							   
							   	<li>
							<x-nav-link :href="route('ventes.create')" :active="request()->routeIs('ventes.create')">
							{{ __('Ajouter Un Vente') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('ventes.index')" :active="request()->routeIs('ventes.index')">
							{{ __('Afficher les Ventes') }}
							</x-nav-link>
							   </li>
					      </ul>
					
					       </li>
				    </ul>
             </div>
			 
			  <div class="menu">
			      <ul>
							<li>
                    <x-nav-link :href="route('employes.create')" :active="request()->routeIs('employes.create')">
                        {{ __('GESTION DES EMPLOYES') }}
                    </x-nav-link>
					
					<ul class="submenu">
							<li>
							<x-nav-link :href="route('employes.create')" :active="request()->routeIs('employes.create')">
							{{ __('Ajouter Un Employe') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('employes.index')" :active="request()->routeIs('employes.index')">
							{{ __('Afficher les employes') }}
							</x-nav-link>
							   </li>	 
					 </ul>
					       </li>
				 </ul>
                </div>
			
			<!--  GEOLOCATION -->
			
			 <div class="menu">
			    
				 <ul>
							<li>
                    <x-nav-link :href="route('partenaires.create')" :active="request()->routeIs('partenaires.create')">
                        {{ __('GESTION DES PARTENAIRES ET SUBVENTIONS') }}
                    </x-nav-link>
					
					<ul class="submenu">
							<li>
							<x-nav-link :href="route('partenaires.create')" :active="request()->routeIs('partenaires.create')">
							{{ __('Ajouter Un Partenaire') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('partenaires.index')" :active="request()->routeIs('partenaires.index')">
							{{ __('Afficher les Partenaires') }}
							</x-nav-link>
							   </li>	
                             <li>
							<x-nav-link :href="route('subventions.create')" :active="request()->routeIs('subventions.create')">
							{{ __('Ajouter Une Subvention') }}
							</x-nav-link>
							</li>
							
							 <li>
							<x-nav-link :href="route('subventions.index')" :active="request()->routeIs('subventions.index')">
							{{ __('Afficher les subventions') }}
							</x-nav-link>
							   </li>								   
					 </ul>
					       </li>
				 </ul>
				
				
				
             </div>
			
			<!--  GEOLOCATION -->
			
			
			
			
			
			
			
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
