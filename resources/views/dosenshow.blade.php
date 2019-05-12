<html>
    <head>
        
    </head>
    <body>
@foreach($Dosen['data'] as $data)
    Member ID: {{ $data['nip_dosen'] }}
@endforeach
    </body>
</html>