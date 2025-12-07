<script setup>
import { ref } from "vue";
import api from "../api.js";
import Gomb from "@/components/Gomb.vue";

const name = ref("");
const password = ref("");
const password_confirmation = ref("");
const message = ref("");

const register = async () => {
  try {
    const res = await api.post("/register", {
      name: name.value,
      password: password.value,
      password_confirmation: password_confirmation.value,
    });
    message.value = res.data.message;
  } catch (err) {
    message.value = err.response?.data?.message || "Hiba!";
  }
};
</script>
<template>
  <div style="text-align: center;">
    <div class="drop-shadow-lg bg-white mx-[300px] my-[30px] capitalize p-3 border-1 border-l-8 border-green-300 rounded-md">
      <div style="text-align: center; font-size: 30px;font-weight: 600;" class="my-4">
        <h1 class="">Regisztráció</h1>
      </div>
      <form @submit.prevent="register">
        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3" v-model="name" placeholder="Név" required /> <br>
        <input  class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3"  v-model="password" type="password" placeholder="Jelszó" required /> <br>
        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3" v-model="password_confirmation" type="password" placeholder="Jelszó mégegyszer" required /> <br>
        <Gomb type="submit" class="my-4" cim="Regisztráció"></Gomb>
      </form>
      <p>{{ message }}</p>
    </div>

  </div>

</template>
