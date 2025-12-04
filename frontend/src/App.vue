<script setup>
import { RouterView, RouterLink } from "vue-router";
import { useRouter } from "vue-router";
import { ref, onMounted } from "vue";
import api from "./api"; 

const router = useRouter();
const isLoggedIn = ref(false);

onMounted(() => {
  isLoggedIn.value = !!localStorage.getItem("token");
});

window.addEventListener("login", () => {
  isLoggedIn.value = true;
});

const logout = async () => {
  try {
    const token = localStorage.getItem("token");
    if (token) {
      await api.post("/logout", {}, {
        headers: { Authorization: `Bearer ${token}` }
      });
    }

    localStorage.removeItem("token");
    isLoggedIn.value = false;
    router.push("/login");
  } catch (err) {
    console.error("Logout hiba:", err);
  }
};  
</script>

<template>
  <nav>
    <RouterLink to="/cars">Home</RouterLink> |
    <RouterLink to="/register">Register</RouterLink> |
    <RouterLink to="/login">Login</RouterLink>
    <button v-if="isLoggedIn" @click="logout">Logout</button>
  </nav>
  <main>
    <RouterView />
  </main>
</template>
