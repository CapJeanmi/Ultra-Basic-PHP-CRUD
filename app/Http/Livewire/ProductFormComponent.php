<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Error;
use Livewire\Component;
use Illuminate\Http\Request;

class ProductFormComponent extends Component
{
    public $name;
    public $price;
    public $tax;
    public $product;

    public function render(Request $request)
    {
        /* Validando seccion solo para admins */
        if (!auth()->user()->is_admin) {
            redirect("/");
        }

        if ($request->id) {
            $this->product = Product::findOrFail($request->id);
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->tax = $this->product->tax;
        }

        return view('livewire.product-form-component');
    }


    /* Validando y Creando un nuevo producto */
    public function save()
    {

        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'tax' => 'required',
        ], [
            'required' => __('Es necesario rellenar todos los campos'),
        ]);

        /* Creando un nuevo producto */
        try {
            if (!$this->product) {
                $this->product = new Product();
            };

            $this->product->name = $this->name;
            $this->product->price = $this->price;
            $this->product->tax = $this->tax;
            $this->product->save();

            request()->session()->flash(
                'success',
                'El producto se ha guardado correctamente.'
            );

            redirect("products");

        } catch (Error) {
            request()->session()->flash(
                'error',
                'El producto no se ha guardado.'
            );
        }
    }
}
