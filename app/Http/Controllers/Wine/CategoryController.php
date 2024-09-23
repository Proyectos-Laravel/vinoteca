<?php

namespace App\Http\Controllers\Wine;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    public function __construct(private readonly CategoryRepositoryInterface $repository)
    {
        
    }

    public function index(): View
    {
        return view('wine.category.index', [
            'categories' => $this->repository->paginate(
                counts: ['wines'],
            )
        ]);
    }

    public function create(): View
    {
        return view('wine.category.create', [
            'category' => $this->repository->model(),
            'action' => route(name: 'categories.store'),
            'method' => 'POST',
            'submit' => 'Crear'
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->repository->create($request->validated());
        session()->flash('success', 'Categoria creada con éxito');
        return redirect()->route(route: 'categories.index');
    }

    public function edit(Category $category): View
    {        
        return view('wine.category.edit', [
            'category' => $category,
            'action' => route('categories.update', $category),
            'method' => 'PUT',
            'submit' => 'Actualizar'
        ]);
    }

}
