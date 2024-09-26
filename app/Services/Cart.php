<?php

namespace App\Services;

use App\Models\Wine;
use Illuminate\Support\Collection;
use App\Repositories\Cart\CartRepositoryInterface;


final readonly class Cart
{

    public function __construct(private readonly CartRepositoryInterface $repository)
    {
        
    }

    public function add(Wine $wine, int $quantity = 1): void
    {
        $this->repository->add($wine, $quantity);
    }

    public function increment(Wine $wine): void
    {
        $this->repository->increment($wine);
    }

    public function decrement(int $wineId): void
    {
        $this->repository->decrement($wineId);
    }

    public function remove(int $wineId): void
    {
        $this->repository->remove($wineId);
    }

    public function clear(): void
    {
        $this->repository->clear();
    }

    public function getTotalQuantityForWine(Wine $wine): int
    {
        return $this->repository->getTotalQuantityForWine($wine);
    }

    public function getTotalCostForWine(Wine $wine, bool $formatted = false): float|string
    {
        return $this->repository->getTotalCostForWine($wine, $formatted);
    }

    public function getTotalQuantity(): int
    {
        return $this->repository->getTotalQuantity();
    }

    public function getTotalCost(bool $formatted = false): float|string
    {
        return $this->repository->getTotalCost($formatted);
    }

    public function hasProduct(Wine $wine): bool
    {
        return $this->repository->hasProduct($wine);
    }

    public function getCart(): Collection
    {
        return $this->repository->getCart();
    }

    public function isEmpty(): bool
    {
        return $this->repository->isEmpty();
    }
}
