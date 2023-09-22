
<div class="cart_box dropdown-menu dropdown-menu-right">
    @if(count($CartList) >0 )
        <ul class="cart_list">
            @foreach($CartList as $ProductCart)

                <li>
                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                    <a href="#"><img src="{{getPhotoPath($ProductCart->options->photo,"blog")}}" alt="cart_thumb1">
                        <span class="cart_item_name">{{$ProductCart->name}}</span>
                    </a>
                    <span class="cart_quantity forcDir"> {{$ProductCart->qty}} x <span class="cart_amount"></span> {{$ProductCart->price}}</span>
                </li>
            @endforeach
        </ul>
        <div class="cart_footer">
            <p class="cart_total"><strong>{{__('web/cart.Subtotal')}}</strong>
                <span class="cart_price"> <span class="price_symbole"></span></span>{{$subtotal}}</p>
            <p class="cart_buttons">
                <a href="#" class="btn btn-fill-line rounded-0 view-cart">{{__('web/cart.View_Cart')}}</a>
                <a href="#" class="btn btn-fill-out rounded-0 checkout">{{__('web/cart.Confirm_Order')}}</a>
            </p>
        </div>
    @else
        <div class="cart_footer">
            <p class="cart_total py-4 text-center" >
                <strong>السلة فارغة</strong>

            </p>

        </div>
    @endif

</div>


