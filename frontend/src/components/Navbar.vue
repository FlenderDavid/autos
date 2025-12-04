<script setup>
import { inject } from 'vue'

const name = inject('name')
</script>

<template>
    <nav class="bg-gray-300 p-3 text-center">
        <div class="flex ">
            <div class="w-5/6 flex gap-5 justify-center">
                <RouterLink to="/cars"><button
                        class="font-medium transform ease-out duration-700 motion-safe:hover:scale-110 bg-gray-400 drop-shadow-sm rounded-md px-4 text-white">Autók</button>
                </RouterLink>
                <RouterLink to="/register"><button
                        class="font-medium transform ease-out duration-700 motion-safe:hover:scale-110 bg-gray-400 drop-shadow-sm rounded-md px-4 text-white">Regisztráció</button>
                </RouterLink>
                <RouterLink to="/login"><button
                        class=" font-medium transform ease-out duration-700 motion-safe:hover:scale-110 bg-gray-400 drop-shadow-sm rounded-md px-4 text-white">Bejelentkezés</button>
                </RouterLink>
            </div>
            <div class="w-1/6 flex"><p class="px-3">Üdv, {{ name }}</p><button
                    class="max-h-8 font-medium ease-out duration-700 transform motion-safe:hover:scale-110 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white"
                    @click="logout">Kijelentkezés</button>
                </div>
        </div>

    </nav>
</template>
