@props([
    'isPopular' => false,
    'icon' => asset('assets/svgs/ic-champion-cup.svg'),
    'cover',
    'title',
    'category',
    'date',
    'price',
    'description',
    'route' => url('/'),
])

<div class="group rounded-2xl w-full overflow-hidden relative min-h-[297px] bg-primary">
    @if ($isPopular)
    <div class="px-[14px] py-2 rounded-xl bg-lavender-pink text-dark-indigo font-semibold text-sm absolute top-5 right-5 flex gap-1">
        <img src="{{ $icon }}" alt="">
        <p>Popular</p>
    </div>
    @endif
    <img src="{{ $cover }}" class="w-full h-full max-h-[205px]" alt="tickety-assets">
    <div class="p-5 w-full bg-primary flex flex-col absolute h-full group-hover:-translate-y-[70%] transition ease-in-out duration-300">
        <div class="flex flex-wrap items-center justify-between gap-y-4">
            <div class="max-w-[180px]">
                <div class="text-xl font-semibold truncate uppercase">
                    {{ $title }}
                </div>
                <p class="text-pastel-purple text-sm mt-[6px]">
                    {{ $category }} • {{ $date }}
                </p>
            </div>
            <p class="text-xl font-semibold text-yellow-butter rounded-lg py-1 px-2 bg-lavender-pink">
                ${{ number_format($price) }}
            </p>
        </div>
        <p
            class="mt-4 text-base leading-7 transition duration-300 ease-in-out opacity-0 text-iron-grey group-hover:opacity-100 line-clamp-3">
            {{ $description }}
        </p>
        <div class="mt-auto transition duration-300 ease-in-out opacity-0 group-hover:opacity-100">
            <a href="{{ $route }}" class="block btn-secondary transition ease-in-out duration-300 hover:ring-2 hover:ring-lavender-pink hover:text-lavender-pink">
                View Details
            </a>
        </div>
    </div>
</div>
