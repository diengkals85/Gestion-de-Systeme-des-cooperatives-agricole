<script>
document.querySelectorAll('.delete-form').forEach(form => {
form.addEventListener('submit', function(e) {
const confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet élément ?");
if (!confirmation) {
e.preventDefault(); // Empêche la soumission si l'utilisateur clique sur "Annuler"
}
});
});


   document.getElementById('projetForm').addEventListener('submit', function (event) {
        const dateDebut = new Date(document.getElementById('date_debut').value);
        const dateFin = new Date(document.getElementById('date_fin').value);

        if (dateDebut > dateFin) {
            alert('La date de fin doit être postérieure ou égale à la date de début.');
            event.preventDefault(); // Empêcher la soumission du formulaire
        }
    });
</script>
