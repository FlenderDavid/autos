<script setup>
import { defineProps } from 'vue'
import { RouterLink } from 'vue-router'

const props = defineProps({
    cim: String,
    to: {
        type: String,
        default: null
    }
})
</script>

<template>

    <RouterLink v-if="to" :to="to">
        <Button class="hover:bg-gray-300 py-2 px-4 bg-gray-200 rounded-lg border-1 border-gray-300 drop-shadow-lg">
            {{ cim }}
        </Button>
    </RouterLink>

    <Button v-else class="hover:bg-gray-300 py-2 px-4 bg-gray-200 rounded-lg border-1 border-gray-300 drop-shadow-lg">
        {{ cim }}
    </Button>

</template>
