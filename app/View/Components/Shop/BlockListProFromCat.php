<?php

namespace App\View\Components\Shop;

use Closure;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlockListProFromCat extends Component
{

    public $product;
    public $category;
    public $cart ;
    public function __construct(
        $product = array(),
        $category = ['id'=>null],
        $cart = array(),
    )
    {
        $this->product = $product ;
        $this->category = json_decode(json_encode($category), FALSE);

        $cart = Cart::content();
        $this->cart = $cart ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shop.block-list-pro-from-cat');
    }
}
