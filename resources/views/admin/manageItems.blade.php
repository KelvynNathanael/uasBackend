<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin_doc.css') }}">    
</head>
<body>
    <div class="tombol">
    <a href="{{ route('baju.create') }}">Create New Baju</a>
    <a href="{{ route('index') }}">Dashboard</a>
    <a href="{{ route('checkoutview') }}">checkout</a>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Image</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bajus as $baju)
            <tr>
                <td>{{ $baju->id }}</td>
                <td>{{ $baju->nama }}</td>
                <td><img src="{{ asset('images/baju/' . $baju->gambar) }}" alt="{{ $baju->nama }}" width="100"></td>
                <td>{{ number_format($baju->harga, 2) }}</td>
                <td>
                    <form action="{{ route('baju.destroy', $baju->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('baju.edit', $baju->id) }}">
                        <button type="button">Edit</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
