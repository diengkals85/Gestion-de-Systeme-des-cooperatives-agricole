<!DOCTYPE html>
<html>
<head>
    <title>Reçu de Cotisation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 20px; }
        .footer { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reçu de Cotisation</h1>
    </div>
    <div class="content">
        <p><strong>Membre :</strong> {{$cotisation->membre->Nom_membre }}  {{$cotisation->membre->Prenom_membre }}</p>
        <p><strong>Montant :</strong> {{ number_format($cotisation->Montant, 2) }} MRU</p>
        <p><strong>Date de cotisation :</strong> {{ $cotisation->Date_cotisation }}</p>
    </div>
    <div class="footer">
        <p>Merci pour votre contribution !</p>
    </div>
</body>
</html>