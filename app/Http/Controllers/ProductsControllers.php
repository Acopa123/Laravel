<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Suppliers;
use App\Units;
use App\Category;
use App\Coins;
use App\Catalog;
use App\Invoice;
use App\Http\Requests\CreateProductsRequest;

class ProductsControllers extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Products::all();
      return view('admin.inventary.inventary', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $coins = Coins::all();
      $catalog = Catalog::with(['supplier', 'category'])->get();
      return view('admin.inventary.add-product', compact('coins', 'catalog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductsRequest $request)
    {
      $idProduct = request('idProduct');
      $product = Products::find($idProduct);
      if ($product === null) {
        $product = new Products;
        $product->id = $idProduct;
        $product->category = request('category');
        $product->initials = request('initials');
        $product->supplier = request('proveedor');
        $product->checkin = request('fecha_entrada');
        $product->unit = request('unidad');
        $product->description = request('description');
        $product->priceList = request('precio_lista');
        $product->cost = request('costo');
        $product->stock = request('cantidad_entrada');
      }else {
        $stock  = (integer)$product->stock + (integer)request('cantidad_entrada');
        $product->stock=(string)$stock;
        $product->category = request('category');
        $product->initials = request('initials');
        $product->supplier = request('proveedor');
        $product->checkin = request('fecha_entrada');
        $product->unit = request('unidad');
        $product->description = request('description');
        $product->priceList = request('precio_lista');
        $product->cost = request('costo');
      }

      $product->save();

      $invoice = new Invoice;
      $invoice->nInvoice = request('nInvoice');
      $invoice->category = request('category');
      $invoice->initials = request('initials');
      $invoice->supplier = request('proveedor');
      $invoice->checkin = request('fecha_entrada');
      $invoice->quantity = request('cantidad_entrada');
      $invoice->unit = request('unidad');
      $invoice->priceList = request('precio_lista');
      $invoice->cost = request('costo');
      $invoice->description = request('description');
      $invoice->priceSales1 = request('priceSales1');
      $invoice->priceSales2 = request('priceSales2');
      $invoice->priceSales3 = request('priceSales3');
      $invoice->priceSales4 = request('priceSales4');
      $invoice->priceSales5 = request('priceSales5');
      $invoice->coin_id = request('moneda');
      $invoice->save();

      return redirect('admin/inventary')->with('success','Producto '. $product->category .' Guardado correctamente')
      ->withInput(request(['tipo_producto' , 'proveedor', 'fecha_entrada', 'cantidad_entrada',
      'unidad', 'precio_lista', 'costo', 'moneda', 'description', 'priceSales1',
      'priceSales2', 'priceSales3', 'priceSales4', 'priceSales5', 'initials']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product = Products::find($id);
      $product->coin;
      return view('admin.inventary.show-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // $suppliers = Suppliers::all();
      // $units = Units::all();
      $product = Products::find($id);
      // $coins = Coins::all();
      return view('admin.inventary.edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $newCategory = $request->input('category');
      $newInitials = $request->input('initials');
      $newSupplier = $request->input('proveedor');
      $newCheckin = $request->input('fecha_entrada');
      $newUnit = $request->input('unidad');
      $newDescription = $request->input('description');
      $newStock = $request->input('cantidad_entrada');

      $product = Products::find($id);

      $product->category = $newCategory;
      $product->initials = $newInitials;
      $product->supplier = $newSupplier;
      $product->checkin = $newCheckin;
      $product->unit = $newUnit;
      $product->description = $newDescription;
      $product->stock = $newStock;
      $product->save();

      return redirect('admin/inventary')->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Products::find($id)->delete();
      return redirect('admin/inventary')->with('success','Producto '. $id .' eliminado correctamente');
    }

    public function getProductAjax($id)
    {
      $product = Catalog::find($id);
      $product->unit;
      $product->supplier;
      $product->category;
      return $product;
    }
}
