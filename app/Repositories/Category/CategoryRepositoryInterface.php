<?php

namespace App\Repositories\Category;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    
    public function model(?string $slug = null); 

    public function paginate(array $counts = [], array $relationships = [], int $perPage = 10);

    public function create(array $data);

    public function update(array $data, Category $category);

    public function delete(Category $category);
    
}
