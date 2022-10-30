<div class="p-10 bg-white w-screen h-screen">
    <div class="w-3/12">
        <form wire:submit.prevent="save">
            @csrf
            <div class="text-xs mb-6">
                <x-jet-label class="name" for="name" value="Nombre" />
                <x-jet-input wire:model="name" type="text" class="text-xs mt-1 block w-full" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
            <div class="text-xs mb-6">
                <x-jet-label class="text-xs" for="price" value="Precio" />
                <x-jet-input wire:model="price" name="price" type="text" rows="3"
                    class="text-xs border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                </x-jet-input>
                <x-jet-input-error for="price" class="mt-2" />
            </div>
            <div class="text-xs mb-6">
                <x-jet-label class="text-xs" for="tax" value="Impuesto" />
                <x-jet-input wire:model="tax" name="tax" type="text" rows="3"
                    class="text-xs border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                </x-jet-input>
                <x-jet-input-error for="tax" class="mt-2" />
            </div>
            <button wire:click="save" type="button"
                class="rounded-lg bg-blue-500 py-3 px-5 text-white hover:bg-blue-800 mt-2">Guardar</button>
    </div>
</div>
