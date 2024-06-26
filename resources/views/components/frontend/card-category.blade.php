@props([
    'icon',
    'name',
    'totalEvents'
])
<!-- Card -->
<div
    class="p-5 bg-primary rounded-2xl relative inline-flex gap-[14px] items-center w-full hover:ring-2 hover:ring-lavender-pink transition ease-in-out duration-300 group">
    <a href="#!" class="after:absolute after:inset-0">
        <img src="{{ $icon }}" alt="tickety-assets">
    </a>
    <div>
        <p class="text-xl font-semibold capitalize">
            {{ $name }}
        </p>
        <p class="mt-[6px] text-sm text-pastel-purple">
            {{ $totalEvents }} Events
        </p>
    </div>
    <span class="text-lavender-pink absolute transition duration-300 ease-in-out text-3xl translate-x-8 translate-y-1/2 opacity-0 bottom-1/2 right-[35px] group-hover:translate-x-0 group-hover:opacity-100">&LeftArrow;</span>
</div>
