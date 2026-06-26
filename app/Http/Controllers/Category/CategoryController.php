<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    protected $categoryRepository;

    // __construct function to creation
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    //index function start from here 
    public function index(Request $request)
    {
        $items = $this->categoryRepository->getCategories($request->all());
        return view('category.categories', compact('items'));
    }

    // show form to create resources
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('category.CreateCategory');
    }

    // show store function start from here
    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);
        $validated = $request->validated();

        try {

            DB::beginTransaction();

            $this->categoryRepository->store($validated);
            DB::commit();
            Alert::toast('Category created Successfully.', 'success');
            return redirect()->route('categories');
        } catch (\Throwable $th) {

            DB::rollBack();

            Alert::toast('An Error occured while creating the Category.', 'error');
            return back()->withInput();
        }
    }

    //show function start from heres
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
            $this->categoryRepository->update($id, $validated);

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
