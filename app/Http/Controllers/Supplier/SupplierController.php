<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $suppliers = Supplier::get();
    //     return view('suppliers.suppliers_list', compact('suppliers'));
    // }
    public function index(Request $request)
    {
        $suppliers = Supplier::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $suppliers->where(function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $suppliers = $suppliers->latest()->paginate(10)->withQueryString();

        return view('suppliers.suppliers_list', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::get();
        return view('suppliers.createSupplier', compact('suppliers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'required|min:10|max:15',
            'company' => 'required|min:2|max:255',
            'address' => 'required|min:5|max:255',
        ]);

        // dd($request->all());
        try {
            DB::beginTransaction();
            Supplier::create($validated);

            Alert::toast('Supplier created successfully.', 'success');
            DB::commit();
            return redirect()->route('supplier')->with('success', 'Supplier created successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('An Error occured while creating the supplier.', 'error');
            return redirect()->back();
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.supplierDetails', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('suppliers.updateSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { {
            // dd($request->all());
            $validated = $request->validate([
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|unique:suppliers,email,' . $id,
                'phone' => 'required|min:10|max:15',
                'company' => 'required|min:2|max:255',
                'address' => 'required|min:5|max:255',
            ]);

            // dd($request->all());
            try {
                DB::beginTransaction();
                Supplier::where('id', $id)->update($validated);

                Alert::toast('Supplier Updated successfully.', 'success');
                DB::commit();
                return redirect()->route('supplier')->with('success', 'Supplier updated successfully.');
            } catch (\Throwable $th) {
                DB::rollback();
                Alert::toast('An Error occured while updating the supplier.', 'error');
                return redirect()->back();
            };
        };
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $supplier = Supplier::findOrFail($id);

            $supplier->delete();
            DB::commit();
            Alert::toast('Supplier Deleted Successfuly', 'success');
            return redirect()->route('supplier');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('An Error occured while deleting the supplier', 'error');
        }
    }
}
