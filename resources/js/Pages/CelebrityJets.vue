<script setup>
import clouds from '@/../assets/matteo-fusco-m94kn8Rp61Q-unsplash.jpg'
import FlightCard from "@/Components/FlightCard.vue";
import {ref} from "vue";
import {useForm} from "@inertiajs/inertia-vue3";
import {Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    data: Object,
    totals: Object,
})

const carType = {
    SUV: 'SUV',
    Sedan: 'Sedan',
    Pickup: 'Pickup',
}

const form = useForm({
    cars: 0,
    carType: null,
    carHours: []
})

const fancyNum = (n = 0) => {

    return n.toLocaleString('en', { useGrouping: true })
}
const open = ref(false)
</script>
<template>
    <div class="bg-neutral-900">
        <div class="flex flex-col fixed w-full items-center text-white transition-all h-screen flex flex-col leading-[1.8rem] text-[1.9rem] sm:text-[3rem] md:text-[3.8rem] lg:text-[5rem] xl:text-[6rem] 2xl:text-[7rem] sm:leading-[2.5rem] md:leading-[3.5rem] lg:leading-[4rem] xl:leading-[5rem] 2xl:leading-[6rem] uppercase">
            <div class="fixed top-0 left-0 w-full h-full" :style="`background: url('${clouds}'); background-position:bottom;background-size:cover;`">
                <div class="-mt-0.5 big">
                    <h1 class="w-full"><span class="text-red-500">{{ fancyNum(Object.keys(data).length) }}</span> people's private jets</h1>
                    <h1 class="w-full"><span class="text-red-500">{{ fancyNum(totals.trips) }}</span> short-haul trips</h1>
                    <h1 class="w-full"><span class="text-red-500">{{ fancyNum(totals.lbs) }}</span> lbs of jet fuel</h1>
                    <h1 class="w-full"><span class="text-red-500">${{ fancyNum(totals.cost) }}</span> in jet fuel</h1>
                    <h1 class="w-full"><span class="text-red-500">{{ fancyNum(totals.tons) }}</span> tons of co2</h1>
                </div>
            </div>
        </div>
        <div class="flex overflow-y-auto overflow-x-clip flex-col items-center h-screen" style="perspective: 300px;">
            <Link href="/" class="fixed top-4 right-4 underline text-sm opacity-50 text-white" style="translate: 0 0vh 0;">Home</Link>
            <div class="relative w-full" style="transform-style: preserve-3d;translate: 0 0 -2000px; scale: 7; ">
                <div class="w-full h-screen">
                    <div onclick="document.getElementById('content').scrollIntoView({behavior: 'smooth'})" class="text-white mx-auto cursor-pointer h-fit w-fit bg-black rounded-full p-4 animate-bounce" style="translate: 0 90vh 0;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="relative w-full mt-[100vh]" style="translate: 0 17rem 0; transform-style: preserve-3d">
                <div class="absolute inset-0 top-1/2 skew-y-[-15deg] bg-yellow-300 w-full py-64" style="translate: 0 0 -300px; scale: 2.2; filter: drop-shadow(0 0 25px rgba(0, 0, 0, 0.65));"></div>
                <div class="absolute inset-0 top-1/3 skew-y-[10deg] bg-cyan-500 w-full py-64" style="translate: 0 0 -150px; scale: 1.6; filter: drop-shadow(0 0 25px rgba(0, 0, 0, 0.65));"></div>
                <div class="absolute inset-0 top-1/2 skew-y-[-5deg] bg-rose-500 w-full py-64" style="filter: drop-shadow(0 0 25px rgba(0, 0, 0, 0.65));"></div>
            </div>
            <div id="content" class="flex flex-col pt-32 items-center relative w-full">
                <div class="relative mt-[15rem] flex flex-col items-center text-white text-center w-full">
                    <h1 class="text-6xl big">Waste of Air</h1>
                    <p class="text-lg max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl w-full">Carbon emissions are a serious issue our world is currently facing. Our team wanted to draw attention to the disproportionately large impact a small group of people have on carbon emissions. Below we have listed public figures which are the top contributors – specifically looking at their use of private jets.</p>
                </div>
            </div>
            <div class="relative flex flex-col p-8 items-center bg-rose-500 w-full">
                <div class="flex flex-col gap-4 max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl w-full">
                    <h2 class="big text-xl text-white">In last month:</h2>
                    <FlightCard v-for="(person, name) in data" :name="name" :person="person"/>
                    <p class="text-center text-white text-sm">Data derived in real-time from compilations by Jack Sweeny (<a class="underline" href="https://twitter.com/CelebJets">@CelebJets</a> on Twitter) via <a class="underline" href="https://adsbexchange.com">ADS-B Exchange</a></p>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.big {
    font-family: 'Kanit', sans-serif;
}

.perspective {
    perspective: 300px;
}
</style>
