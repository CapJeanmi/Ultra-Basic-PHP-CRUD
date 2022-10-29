<div class="p-10 bg-white w-screen h-screen">
    <button wire:click="generateBills" type="button"
        class="rounded-lg bg-blue-500 py-3 px-5 text-white hover:bg-blue-800 mt-2">Generar Facturas</button>

    <div class="mt-5">
        <p class="text-xl my-3">Facturas</p>
        <table class="w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Cantidad de Productos</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <td class="px-5 py-3 text-center">{{ $bill->id }}</td>
                        <td class="px-5 py-3 text-center">{{ $bill->user->name }}</td>
                        <td class="px-5 py-3 text-center">{{ $bill->purchases->count() }}</td>
                        <td class="px-5 py-3 text-center">{{ $bill->created_at }}</td>
                        <td class="px-5 py-3 text-center">
                            <button wire:click="showBill({{ $bill->id }})" type="button"
                                class="rounded-lg bg-blue-500 py-3 px-5 text-white hover:bg-blue-800 mt-2">Ver</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
