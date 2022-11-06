<script setup>
import "leaflet-routing-machine/dist/leaflet-routing-machine.css";
import L from "leaflet";
import "leaflet-routing-machine";
import {getCurrentInstance, nextTick, onBeforeUnmount, onMounted, ref, watch} from "vue";

const props = defineProps({
    mapObject: {
        type: Object,
    },
    visible: {
        type: Boolean,
        default: true,
    },
    waypoints: {
        //type: Array,
        required: true,
    },
    router: {
        //type: IRouter,
    },
    plan: {
        type: L.Routing.Plan,
    },
    geocoder: {
        //type: IGeocoder,
    },
    fitSelectedRoutes: {
        type: [String, Boolean],
        default: "smart",
    },
    lineOptions: {
        //type: LineOptions,
    },
    routeLine: {
        type: Function,
    },
    autoRoute: {
        type: Boolean,
        default: true,
    },
    routeWhileDragging: {
        type: Boolean,
        default: false,
    },
    routeDragInterval: {
        type: Number,
        default: 500,
    },
    waypointMode: {
        type: String,
        default: "connect",
    },
    useZoomParameter: {
        type: Boolean,
        default: false,
    },
    showAlternatives: {
        type: Boolean,
        default: false,
    },
    altLineOptions: {
        //type: LineOptions,
    },
});

let ready = false;
const map = ref(null);
const waypoints = ref(null);
let layer = null;

onBeforeUnmount(() => {
    return layer ? layer.remove() : null
})

const add = () => {
    if (map == null) {
        return;
    }

    const options = {
        waypoints: waypoints.value,
        fitSelectedRoutes: props.fitSelectedRoutes,
        autoRoute: props.autoRoute,
        routeWhileDragging: props.routeWhileDragging,
        routeDragInterval: props.routeDragInterval,
        waypointMode: props.waypointMode,
        useZoomParameter: props.useZoomParameter,
        showAlternatives: props.showAlternatives,
    };

    const routingLayer = L.Routing.control(options);
    routingLayer.addTo(map.value);
    console.log(map.value)
    console.log(JSON.stringify(map.value))
    layer = routingLayer;

    ready = true;
}

defineExpose({
    add,
    map,
    waypoints
})
</script>
