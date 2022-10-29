<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Error;
use Livewire\Component;

class ProductsComponent extends Component
{
    protected $listeners = ['deleteProduct' => 'delete'];
    public $products;
    public $productId = null;

    public function render()
    {
        /* Validando seccion solo para admins */
        if (!auth()->user()->is_admin) {
            redirect("/");
        }

        /* Obteniendo listado de productos para que el cliente pueda elegir */
        $this->products = Product::all();

        return view('livewire.products-component');
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            request()->session()->flash(
                'success',
                'El producto se ha eliminado correctamente'
            );
        } catch (Error) {
            request()->session()->flash(
                'error',
                'El producto no pudo eliminarse'
            );
        }
    }

    public function showProduct($id)
    {
        redirect("products/$id");
    }
}

