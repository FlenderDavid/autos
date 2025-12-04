<script setup>
import { RouterView, RouterLink } from "vue-router";
import { useRouter } from "vue-router";
import { ref, onMounted, watch } from "vue";
import api from "./api"; 
import Navbar from "./components/Navbar.vue";
import { provide } from 'vue'

const name = ref(false);
provide('name',name)
const router = useRouter();
const isLoggedIn = ref(false);

onMounted(() => {
  isLoggedIn.value = !!localStorage.getItem("token");
});

watch(async () =>{
  if(isLoggedIn){
    const token = localStorage.getItem("token");
    const result = await api.get("/user", {
      headers: { Authorization: `Bearer ${token}` },
    });
    console.log(result);
    name.value=result.data.name;
  }
})

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
  <Navbar ></Navbar>
  <nav>
    
  </nav>
  <main>
    <RouterView />
  </main>
</template>
