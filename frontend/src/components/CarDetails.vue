<script setup>
import Gomb from './Gomb.vue';

defineProps({
    car: Object
})


</script>

<template>
    <div class="drop-shadow-lg bg-white mx-[300px] my-[30px] capitalize p-3 border-1 border-l-8 border-green-300 rounded-md transform ease-out duration-700 motion-safe:hover:scale-105">
        <div style="text-align: center;">
            <p class="text-2xl">{{ car.brand }} {{ car.model }}</p>
            <p class="text-xl px-9 mt-5">Rendszám: {{ car.number_plate ? car.number_plate : "Nincsen autóhoz tartozó rendszám!" }}</p>
        </div>
        <div style="text-align: center; justify-content: center;" class="gap-9 flex mt-5 mb-2">
            <Gomb cim="Új szervíz"></Gomb>
            <Gomb cim="Összes szervíz"></Gomb>
        </div>
    </div>
</template>
