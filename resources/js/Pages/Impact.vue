<script setup>
import clouds from '@/../assets/matteo-fusco-m94kn8Rp61Q-unsplash.jpg'
import FlightCard from "@/Components/FlightCard.vue";
import {useForm} from "@inertiajs/inertia-vue3";
import bg from '@/../assets/pasted image 0.png'
import {Link} from '@inertiajs/inertia-vue3'
import {computed} from "vue";

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
    flights: 0,
    flightTypes: [],
    cars: 0,
    carTypes: [],
    carPowers: [],
    carHours: [],
    rideshareHours: 0
})

const total = computed(() => {
    let total = 0

    for (let i = 0; i < form.carTypes.length; i++) {
        total += 75 * 100
    }

    return total
})
</script>
<template>
    <div class="flex flex-col items-center relative p-8 min-h-screen w-full !bg-cover" :style="`background:url('${bg}');`">
        <div class="max-w-xl md:max-w-2xl space-y-2 lg:max-w-4xl xl:max-w-5xl w-full p-8 rounded shadow bg-white bg-opacity-50 backdrop-blur">
            <h2 class="big text-4xl">See Your Impact</h2>
            <label class="flex flex-col">
                <span>Number of cars</span>
                <input v-model="form.cars" max="10" type="number"/>
            </label>
            <div v-for="i in form.cars" :key="i" class="flex flex-col space-y-2 ml-8 p-2 bg-neutral-100 rounded">
                <span>Car {{ i }}</span>
                <select v-model="form.carTypes[i]">
                    <option selected>Small (Sedan)</option>
                    <option>Medium (SUV)</option>
                    <option>Large (7+ Passenger)</option>
                </select>
                <select v-model="form.carPowers[i]">
                    <option  selected>Gas</option>
                    <option>Diesel</option>
                    <option>Hybrid</option>
                    <option>Electric</option>
                </select>
                <label class="flex flex-col">
                    <span>Hours driven per week</span>
                    <input v-model="form.carHours[i]" type="number"/>
                </label>
            </div>
            <label class="flex flex-col">
                <span>Flights within the past year</span>
                <input v-model="form.cars" max="10" type="number"/>
            </label>
            <label class="flex flex-col">
                <span>How many times a week to you rideshare</span>
                <input v-model="form.cars" max="10" type="number"/>
            </label>
            <h1 class="big text-4xl">{{ total }}g of CO2</h1>
            <Link href="/" class="underline">Home</Link>
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
