import { createWebHistory, createRouter } from "vue-router";
import Home from "../component/Home.vue";
import Sell from "../component/Sell.vue";
import Buy from "../component/Buy.vue";
import Auction from "../component/Auction.vue";
import Traders from "../component/Traders.vue";

const AppName = "StockifyTrade";
const ServerUrl = "http://localhost:8000/";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    props: {
      AppName: AppName
    }
  },
  {
    path: "/sell",
    name: "Sell",
    component: Sell,
    props: {
      AppName: AppName,
      ServerUrl:ServerUrl
    }
  },
  {
    path: "/buy",
    name: "Buy",
    component: Buy,
    props: {
      AppName: AppName
    }
  },
  {
    path: "/buy",
    name: "Buy",
    component: Buy,
    props: {
      AppName: AppName
    }
  },
  {
    path: "/auction",
    name: "Auction",
    component: Auction,
    props: {
      AppName: AppName
    }
  }
  ,
  {
    path: "/traders",
    name: "Traders",
    component: Traders,
    props: {
      AppName: AppName
    }
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;