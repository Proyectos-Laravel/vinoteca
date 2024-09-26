<?php

namespace App\Http\Controllers;

use App\Services\Cart;
use Illuminate\Http\Request;
use App\Traits\Traits\CartActions;
use App\Repositories\Shop\ShopRepositoryInterface;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{
    
    use CartActions;
    
    public function __construct(private readonly ShopRepositoryInterface $repository, private readonly Cart $cart)    
    {
        
    }

    public function index(): View
    {
        $wines = $this->repository->paginate();

        return view('shop.index', compact('wines'));
    }

    public function addToCart()
    {
        $this->addProducToCart();
        return redirect()->route('shop.index');
    }

    public function increment()
    {
        $this->incrementProducQuantity();
        return redirect()->route('shop.index');
    }

    public function decrement()
    {
        $this->decrementProductQuantity();
        return redirect()->route('shop.index');
    }

    public function remove()
    {
        $this->removeProduct();
        return redirect()->route('shop.index');
    }
}
