<div>
    @if($cart->where('id', $product->id)->count())
{{--        <form action="{{route('Cart_RemoveFromCart')}}" method="post">--}}
        <form wire:submit.prevent="removeFromCart({{$product->id}})" method="post">

        @csrf
            in cart
{{--            <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--            <input type="text" name="rowId" value="{{$cart->where('id', $product->id)->first()->rowId  }}">--}}
            <button type="submit" class="add_to_cart_new"> remove</button>
        </form>

    @else
{{--        <form action="{{route('Cart_AddToCart')}}" method="post">--}}
        <form  wire:submit.prevent="addToCart({{$product->id}})" method="post">
            @csrf
{{--            <input type="hidden" name="product_id" value="{{$product->id}}">--}}
            <div class="rating_wrap rating_wrap_new">
                <div class="add_to_cart_new quantity_new" >
                    <input type="button" value="-" class="minus">
{{--                    <input wire:model="quantity.{{$product->id}}" type="text" name="quantity" value="1" title="Qty" class="qty" size="4">--}}
                    <input wire:model="quantity.{{$product->id}}" type="text" title="Qty" class="qty" size="4">
                    <input type="button" value="+" class="plus">
                </div>
                <button type="submit" class="add_to_cart_new"> <i class="icon-basket-loaded"></i></button>
            </div>
        </form>
    @endif
</div>
