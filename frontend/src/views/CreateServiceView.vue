<script setup>
import { ref } from 'vue'
import api from "../api";
import { useRoute, useRouter } from 'vue-router'
import Gomb from "@/components/Gomb.vue";

const route = useRoute();
const router = useRouter();

const car_id = route.params.id;

const type = ref("");
const mileage = ref("");
const price = ref("");
const comment = ref("");

const error = ref("");
const success = ref("");

const submit = async () => {
  try {
    const token = localStorage.getItem("token");

    await api.post(
      "/services",
      {
        car_id: car_id,
        type: type.value,
        mileage: mileage.value,
        price: price.value,
        comment: comment.value,
      },
      {
        headers: { Authorization: `Bearer ${token}` },
      }
    );

    success.value = "Szervíz sikeresen elmentve!";
    router.push("/cars");
  } catch (e) {
    error.value = "Hiba történt!";
  }
};
</script>

<template>
  <div style="text-align: center;">
    <div
      class="drop-shadow-lg bg-white mx-[300px] my-[30px] capitalize p-3 border-1 border-l-8 border-green-300 rounded-md">

      <div style="text-align: center; font-size: 30px; font-weight: 600;" class="my-4">
        <h1>Új szervíz hozzáadása</h1>
      </div>

      <form @submit.prevent="submit">

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="type"
          placeholder="Szervíz típusa" required />

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="mileage" type="number"
          placeholder="Kilométeróra állás" required />

        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="price" type="number"
          placeholder="Ár" required />

        <textarea class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3 w-full" v-model="comment"
          placeholder="Megjegyzés (opcionális)">
        </textarea>

        <Gomb type="submit" class="my-4" cim="Mentés" />

      </form>

      <p v-if="error" class="text-red-500 mt-2">{{ error }}</p>
      <p v-if="success" class="text-green-600 mt-2">{{ success }}</p>

    </div>
  </div>
</template>
