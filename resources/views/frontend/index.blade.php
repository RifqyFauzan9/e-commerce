<x-frontend.layout>
    @section('title', 'Landing Page')
    <!-- Hero -->
    <section id="heroSection" class="container relative max-w-screen-xl pt-10 pb-24">
        <div class="flex flex-wrap items-center justify-between w-full gap-8">
            <img src="{{ asset('assets/images/hero-image.webp') }}" class="max-w-[584px] max-h-[400px] w-full h-full"
                alt="tickety-assets">
            <div class="w-full max-w-[400px] flex flex-col gap-4 text-right">
                <div class="inline-flex gap-[6px] items-center ml-40 bg-lavender-pink rounded-lg px-4 py-[6px] w-max">
                    <img src="{{ asset('assets/svgs/ic-champion-cup.svg') }}" alt="tickety-assets">
                    <p class="text-sm font-semibold text-dark-indigo">
                        Buy one get three tickets
                    </p>
                </div>
                <h1 class="text-[36px] md:text-[48px] text-white font-bold">
                    Empower Your
                    <span style="color: #547A29; background: #F5F5F5;"
                        class="inline-flex items-center h-[49px] w-max">Passions</span>
                    Today
                </h1>
                <p class="text-base leading-8 md:text-lg text-iron-grey">
                    You deserve new experiences that enhance
                    the things you are truly passionate about.
                </p>
                <div class="mt-[14px]">
                    <a href="#eventSection" class="bg-lavender-pink py-3 px-6 rounded-lg font-semibold text-yellow-butter hover:text-secondary hover:ring-2 hover:ring-secondary transition ease-in-out duration-300">
                        Explore Now
                    </a>
                </div>
            </div>


        </div>
    </section>
    <!-- Wavy line ornament -->
    <img src="{{ asset('assets/svgs/wavy-line-1.svg') }}" class="absolute -z-10 md:top-[160px] w-full"
        alt="tickety-assets">
    <!-- Event Section -->
    <section id="eventSection" class="container relative max-w-screen-xl py-10">
        <!-- Section Header -->
        <div class="flex {{ request()->has('all_events') ? 'justify-center' : 'justify-between' }} items-center gap-4 mb-[50px]">
            @if (!request()->has('all_events'))
                <a href="{{ request()->fullUrlWithQuery(['all_events' => 1]) }}" class="bg-lavender-pink hover:text-secondary py-3 px-6 rounded-lg font-semibold transition ease-in-out duration-300 hover:ring-2 hover:ring-secondary">
                    View All
                </a>
            @endif

            <h5 class="text-[24px] md:text-[38px] font-bold {{ !request()->has('all_events') ? 'text-right' : 'text-center' }}">
                <span class="text-lavender-pink">Big</span> Events, <br>
                Coming <span class="text-lavender-pink">Soon</span>
            </h5>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
            @foreach ($events as $event)
                <x-frontend.card-event :cover="$event->thumbnail" :title="$event->name" :isPopular="$event->is_popular" :icon="$event->icon" :category="$event->category->name"
                    :date="$event->start_time" :price="$event->start_from" :description="$event->headline" :route="route('detail', $event->slug)">
                </x-frontend.card-event>
            @endforeach
        </div>
    </section>

    <!-- Category Section -->
    <section id="categoriesSection" class="relative pb-[100px] overflow-hidden">
        <div class="container relative max-w-screen-xl py-10">
            <!-- Section Header --> 
            <div class="flex justify-between items-center gap-4 mb-[50px]">
                <h5 class="text-[24px] md:text-[38px] font-bold">
                    <span class="text-lavender-pink">Browse</span> by <br>
                    Top <span class="text-lavender-pink">Categories</span>
                </h5>

                @if (!request()->has('all_categories'))
                    <a href="{{ request()->fullUrlWithQuery(['all_categories' => 1]) }}" class="bg-lavender-pink hover:text-secondary py-3 px-6 rounded-lg font-semibold transition ease-in-out duration-300 hover:ring-2 hover:ring-secondary">
                        View All
                    </a>
                @endif
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-[30px] relative">
                @foreach ($categories as $category)
                    <x-frontend.card-category :name="$category->name" :totalEvents="$category->events_count" :icon="$category->icon ?? asset('assets/svgs/ic-movie.svg')"
                        :route="request()->fullUrlWithQuery(['category' => $category->id])" />
                @endforeach
            </div>
        </div>

        <!-- Wavy line ornament -->
        <img src="{{ asset('assets/svgs/wavy-line-2.svg') }}" class="absolute -z-10 top-[250px] w-full"
            alt="tickety-assets">
    </section>
</x-frontend.layout>
