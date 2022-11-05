<script setup>
import clouds from '@/../assets/matteo-fusco-m94kn8Rp61Q-unsplash.jpg'
import FlightCard from "@/Components/FlightCard.vue";
</script>
<template>
    <div class="bg-neutral-900 min-h-screen">
        <div class="z-0 text-white relative h-screen flex flex-col w-4x text-[8rem] leading-none uppercase">
            <div class="fixed top-0">
                <h1 class="w-full">400 tons of co2</h1>
                <h1 class="w-full text-right">2,103 gallons of fuel</h1>
                <h1 class="w-full">$10,284 in jet fuel</h1>
            </div>
        </div>
        <div class="flex flex-col p-8 items-center z-10 relative bg-rose-500 h-screen bg-fill bg-bottom">
            <div class="flex flex-col gap-4 max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl w-full">
                <FlightCard name="Elon Musk" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Taylor Swift" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Floyd Mayweather" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Drake" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Mark Wahlberg" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Kylie Jenner" cost="2,041" lbs="1,204" tons="8"/>
                <FlightCard name="Jay-Z" cost="2,041" lbs="1,204" tons="8"/>
            </div>
        </div>
    </div>
</template>
<style>
h1 {
    font-family: 'Kanit', sans-serif;
}
</style>
