<x-filament-panels::page>
    <form wire:submit="create">
        {{ $this->form }}

        <div class="flex mt-4">
            <x-filament::button type="submit">
                Сохранить
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
