<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
    <a href="{{route('index')}}" class="back-button">
        <i class="ri-arrow-left-s-line"></i></a>
        <img src="../images/logo_transparant.png" alt="">

    </div>
    <div class="container">
        <div class="sidebar">
            <div class="head"><p>My Cart</p></div>
            <div id="cartItem">Your cart is empty</div>
            @php
                $total = 0;
            @endphp
            @foreach($cartItems as $cartItem)
            @php
                $itemTotal = $cartItem->baju->harga * $cartItem->quantity;
                $total += $itemTotal;
            @endphp
            <div class='cart-item'>
                <div class='row-img'>
                <img src="{{ asset('images/baju/' . $cartItem->baju->gambar) }}" alt="{{ $cartItem->baju->nama }}">
                </div>
                <p style='font-size:12px;'>{{ $cartItem->baju->nama }}</p>
                <p style='font-size:12px;'>x{{ $cartItem->quantity }}</p>
                <h2 style='font-size: 15px;'>Rp {{ number_format($cartItem->baju->harga*$cartItem->quantity, 0, ',', '.') }}</h2>
                <form action="{{ route('cart.addQuantity', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="remove-this-button"><i>+</i></button>
                </form>
                <form action="{{ route('cart.deductQuantity', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="remove-this-button"><i>-</i></button>
                </form>
                <form action="{{ route('cart.removeFromCart', $cartItem->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="remove-this-button"><i class='ri-delete-bin-line'></i></button>
                </form>
            </div>
            @endforeach
            <div class="foot">
                <h3>Total</h3>
                <h2 id="total">Rp {{ number_format($total, 0, ',', '.') }}</h2>
            </div>
            <form action="{{route('checkout')}}" method="post">
                @csrf
                <button type="submit">Checkout</button>
                @foreach($cartItems as $cartItem)
                <input type="hidden" name="baju_id" value="{{ $cartItem->baju_id }}">
                <input type="hidden" name="quantity" value="{{ $cartItem->quantity }}">
                @endforeach
                <input type="hidden" name="total" value="{{ $total }}">
            </form>
        </div>
    </div> 
</body>     
</html>