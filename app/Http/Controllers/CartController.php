<?php

namespace App\Http\Controllers;

use App\Repositories\Shop\ShopRepositoryInterface;
use App\Services\Cart;
use App\Traits\Traits\CartActions;
use Illuminate\Http\Request;

class CartController extends Controller
{
    
    use CartActions;

    public function __construct(private readonly ShopRepositoryInterface $Repository, private readonly Cart $cart)
    {
        
    }

    public function index()
    {
        return view('cart.index');
    }

    public function increment()
    {
        $this->incrementProducQuantity();
        return redirect()->route('cart.index');
    }

    public function decrement()
    {
        $this->decrementProductQuantity();
        return redirect()->route('cart.index');
    }

    public function remove()
    {
        $this->removeProduct();
        return redirect()->route('cart.index');
    }

    public function clear()
    {
        $this->clearCart();
        return redirect()->route('cart.index');
    }

}
