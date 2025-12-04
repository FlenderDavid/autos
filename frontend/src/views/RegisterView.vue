<script setup>
import { ref } from "vue";
import api from "../api.js";

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
  <h1>Regisztráció</h1>
  <form @submit.prevent="register">
    <input v-model="name" placeholder="Név" required />
    <input v-model="password" type="password" placeholder="Jelszó" required />
    <input v-model="password_confirmation" type="password" placeholder="Jelszó mégegyszer" required />
    <button type="submit">Regisztráció</button>
  </form>
  <p>{{ message }}</p>
</template>
