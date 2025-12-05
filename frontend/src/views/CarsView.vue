<script setup>
import { ref, onMounted } from "vue";
import api from "../api.js";
import CarDetails from "@/components/CarDetails.vue";
import Gomb from "@/components/Gomb.vue";

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
  <div class="text-xl my-5" style="text-align: center;" v-if="message">
    <p>{{ message }}</p><br>
    <RouterLink to="/login">
      <Gomb cim="Bejelentkezés"
        class="font-medium transform ease-out duration-700 motion-safe:hover:scale-120 bg-gray-500 drop-shadow-sm rounded-md px-4 text-white">
      </Gomb>
    </RouterLink>
  </div>
  <div v-else>
    <div style="text-align: center; font-size: 30px;font-weight: 600;" class="my-4">
      <h1 class="">Saját kocsik</h1>
    </div>

    <div class="flex flex-col">

      <div v-for="car in cars" :key="car.id">
        <CarDetails :car="car"></CarDetails>
      </div>
    </div>


  </div>

</template>
