<script setup>
import {getCurrentInstance, ref} from "vue";
import flight from "@/../assets/Fg2MSuAXkAEmzrJ.png"

const props = defineProps({
    person: Object,
    name: String
})

const open = ref(false)

const toggle = () => {
    open.value = !open.value;
}
</script>
<template>
    <div class="flex w-full justify-between">
        <div @click="toggle" class="cursor-pointer overflow-clip flex flex-col relative shadow hover:shadow-xl rounded bg-neutral-50 px-2 py-1 font-bold transition-all ease-out delay-50 duration-300" :class="open ? 'w-1/3 mr-4' : 'w-full mr-0'">
            <div class="flex justify-between gap-4 items-center">
                <span class="text-xl lg:text-3xl w-2/5">{{ name.replaceAll(' ', '&nbsp;') }}</span>
                <div class="transition-[visibility] w-3/5" :class="open ? 'invisible' : 'visible'">
                    <div class="flex gap-8 transition ease-out duration-50" :class="open ? 'opacity-0' : 'opacity-100 delay-100'">
                        <div class="flex flex-col  w-1/3">
                            <span class="text-xl">{{ person.tons.toLocaleString('en', {useGrouping:true}) }}&nbsp;TONS</span>
                            <span class="text-xs">OF&nbsp;CO2</span>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <span class="text-xl">${{ person.cost.toLocaleString('en', {useGrouping:true}) }}</span>
                            <span class="text-xs">IN&nbsp;JET&nbsp;FUEL</span>
                        </div>
                        <div class="flex flex-col w-1/3">
                            <span class="text-xl">{{ person.lbs.toLocaleString('en', {useGrouping:true}) }}&nbsp;LBS</span>
                            <span class="text-xs">OF&nbsp;JET&nbsp;FUEL</span>
                        </div>
                    </div>
                </div>
            </div>
            <div ref="content" class="w-fit transition-all ease-out duration-300 h-full" :style="`max-height:${open ? this.$el.firstChild.scrollHeight + 'px' : '0px'};`">
                <div class="flex flex-col h-full">
                    <div class="flex flex-col  w-1/3">
                        <span class="text-xl">{{ person.trips.toLocaleString('en', {useGrouping:true}) }}&nbsp;FLIGHTS</span>
                        <span class="text-xs">IN&nbsp;PAST&nbsp;MONTH</span>
                    </div>
                    <div class="flex flex-col  w-1/3">
                        <span class="text-xl">{{ person.tons.toLocaleString('en', {useGrouping:true}) }}&nbsp;TONS</span>
                        <span class="text-xs">OF&nbsp;CO2</span>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <span class="text-xl">${{ person.cost.toLocaleString('en', {useGrouping:true}) }}</span>
                        <span class="text-xs">IN&nbsp;JET&nbsp;FUEL</span>
                    </div>
                    <div class="flex flex-col w-1/3">
                        <span class="text-xl">{{ person.lbs.toLocaleString('en', {useGrouping:true}) }}&nbsp;LBS</span>
                        <span class="text-xs">OF&nbsp;JET&nbsp;FUEL</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col transition-all duration-300 ease-out bg-white rounded shadow overflow-clip" :class="open ? 'w-2/3 opacity-100' : 'w-0 opacity-0'">
            <div class="transition-[padding]" :class="open ? 'p-4 pt-1' : 'p-0'">
                <div class="font-bold text-center">Latest&nbsp;flight</div>
                <img :src="flight" alt="Flight Path"/>
            </div>
        </div>
    </div>
</template>
