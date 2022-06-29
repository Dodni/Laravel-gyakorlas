@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">
    {{--  TRIGGER  --}}

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- LINKS--}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full" style="display:none">
        {{ $slot }}
    </div>
</div>
