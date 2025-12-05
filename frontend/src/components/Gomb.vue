<script setup>
defineProps({
    cim:String
})


</script>

<template>
        <Button class="hover:bg-gray-300 py-2 px-4 bg-gray-200 rounded-lg border-1 border-gray-300 drop-shadow-lg">{{ cim }}</Button>
</template>
