import CardList from "./components/CardList";
import CardPage from "./pages/CardPage";

const routes = [
  { path: '/list', component: CardList },
  { path: '/card/:id', component: CardPage }
];

export default routes;
