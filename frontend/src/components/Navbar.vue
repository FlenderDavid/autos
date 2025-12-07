<script setup>
import { inject } from 'vue'

const logout = inject("logout");
const isLoggedIn = inject("isLoggedIn");
const name = inject('name')
</script>

<template>
    <nav class="bg-gray-400 p-3 text-center">
        <div class="flex ">
            <div class="w-5/6 flex gap-10 justify-center">
                

                <RouterLink v-if="isLoggedIn" to="/cars/new"><button
                        class="w-50 font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">Új autó</button>
                </RouterLink>

                <RouterLink v-if="isLoggedIn" to="/cars"><button
                        class="w-40 font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">Autók</button>
                </RouterLink>

                <RouterLink v-if="isLoggedIn" to="/cars/${car.id}/services"><button
                        class="w-60 font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">Legutóbbi
                        szervízek</button>
                </RouterLink>

                <RouterLink v-if="!isLoggedIn" to="/register"><button
                        class=" w-40 font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">Regisztráció</button>
                </RouterLink>
                <RouterLink v-if="!isLoggedIn" to="/login"><button
                        class="w-40 font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">Bejelentkezés</button>
                </RouterLink>
            </div>
            <div v-if="isLoggedIn" class="w-1/6 flex">
                <p class="px-3">Üdv, {{ name }}</p><button
                    class="max-h-8 font-medium ease-out duration-700 transform motion-safe:hover:scale-110 bg-red-500 drop-shadow-sm rounded-md px-4 text-white"
                    @click="logout">Kijelentkezés</button>
            </div>
        </div>

    </nav>
</template>
