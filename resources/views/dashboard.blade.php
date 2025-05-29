<x-app-layout>
    <x-slot name="header">
        <!-- Votre en-tête ici -->
    </x-slot>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <!-- Contenu Principal -->
    <div class="main-container">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title">
                    Tableau de Bord des Coopératives Agricoles
                </h1>

                <!-- 📦 Stock -->
				 <div class="tables-container">
							<!-- 📦 Stock -->
							<div class="table-wrapper">
								<h2 class="section-title">État du Stock</h2>
								<table class="stock-table">
									<thead>
										<tr>
											<th>Ressource</th>
											<th>Quantité Disponible</th>
											<th>Seuil Alerte</th>
											<th>Statut</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($stocks as $stock)
											<tr>
												<td>{{ $stock->ressource->nom_ressource }}</td>
												<td>{{ $stock->quantite_disponible }}</td>
												<td>{{ $stock->seuil_alerte }}</td>
												<td>
													@if ($stock->quantite_disponible <= $stock->seuil_alerte)
														<span class="alert blink">⚠️ Stock Faible</span>
													@else
														<span class="success">✅ OK</span>
													@endif
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<!-- 📊 Projets -->
							<div class="table-wrapper">
								<h2 class="section-title">Suivi des Projets</h2>
								<table class="stock-table">
									<thead>
										<tr>
											<th>Nom du Projet</th>
											<th>Statut</th>
											<th>Date de Début</th>
											<th>Date de Fin</th>
											<th>Nombre de Cultures</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($projets as $projet)
											<tr>
												<td>{{ $projet->Nom_projet }}</td>
												<td>{{ $projet->Status_projet }}</td>
												<td>{{ $projet->Date_debut }}</td>
												<td>{{ $projet->Date_fin }}</td>
												<td>{{ $projet->parcelles->pluck('culture')->unique()->count() }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<!-- 📊 Cultures -->
							<div class="table-wrapper">
								<h2 class="section-title">Suivi des Cultures</h2>
								<table class="stock-table">
									<thead>
										<tr>
											<th>Nom de la Culture</th>
											<th>Description</th>
											<th>Nombre de Parcelles</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($cultures as $culture)
											<tr>
												<td>{{ $culture->Nom_Culture }}</td>
												<td>{{ $culture->Description }}</td>
												<td>{{ $culture->parcelles->count() }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>

							<!-- 📊 Parcelles -->
							<div class="table-wrapper">
								<h2 class="section-title">Suivi des Parcelles</h2>
								<table class="stock-table">
									<thead>
										<tr>
											<th>Nom de la Parcelle</th>
											<th>Superficie (ha)</th>
											<th>Type de Sol</th>
											<th>pH du Sol</th>
											<th>Culture Associée</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($parcelles as $parcelle)
											<tr>
												<td>{{ $parcelle->nom_parcelle }}</td>
												<td>{{ $parcelle->superficie }}</td>
												<td>{{ $parcelle->type_sol }}</td>
												<td>{{ $parcelle->ph_sol }}</td>
												<td>{{ $parcelle->culture->Nom_Culture ?? 'Aucune' }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="table-wrapper">
							          <h2 class="section-title">Ventes Récentes</h2>
									<table class="stock-table">
										<thead>
											<tr>
												<th>Date</th>
												<th>Produit</th>
												<th>Client</th>
												<th>Quantité</th>
												<th>Prix</th>
												<th>Total</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($ventesRecentes as $vente)
												<tr>
													<td>{{ $vente->date_vente }}</td>
													<td>{{ $vente->produit->Nom_produit }}</td>
													<td>{{ $vente->client->nom }} {{ $vente->client->prenom }}</td>
													<td>{{ $vente->quantite }}</td>
													<td>{{ number_format($vente->prix_vente, 2) }} MRU</td>
													<td>{{ number_format($vente->quantite * $vente->prix_vente, 2) }} MRU</td>
												</tr>
											@endforeach
										</tbody>
									</table>
							
							</div>
							<div class="table-wrapper">
																	 <!-- Tableaux -->
												<h2 class="section-title">Dernières Transactions</h2>
												<table class="stock-table">
													<thead>
														<tr>
															<th>Date</th>
															<th>Type</th>
															<th>Montant</th>
															<th>Description</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($dernieresTransactions as $transaction)
															<tr>
																<td>{{ $transaction->date_transaction }}</td>
																<td>{{ $transaction->type_transaction }}</td>
																<td>{{ number_format($transaction->montant, 2) }} MRU</td>
																<td>{{ $transaction->description }}</td>
															</tr>
														@endforeach
													</tbody>
												</table>
							</div>
							<div class="table-wrapper">
							
							 <h2 class="section-title">Liste des Cultures</h2>
									<table class="stock-table">
										<thead>
											<tr>
												<th>Culture</th>
												<th>Rendement Total</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($rendementParCulture as $culture)
												<tr>
													<td>{{ $culture->Nom_Culture }}</td>
													<td>{{ $culture->rendement_total }}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
						
						    </div>
							
						<div class="table-wrapper">
												 <h2 class="section-title">État des Parcelles</h2>
							<table class="stock-table">
								<thead>
									<tr>
										<th>Parcelle</th>
										<th>Superficie (ha)</th>
										<th>Type de Sol</th>
										<th>pH du Sol</th>
										<th>Culture Associée</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($etatParcelles as $parcelle)
										<tr>
											<td>{{ $parcelle->nom_parcelle }}</td>
											<td>{{ $parcelle->superficie }}</td>
											<td>{{ $parcelle->type_sol }}</td>
											<td>{{ $parcelle->ph_sol }}</td>
											<td>{{ $parcelle->Nom_Culture ?? 'Aucune' }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							
							</div>
					</div> 
            

                <!-- ⚠️ Alertes -->
                <h2 class="section-title">Alertes</h2>
                <ul class="alert-list">
                    @foreach ($stocksFaibles as $stock)
                        <li class="blink">⚠️ {{ $stock->ressource->nom_ressource }} est en stock faible</li>
                    @endforeach
                    @foreach ($projetsEnRetard as $projet)
                        <li class="blink">⚠️ Le projet "{{ $projet->Nom_projet }}" est en retard !</li>
                    @endforeach
                </ul>

                <!-- 📊 Graphiques -->
                <div class="charts-container">
                    <div class="chart-wrapper">
                        <canvas id="membresChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="ressourcesChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="ventesChart"></canvas>
                    </div>
                </div>
				<div class="charts-container">
						<div class="chart-wrapper">
							<canvas id="projetsChart"></canvas>
						</div>
						<div class="chart-wrapper">
							<canvas id="culturesChart"></canvas>
						</div>
				</div>
				    <div class="charts-container">
                    <div class="chart-wrapper">
                        <canvas id="evolutionVentesChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="ventesParStatutChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="produitsVendusChart"></canvas>
                    </div>
                  </div>
				   <div class="charts-container">
                    <div class="chart-wrapper">
                        <canvas id="evolutionFinancesChart"></canvas>
                    </div>
                  </div>
				    <div class="charts-container">
                   
                    <div class="chart-wrapper">
                        <canvas id="rendementChart"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="parcellesParProjetChart"></canvas>
                    </div>
					 <div class="chart-wrapper">
                        <canvas id="cultureChart"></canvas>
                    </div>
                   </div>
				  
				

                <!-- 📊 Statistiques -->
                <div class="stats-container">
                    <div class="stat-card">
                        <h3 class="stat-title">Membres</h3>
                        <p>Total : {{ $totalMembres ?? 'Non défini' }}</p>
                        <p>Actifs : {{ $membresActifs ?? 'Non défini' }}</p>
                        <p>Inactifs : {{ $membresInactifs ?? 'Non défini' }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Projets</h3>
                        <p>Total : {{ $totalProjets }}</p>
                        <p>Planifiés : {{ $projetsPlanifies }}</p>
                        <p>En cours : {{ $projetsEnCours }}</p>
                        <p>Terminés : {{ $projetsTermines }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Finances</h3>
                        <p>Revenus : {{ number_format($revenus ?? 0, 2) }} MRU</p>
                        <p>Dépenses : {{ number_format($depenses ?? 0, 2) }} MRU</p>
                        <p>Bénéfice : {{ number_format($benefice ?? 0, 2) }} MRU</p>
                    </div>
					
					   <div class="stat-card">
                        <h3 class="stat-title">Total des Ventes</h3>
                        <p>Quantité : {{ $totalVentes->total_quantite }}</p>
                        <p>Valeur : {{ number_format($totalVentes->total_valeur, 2) }} MRU</p>
                      </div>
					     <div class="stat-card">
                        <h3 class="stat-title">Ventes par Statut</h3>
                        <ul>
                            @foreach ($ventesParStatut as $statut)
                                <li>{{ $statut->status }} : {{ $statut->nombre_ventes }}</li>
                            @endforeach
                        </ul>
                        </div>
						 <div class="stat-card">
                        <h3 class="stat-title">Chiffre d'Affaires</h3>
                        <p>Ce mois : {{ number_format($chiffreAffairesMois, 2) }} MRU</p>
                       </div>
					   
					  <div class="stat-card">
                        <h3 class="stat-title">Revenus Totaux</h3>
                        <p>{{ number_format($revenusTransactions + $revenusSubventions, 2) }} MRU</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Dépenses Totales</h3>
                        <p>{{ number_format($depensesTransactions + $depensesRessources, 2) }} MRU</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Solde Financier</h3>
                        <p>{{ number_format($soldeFinancier, 2) }} MRU</p>
                    </div>
					  <div class="stat-card">
                        <h3 class="stat-title">Nombre de Cultures</h3>
                        <p>{{ $nombreCultures }}</p>
                    </div>
                    <div class="stat-card">
                        <h3 class="stat-title">Nombre de Parcelles</h3>
                        <p>{{ $nombreParcelles }}</p>
                    </div>
					
                </div>
				
					
									
            </div>
        </div>
    </div>

    <!-- Scripts pour les graphiques -->
    <script>
         document.addEventListener('DOMContentLoaded', function () {
        // 📊 1. Nombre de membres par mois
        const membresCtx = document.getElementById('membresChart').getContext('2d');
        new Chart(membresCtx, {
            type: 'line',
            data: {
                labels: @json(array_keys($membresParMois ?? [])),
                datasets: [{
                    label: 'Membres',
                    data: @json(array_values($membresParMois ?? [])),
                    borderColor: 'blue',
                    borderWidth: 2,
                    fill: false
                }]
            }
        });

        // 📊 2. Répartition des ressources
        const ressourcesCtx = document.getElementById('ressourcesChart').getContext('2d');
        new Chart(ressourcesCtx, {
            type: 'pie',
            data: {
                labels: @json(array_keys($ressourcesParType ?? [])),
                datasets: [{
                    label: 'Types de Ressources',
                    data: @json(array_values($ressourcesParType ?? [])),
                    backgroundColor: ['red', 'green', 'blue', 'orange']
                }]
            }
        });

        // 📊 3. Évolution des ventes par mois
        const ventesCtx = document.getElementById('ventesChart').getContext('2d');
        new Chart(ventesCtx, {
            type: 'bar',
            data: {
                labels: @json(array_keys($ventesParMois ?? [])),
                datasets: [{
                    label: 'Ventes (MRU)',
                    data: @json(array_values($ventesParMois ?? [])),
                    backgroundColor: 'purple'
                }]
            }
        });

        // 📊 4. Graphique des projets par statut
        const projetsCtx = document.getElementById('projetsChart').getContext('2d');
        new Chart(projetsCtx, {
            type: 'pie',
            data: {
                labels: ['Planifiés', 'En Cours', 'Terminés'],
                datasets: [{
                    label: 'Projets par Statut',
                    data: [{{ $projetsPlanifies ?? 0 }}, {{ $projetsEnCours ?? 0 }}, {{ $projetsTermines ?? 0 }}],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                }]
            }
        });

        // 📊 5. Graphique des cultures par projet
        const culturesCtx = document.getElementById('culturesChart').getContext('2d');
        new Chart(culturesCtx, {
            type: 'bar',
            data: {
                labels: @json($projets->pluck('nom_projet') ?? []),
                datasets: [{
                    label: 'Nombre de Cultures',
                    data: @json($projets->map(fn($projet) => $projet->parcelles->pluck('culture')->unique()->count()) ?? []),
                    backgroundColor: '#36A2EB',
                }]
            }
        });
    });
	
	
	      document.addEventListener('DOMContentLoaded', function () {
            // Évolution des ventes
            const evolutionCtx = document.getElementById('evolutionVentesChart').getContext('2d');
            new Chart(evolutionCtx, {
                type: 'line',
                data: {
                    labels: @json($evolutionVentes->pluck('mois')),
                    datasets: [{
                        label: 'Chiffre d\'Affaires',
                        data: @json($evolutionVentes->pluck('chiffre_affaires')),
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false
                    }]
                }
            });

            // Ventes par statut
            const statutCtx = document.getElementById('ventesParStatutChart').getContext('2d');
            new Chart(statutCtx, {
                type: 'pie',
                data: {
                    labels: @json($ventesParStatut->pluck('status')),
                    datasets: [{
                        label: 'Ventes par Statut',
                        data: @json($ventesParStatut->pluck('nombre_ventes')),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                }
            });

            // Produits les plus vendus
            const produitsCtx = document.getElementById('produitsVendusChart').getContext('2d');
            new Chart(produitsCtx, {
                type: 'bar',
                data: {
                    labels: @json($produitsVendus->pluck('Nom_produit')),
                    datasets: [{
                        label: 'Quantité Vendue',
                        data: @json($produitsVendus->pluck('total_quantite')),
                        backgroundColor: '#36A2EB',
                    }]
                }
            });
        });
		
		
		   document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('evolutionFinancesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($evolutionRevenus->pluck('mois')),
                    datasets: [
                        {
                            label: 'Revenus',
                            data: @json($evolutionRevenus->pluck('revenus')),
                            borderColor: 'green',
                            fill: false,
                        },
                        {
                            label: 'Dépenses',
                            data: @json($evolutionDepenses->pluck('depenses')),
                            borderColor: 'red',
                            fill: false,
                        }
                    ]
                }
            });
        });
		
	
   document.addEventListener('DOMContentLoaded', function () {
            // Répartition des cultures
            const culturesCtx = document.getElementById('cultureChart').getContext('2d');
            new Chart(culturesCtx, {
                type: 'pie',
                data: {
                    labels: @json($rendementParCulture->pluck('Nom_Culture')),
                    datasets: [{
                        label: 'Répartition des Cultures',
                        data: @json($rendementParCulture->pluck('rendement_total')),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    }]
                }
            });

            // Rendement par culture
            const rendementCtx = document.getElementById('rendementChart').getContext('2d');
            new Chart(rendementCtx, {
                type: 'bar',
                data: {
                    labels: @json($rendementParCulture->pluck('Nom_Culture')),
                    datasets: [{
                        label: 'Rendement Total',
                        data: @json($rendementParCulture->pluck('rendement_total')),
                        backgroundColor: '#36A2EB',
                    }]
                }
            });

            // Parcelles par projet
            const parcellesCtx = document.getElementById('parcellesParProjetChart').getContext('2d');
            new Chart(parcellesCtx, {
                type: 'bar',
                data: {
                    labels: @json($parcellesParProjet->pluck('Nom_projet')),
                    datasets: [{
                        label: 'Nombre de Parcelles',
                        data: @json($parcellesParProjet->pluck('nombre_parcelles')),
                        backgroundColor: '#FFCE56',
                    }]
                }
            });
        });
	
    </script>

    <!-- Styles CSS personnalisés -->
 
</x-app-layout>
