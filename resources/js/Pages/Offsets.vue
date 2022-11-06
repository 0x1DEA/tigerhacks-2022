<script setup>
import clouds from '@/../assets/sebastian-unrau-sp-p7uuT0tw-unsplash.jpg'
import {Link} from '@inertiajs/inertia-vue3'

</script>
<template>
    <div class="flex flex-col items-center bg-neutral-900 min-h-screen">
        <div class="flex flex-col items-center text-center text-neutral-800 h-screen w-full flex flex-col" :style="`background: url('${clouds}'); background-position:bottom;background-size:cover;`">
            <div class="flex flex-col p-4 text-white max-w-xl md:max-w-2xl lg:max-w-3xl xl:max-w-4xl" style="margin-top: 5rem">
                <h1 class="text-6xl big ">Carbon Offsets</h1>
                <div class="flex flex-col gap-4 text-left rounded bg-black bg-opacity-50 p-4">
                    <p>Carbon offsets (also known as carbon credits) allow a person or organization to pay money towards efforts to reduce carbon emissions – this is done in order to negate the negative effects of their own carbon emissions. “Carbon offsets seek to compensate for emissions in one place — for example, from passenger airplanes — by funding emission reductions or carbon removal somewhere else, like forests.”</p>
                    <p>Carbon offsets are a response to growing pressures to take accountability for carbon emissions. They are often used by companies to meet goals of being carbon-neutral (that is, balancing out their carbon footprint).₂ While the idea may have been founded in good intentions, there is debate due to how it is being used. Critics of carbon offsetting are wary of “companies being able to buy their way out of their responsibility”.</p>
                    <p>Carbon offsets have been embraced by many policy makers, largely because they do not prompt people or organizations producing carbon emissions to change how they operate.₁ Meaningful change is necessary to actually reduce carbon emissions. We need to go beyond carbon-neutrality to combat climate change.</p>
                    <Link href="/" class="underline">Home</Link>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.big {
    font-family: 'Kanit', sans-serif;
}
.leaflet-routing-alt {
    color:black;
}
</style>
