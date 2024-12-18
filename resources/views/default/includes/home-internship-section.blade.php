<section class="product-wrapper mt-6 mt-md-10 pt-4 mb-10 pb-2 container appear-animate"
    data-animation-options="{ 'delay': '.6s' }">
    <h2 class="title title-center">We’re Here for Your Growth Too!</h2>
    <h2 class="title title-center">Join Internship Program</h2>
    <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                    'items': 5,
                    'nav': false,
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5,
                            'dots': false,
                            'nav': true
                        }
                    }
                }">
        @forelse($internships as $internship)
        <x-product-card :details="$internship" path="/internship"/>
        @empty
        @endforelse
        
    </div>
</section>