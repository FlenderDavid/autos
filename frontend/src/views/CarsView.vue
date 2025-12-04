<script setup>
import { ref, onMounted } from "vue";
import api from "../api.js";

const cars = ref([]);
const message = ref("");

onMounted(async () => {
  try {
    const token = localStorage.getItem("token");
    if (!token) {
      message.value = "Nem vagy bejelentkezve!";
      return;
    }

    const res = await api.get("/cars", {
      headers: { Authorization: `Bearer ${token}` },
    });

    cars.value = res.data;
  } catch (err) {
    message.value = err.response?.data?.message || "Hiba!";
  }
});
</script>

<template>
  <div>
    <h1>Saját kocsik</h1>
    <p v-if="message">{{ message }}</p>
    <ul>
      <li v-for="car in cars" :key="car.id">
        {{ car.brand }} – {{ car.model }}
      </li>
    </ul>
  </div>
  
</template>
