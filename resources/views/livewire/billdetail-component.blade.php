<div class="p-10 bg-white w-screen h-screen">
    <div>Detalle de la Factura</div>
    <div> Cliente: {{$bill->user->name}}</div>
    <div> Fecha: {{$bill->created_at}}</div>
    <div> Productos</div>
    <table class="mt-5 w-full text-center">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Impuestos %</th>
                <th>Impuestos $</th>
                <th>Precio (Imp. Incluidos) </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bill->purchases as $purchase)
                <tr>
                    <td>{{$purchase->product->name}}</td>
                    <td>{{$purchase->product->tax}}%</td>
                    <td>${{($purchase->product->tax * $purchase->product->price) / 100}}</td>
                    <td>${{$purchase->product->price}}</td>
                </tr>
            @endforeach
                <tr class="mt-5  border ">
                    <td colspan="2">Total</td>
                    <td>${{round($total_taxes,2)}}</td>
                    <td>${{round($total,2)}}</td>
                </tr>
        </tbody>
    </table>
</div>
