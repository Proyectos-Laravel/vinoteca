<?php

namespace App\Traits\Traits;

use Exception;

trait CartActions
{
    
    public function addProducToCart(): void
    {
        $wineId = request()->input(key: 'wine_id');
        $quantity = request()->input(key: 'quantity', default:1);

        $wine = $this->repository->find($wineId);
        $this->cart->add($wine, $quantity);
    }

    public function incrementProducQuantity(): void
    {
        $wine = $this->repository->find(request(key: 'wine_id'));
        try{
            $this->cart->increment($wine);
            session()->flash('success', 'Cantidad incrementada');
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function decrementProductQuantity(): void
    {
        $this->cart->decrement(request(key: 'wine_id'));
    }

    public function removeProduct(): void
    {
        $this->cart->remove(request(key: 'wine_id'));
    }

    public function clearCart(): void
    {
        $this->cart->clear();
    }
}
