<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bill;

class BillDetailComponent extends Component
{
    public $bill;
    public $total = 0;
    public $total_taxes;
    public function render()
    {
        /* Validando seccion solo para admins */
        if(!auth()->user()->is_admin){
            redirect("/");
        }

        /* Obteniendo id de la url */
        $id = request()->route('id');
        $this->bill = Bill::findOrFail($id);

        /* Listando y haciendo calculo de Totales de Factura */
        foreach ($this->bill->purchases as $purchase) {
            $this->total = $this->total + $purchase->product->price;
            $this->total_taxes = $this->total_taxes + ($purchase->product->price * $purchase->product->tax) / 100;
        }
        return view('livewire.billdetail-component');
    }
}
