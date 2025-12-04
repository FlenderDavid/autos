import { createRouter, createWebHistory } from "vue-router";

// Importáld a view komponenseket
import CarsView from "./views/CarsView.vue";
import RegisterView from "./views/RegisterView.vue";
import LoginView from "./views/LoginView.vue";

const routes = [
  { path: "/cars", name: "cars", component: CarsView },
  { path: "/register", name: "register", component: RegisterView },
  { path: "/login", name: "login", component: LoginView },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
