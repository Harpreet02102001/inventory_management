<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::get();
    //      return view('category.categories', compact('categories'));
    // }

    public function index(Request $request)
    {
        $categories = Category::query();

        // Search Filter
        if ($request->filled('search')) {
            $categories->where(
                'name',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Status Filter
        if ($request->filled('status')) {
            $categories->where(
                'status',
                $request->status
            );
        }

        $categories = $categories
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'category.categories',
            compact('categories')
        );
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        $categories = Category::get();
        return view('category.CreateCategory', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        $validated = $request->validate([
            'name'           => 'required|min:2|max:100|unique:categories,name',
            'description'    => 'nullable|max:255',
            'status'         => 'required|boolean'
        ]);

        try {

            DB::beginTransaction();
            Category::create($validated);
            DB::commit();
            Alert::toast('Category created Successfully.', 'success');
            return redirect()->route('categories');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('An Error occured while creating the Category.', 'error');
            return back()->withInput();
        }
    }

    public function show()
    {
        return view('category.updateCategory');
    }

    public function edit(string $id, Category $category)
    {
        $category = Category::findOrFail($id);

        $this->authorize('update', $category);

        return view('category.updateCategory', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all(), $id);
        $validated = $request->validate([
            'name'           => 'required|min:2|max:100,unique:categories,name,' . $id,
            'description'    => 'nullable|max:255',
            'status'         => 'required|boolean'
        ]);

        try {

            DB::beginTransaction();

            $category = Category::findOrFail($id);
            $this->authorize('update', $category);
            $category->update($validated);

            DB::commit();
            Alert::toast('Category updated Successfully.', 'success');
            return redirect()->route('categories');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('An Error occured while updating the Category.', 'error');
            return back()->withInput();
        }
    }

    public function destroy(string $id)
    {
        try {

            DB::beginTransaction();

            $category = Category::findOrFail($id);
            $this->authorize('delete', $category);
            $category->delete();

            DB::commit();
            Alert::toast('Category deleted Successfully.', 'success');
            return redirect()->route('categories');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('An Error occured while deleting the Category.', 'error');
            return back();
        }
    }
}
