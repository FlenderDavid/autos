<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../api.js";

const name = ref("");
const password = ref("");
const message = ref("");
const router = useRouter();

const login = async () => {
  try {
    const res = await api.post("/login", { name: name.value, password: password.value });
    const token = res.data.access_token;

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
  <h1>Login</h1>
  <form @submit.prevent="login">
    <input v-model="name" placeholder="Név" required />
    <input v-model="password" type="password" placeholder="Jelszó" required />
    <button type="submit">Login</button>
  </form>
  <p>{{ message }}</p>
</template>
