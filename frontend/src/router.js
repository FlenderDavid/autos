import { createRouter, createWebHistory } from "vue-router";
import CarsView from "./views/CarsView.vue";
import RegisterView from "./views/RegisterView.vue";
import LoginView from "./views/LoginView.vue";

const routes = [
  { path: "/cars", name: "cars", component: CarsView },
  { path: "/register", name: "register", component: RegisterView },
  { path: "/login", name: "login", component: LoginView },
  {
    path: '/cars/:id/service/create',
    name: 'service.create',
    component: () => import('./views/CreateServiceView.vue'),
    props: true
  },
  {
    path: "/cars/:id/services",
    name: "car-services",
    component: () => import("./views/CarServices.vue"),
  },
  {
  path: "/cars/new",
  name: "create-car",
  component: () => import("./views/CreateCarView.vue")
}




];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
