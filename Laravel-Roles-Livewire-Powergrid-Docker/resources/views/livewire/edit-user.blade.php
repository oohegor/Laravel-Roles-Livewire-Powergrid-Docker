<div class="p-8">
    <form class="pt-3">
        <div class="my-flex-wrap">
            <div class="form-group mt-4 m-3">
                <x-label for="nlc" :value="__('Name')"/>
                <x-input id="nlc" class="block mt-1 w-full" type="string"
                         wire:model.defer="name"/>
                @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

        <div class="flex justify-end mt-4">
            <x-button type="submit" class="bg-blue-400 hover:bg-blue-500" wire:click="update">
                {{ __('Update') }}
            </x-button>
            <x-button type="" class="ml-5 bg-gray-400" wire:click="$emit('closeModal')">
                {{ __('Close') }}
            </x-button>
        </div>
    </form>
</div>
