<script setup>
import { ref } from 'vue'
import api from "../api";
import { useRouter } from 'vue-router'
import Gomb from "@/components/Gomb.vue";

const router = useRouter()

const number_plate = ref("");
const brand = ref("");
const model = ref("");

const error = ref("");
const success = ref("");

const submit = async () => {
  try {
    const token = localStorage.getItem("token");

    await api.post(
      "/cars",
      {
        number_plate: number_plate.value || null,
        brand: brand.value,
        model: model.value,
      },
      {
        headers: { Authorization: `Bearer ${token}` },
      }
    );

    success.value = "Autó sikeresen hozzáadva!";
    router.push("/cars");
  } catch (e) {
    error.value = "Hiba történt az autó mentésekor!";
    console.error(e);
  }
};
</script>

<template>
  <div style="text-align: center;">
    <div
      class="drop-shadow-lg bg-white mx-[300px] my-[30px] capitalize p-3 border-1 border-l-8 border-green-300 rounded-md">

      <div style="text-align: center; font-size: 30px; font-weight: 600;" class="my-4">
        <h1>Új autó hozzáadása</h1>
      </div>

      <form @submit.prevent="submit">

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="brand"
          placeholder="Márka" required />

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="model"
          placeholder="Modell" required />

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="number_plate"
          placeholder="Rendszám (opcionális)" />

        <Gomb type="submit" class="my-4" cim="Mentés" />

      </form>

      <p v-if="error" class="text-red-500 mt-2">{{ error }}</p>
      <p v-if="success" class="text-green-600 mt-2">{{ success }}</p>

    </div>
  </div>
</template>
