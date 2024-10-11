<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .container { width: 100%; max-width: 350px; margin: 0 auto; padding: 10px; }
        .header { text-align: center; margin-bottom: 20px; }
        .logo { text-align: center; margin-bottom: 20px; }
        .client-info, .invoice-info, .total { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 5px; text-align: left; border: 1px solid #000; }
        th { background-color: #f4f4f4; }
        .total td { text-align: right; font-weight: bold; }
        .footer { text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo" style="height: 60px;">
        </div>
        <div class="header">
            <h2>FACTURE N° {{ $number }}</h2>
            <p>Date : {{ $date }}</p>
        </div>
        <div class="client-info">
            <p><strong>Destinataire :</strong> {{ $client }}</p>
            <p><strong>Téléphone :</strong> {{ $phone }}</p>
            <p><strong>Ville :</strong> {{ $city }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire (XAF)</th>
                    <th>Total (XAF)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ number_format($item['unit_price'], 0, ',', ' ') }}</td>
                    <td>{{ number_format($item['total_price'], 0, ',', ' ') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table class="total">
            <tr>
                <td colspan="3">Total TTC</td>
                <td>{{ number_format($total_amount, 0, ',', ' ') }} XAF</td>
            </tr>
        </table>
        <div class="footer">
            <p>Yaoundé, {{ $date }}</p>
        </div>
    </div>
</body>
</html>
