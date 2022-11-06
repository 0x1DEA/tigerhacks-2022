<script setup>
import clouds from '@/../assets/billy-huynh-v9bnfMCyKbg-unsplash.jpg'
import {onMounted, ref, onBeforeUnmount} from "vue"
import {useForm} from "@inertiajs/inertia-vue3"
import "leaflet/dist/leaflet.css"
import L from "leaflet"
import LRoutingMachine from "../Components/LRoutingMachine.vue"
import {Link} from '@inertiajs/inertia-vue3'

const props = defineProps({
    data: Object
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

const open = ref(false)

onMounted(async () => {
    map.value = L.map("map").setView([46.05, 11.05], 6);
    L.tileLayer("https://{s}.tile.osm.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map.value);
    let customPane = map.value.createPane("customPane");
    let canvasRenderer = L.canvas({ pane: "customPane" });
    customPane.style.zIndex = '399';
})

onBeforeUnmount(() => {
    if (map.value) {
        map.value.remove();
    }
})

const fromQ = ref(null)
const toQ = ref(null)
const fromRes = ref(null)
const toRes = ref(null)
const search = () => {
    fetch('/api/search?q=' + fromQ.value)
        .then(res => res.json())
        .then(data => {
            if(data) {
                fromQ.value = data[0].display_name
                waypoints.value[0].lat = data[0].lat
                waypoints.value[0].lon = data[0].lon
            }
            fetch('/api/search?q=' + toQ.value)
                .then(res => res.json())
                .then(data => {
                    if(data) {
                        toQ.value = data[0].display_name
                        waypoints.value[1].lat = data[0].lat
                        waypoints.value[1].lon = data[0].lon
                    }
                    router.value.map = map.value;
                    router.value.waypoints = waypoints.value
                    router.value.add()
                })
        })
}

const map = ref(null)
const router = ref(null)
const waypoints = ref([
    {},
    {}
])
</script>
<template>
    <div class="flex flex-col items-center bg-neutral-900 min-h-screen">
        <div class="flex flex-col items-center text-center text-neutral-800 min-h-screen w-full flex flex-col" :style="`background: url('${clouds}'); background-position:bottom;background-size:cover;`">
            <div class="flex flex-col max-w-xl md:max-w-2xl lg:max-w-4xl xl:max-w-5xl">
                <div style="margin-top: 4rem">
                    <h1 class="w-full big text-[4rem] uppercase">find a low-carbon path</h1>
                    <div class="flex flex-col p-2 gap-2 text-white !bg-opacity-20 bg-black w-full rounded">
                        <div class="flex flex-col lg:flex-row justify-between gap-2 text-left">
                            <label class="flex flex-col grow basis-0">
                                <span>From</span>
                                <input v-model="fromQ" class="rounded bg-black/50" type="text"/>
                            </label>
                            <label class="flex flex-col grow basis-0">
                                <span>To</span>
                                <input v-model="toQ" class="rounded bg-black/50" type="text"/>
                            </label>
                        </div>
                        <div @click="search" class="cursor-pointer bg-blue-500 rounded text-white py-2">Search</div>
                        <div class="h-full min-h-[500px]" id="map"></div>
                        <LRoutingMachine ref="router" :map-object="this.$refs.map" :waypoints="this.$refs.waypoints"/>
                        <p>&lt; 1000 km (~621 miles): This distance is less than the recommended amount for air travel. Instead, try driving or using public transport (such as trains) if that’s available.</p>
                        <p>&gt; 1000 km (~621 miles): This distance meets the recommended amount for air travel – there will be less carbon emissions if you travel by plane than by car. However, if air travel isn’t an option, carpooling with others to your destination is a better alternative than driving by yourself.</p>
                        <Link href="/" class="underline">Home</Link>
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
