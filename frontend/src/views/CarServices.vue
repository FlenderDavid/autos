<script setup>
import { ref, onMounted, inject } from 'vue'
import api from '../api'

const cars = ref([])
const error = ref('')

const isLoggedIn = inject('isLoggedIn')
const token = localStorage.getItem('token')

const loadCars = async () => {
  try {
    const res = await api.get('/cars', {
      headers: { Authorization: `Bearer ${token}` }
    })
    cars.value = res.data
  } catch (e) {
    error.value = "Hiba történt az autók betöltésekor!"
    console.error(e)
  }
}

onMounted(() => {
  if (isLoggedIn.value) {
    loadCars()
  }
})
</script>

<template>
  <div class="p-10 max-w-5xl mx-auto capitalize">
    <h1 class="text-3xl mb-5">Saját autók és szervízeik</h1>

    <p v-if="error" class="text-red-600">{{ error }}</p>

    <div v-for="car in cars" :key="car.id" class="drop-shadow-lg bg-white mx-5 my-5 p-3 border-1 border-l-8 border-green-300 rounded-md">
      <div style="text-align: center;">
        <p class="text-2xl font-semibold">{{ car.brand }} {{ car.model }}</p>
      </div>

      <div class="mt-4">
        <h3 class="text-xl font-semibold mb-2">Szervízek:</h3>
        <div v-if="car.services.length">
          <div v-for="service in car.services" :key="service.id" class="bg-gray-100 p-3 rounded my-2 drop-shadow-sm">
            <p>Típus: {{ service.type }}</p>
            <p>Kilométeróra állás: {{ service.mileage }}</p>
            <p>Ár: {{ service.price }} Ft</p>
            <p>Megjegyzés: {{ service.comment || 'Nincs' }}</p>
            <p>Dátum: {{ new Date(service.created_at).toLocaleDateString() }}</p>
          </div>
        </div>
        <p v-else>Nincsenek szervízek ehhez az autóhoz.</p>
      </div>
    </div>
  </div>
</template>
