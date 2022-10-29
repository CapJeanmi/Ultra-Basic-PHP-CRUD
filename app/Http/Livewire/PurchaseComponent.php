<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Purchase;

class PurchaseComponent extends Component
{
    public $products;
    public $selectedProduct;

    public function render()
    {
        /* Validando seccion solo para admins */
        if(auth()->user()->is_admin){
            redirect("/");
        }

        /* Obteniendo listado de productos para que el cliente pueda elegir */
        $this->products = Product::all();

        return view('livewire.purchase-component');
    }

    public function save()
    {
        /* Validando el Select con los Productos a Elegir */
        $this->validate([
            'selectedProduct' => 'required',
        ], ["selectedProduct.required" => "Es necesario seleccionar un Producto"]);

        /* Creando una nueva compra */
        $newPurchase = Purchase::create([
            "product_id" => $this->selectedProduct,
            "user_id" => auth()->user()->id
        ]);

        if($newPurchase) {
            request()->session()->flash(
                'success',
                'La compra se ha generado correctamente.'
            );
        } else {
            request()->session()->flash(
                'error',
                'La compra no se ha generado.'
            );
        }

        redirect("purchase");
    }
}
