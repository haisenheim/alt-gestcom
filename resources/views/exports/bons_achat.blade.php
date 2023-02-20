<table>
    <thead>
        <tr>
            <th>NUMERO DU BON</th>
            <th>BENEFICIAIRE</th>
            <th>TELEPHONE</th>
            <th>MONTANT</th>
            <th>DATE D'EXPIRATION</th>
            <th>CHAINE QRCODE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bons as $bon)
            <tr>
                <td>{{ number_format($bon->name,0,',','-') }}</td>
                <td>{{ $bon->client->name }}</td>
                <td>{{ $bon->client->phone }}</td>
                <td>{{ number_format($bon->montant,0,',','.') }} FCFA</td>
                <td>{{ date_format($bon->expired_at,'d/m/Y') }}</td>
                <td>{{ $bon->token }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
