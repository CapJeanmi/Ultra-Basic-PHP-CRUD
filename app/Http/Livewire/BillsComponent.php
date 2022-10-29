<?php

namespace App\Http\Livewire;

use App\Models\Bill;
use App\Models\Purchase;
use Livewire\Component;

class BillsComponent extends Component
{
    public $bills;

    public function render()
    {
        /* Validando seccion solo para admins */
        if(!auth()->user()->is_admin){
            redirect("/");
        }

        /* Obteniendo listado de facturas */
        $this->bills = Bill::all();

        return view('livewire.bills-component');
    }

    public function generateBills()
    {
        /* Obteniendo compras que no hayan sido facturadas */
        $purchases = Purchase::whereNull('bill_id')->get();
        $array = [];

        foreach ($purchases as $purchase) {
            if(!array_key_exists($purchase->user_id, $array)) {
                $array[$purchase->user_id] = [];
            }
            array_push($array[$purchase->user_id], $purchase);
        }

        /* Colocandole id de usuario comprador a las facturas */
        foreach ($array as $user => $purchases) {
            $bill = Bill::create(["user_id" => $user]);
            foreach ($purchases as $purchase) {
                $purchase->bill_id = $bill->id;
                $purchase->save();
            }
        }

        redirect("bills");
    }

    public function showBill($id)
    {
        redirect("bills/$id");
    }
}
