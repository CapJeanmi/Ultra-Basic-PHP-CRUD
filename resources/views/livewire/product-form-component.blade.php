<div class="p-10 bg-white w-screen h-screen">
    <div class="w-3/12">
        <label>Crear Producto</lab>
        <input value="name" type="text" wire:model="name" id="name" class="mt-2 w-full" placeholder="Nombre" />
        <input value="price" type="text" wire:model="price" id="price" class="mt-2 w-full" placeholder="Precio" />
        <input value="tax" type="text" wire:model="tax" id="tax" class="mt-2 w-full" placeholder="Impuesto" />
        @error('name')
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button wire:click="save" type="button"
        class="rounded-lg bg-blue-500 py-3 px-5 text-white hover:bg-blue-800 mt-2">Guardar</button>
    @if (session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @elseif(session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif
</div>
