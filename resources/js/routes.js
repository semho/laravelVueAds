import CardList from "./components/CardList";
import CardPage from "./pages/CardPage";
import CardCreate from "./pages/CardCreate";

const routes = [
  { path: '/', name: 'home', component: CardList },
  { path: '/list/:id', component: CardPage },
  { path: '/card_create', component: CardCreate }
];

export default routes;
