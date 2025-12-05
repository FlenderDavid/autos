<script setup>
import { RouterView } from "vue-router";
import { useRouter } from "vue-router";
import { ref, onMounted, watch, provide } from "vue";
import api from "./api";
import Navbar from "./components/Navbar.vue";

const router = useRouter();

const name = ref("");
const isLoggedIn = ref(false);

provide("logout", logout);
provide("isLoggedIn", isLoggedIn);
provide("name", name);


onMounted(() => {
  isLoggedIn.value = !!localStorage.getItem("token");
});

watch(isLoggedIn, async (val) => {
  if (val) {
    const token = localStorage.getItem("token");
    const result = await api.get("/user", {
      headers: { Authorization: `Bearer ${token}` },
    });
    name.value = result.data.name;
  }
});

window.addEventListener("login", () => {
  isLoggedIn.value = true;
});


async function logout() {
  try {
    const token = localStorage.getItem("token");
    if (token) {
      await api.post("/logout", {}, {
        headers: { Authorization: `Bearer ${token}` },
      });
    }

    localStorage.removeItem("token");
    isLoggedIn.value = false;
    router.push("/login");
  } catch (err) {
    console.error("Logout hiba:", err);
  }
}
</script>

<template>
  <Navbar />
  <RouterView />
</template>
