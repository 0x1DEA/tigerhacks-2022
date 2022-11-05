<script setup>
const props = defineProps({
    name: String,
    cost: String,
    tons: String,
    lbs: String,
})
</script>
<template>
    <div class="flex gap-4 shadow hover:shadow-xl justify-between w-full items-center rounded bg-neutral-50 px-2 py-1 font-bold">
        <span class="text-3xl">{{ name }}</span>
        <div class="flex gap-8">
            <div class="flex flex-col">
                <span class="text-xl">{{ tons }} TONS</span>
                <span class="text-xs">OF CO2</span>
            </div>
            <div class="flex flex-col">
                <span class="text-xl">${{ cost }}</span>
                <span class="text-xs">IN JET FUEL</span>
            </div>
            <div class="flex flex-col">
                <span class="text-xl">{{ lbs }} LBS</span>
                <span class="text-xs">OF JET FUEL</span>
            </div>
        </div>
    </div>
</template>
