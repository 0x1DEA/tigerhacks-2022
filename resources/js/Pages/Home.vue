<script setup>
import clouds from '@/../assets/billy-huynh-v9bnfMCyKbg-unsplash.jpg'
import {Link} from '@inertiajs/inertia-vue3'

</script>
<template>
    <div class="flex flex-col items-center bg-neutral-900 min-h-screen">
        <div class="flex flex-col items-center text-center text-neutral-800 h-screen w-full flex flex-col" :style="`background: url('${clouds}'); background-position:bottom;background-size:cover;`">
            <div class="flex flex-col max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl">
                <div class="py-32">
                    <h1 class="w-full big text-[4rem] uppercase">it shouldn't be this hard.</h1>
                    <div class="flex justify-center font-bold text-white text-xl gap-2">
                        <Link href="/celebrity-jets" class="rounded transition shadow hover:shadow-xl cursor-pointer bg-black bg-opacity-50 px-2 py-2">Celebrity Jets</Link>
                        <Link href="/planner" class="rounded transition shadow hover:shadow-xl cursor-pointer bg-black bg-opacity-50 px-2 py-2">Trip Planner</Link>
                        <Link href="/calculator" class="rounded transition shadow hover:shadow-xl cursor-pointer bg-black bg-opacity-50 px-2 py-2">Carbon Calculator</Link>
                        <Link href="/offsets" class="rounded transition shadow hover:shadow-xl cursor-pointer bg-black bg-opacity-50 px-2 py-2">Carbon Offsets</Link>
                    </div>
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
