<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../api.js";
import { inject } from "vue";
import Gomb from "@/components/Gomb.vue";

const isLoggedIn = inject("isLoggedIn");
const name = ref("");
const password = ref("");
const message = ref("");
const router = useRouter();

const login = async () => {
  try {
    const res = await api.post("/login", { name: name.value, password: password.value });
    const token = res.data.access_token;
    isLoggedIn.value = true;
    localStorage.setItem("token", token);
    window.dispatchEvent(new Event("login"));

    message.value = "Bejelentkezve!";
    router.push("/cars");
  } catch (err) {
    message.value = err.response?.data?.message || "Hiba!";
  }
};
</script>


<template>
  <div style="text-align: center;">
    <div class="drop-shadow-lg bg-white mx-[300px] my-[30px] capitalize p-3 border-1 border-l-8 border-green-300 rounded-md">
      <div style="text-align: center; font-size: 30px;font-weight: 600;" class="my-4">
        <h1 class="">Bejelentkezés</h1>
      </div>
      <form @submit.prevent="login">
        <input class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3" v-model="name" placeholder="Név" required /> <br>
        <input  class="p-3 bg-gray-200 drop-shadow-md border-1 rounded-md my-3"  v-model="password" type="password" placeholder="Jelszó" required /> <br>
        <Gomb type="submit" class="my-4" cim="Bejelentkezés"></Gomb>
      </form>
      <p>{{ message }}</p>
    </div>

  </div>


</template>
