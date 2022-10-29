<div class="p-10 bg-white w-screen h-screen">
    <div class="mt-5">
        <p class="text-xl my-3">Administrar Productos</p>
        <table class="w-full">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Impuesto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="px-5 py-3 text-center">{{ $product->id }}</td>
                        <td class="px-5 py-3 text-center">{{ $product->name }}</td>
                        <td class="px-5 py-3 text-center">{{ $product->price }}</td>
                        <td class="px-5 py-3 text-center">{{ $product->tax }}</td>
                        <td class="px-5 py-3 text-center">{{ $product->created_at }}</td>
                        <td class="px-5 py-3 text-center">
                            <button wire:click="showProduct({{ $product->id }})" type="button"
                                class="rounded-lg bg-blue-500 py-3 px-5 text-white hover:bg-blue-800 mt-2">Crear</button>
                            <button wire:click="deleteProduct({{ $product->id }})" type="button"
                                class="rounded-lg bg-red-500 py-3 px-5 text-white hover:bg-red-800 mt-2">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
