<template>
    <div class="app__cards-list cards-list">
      <router-link :to="'/card_create'" class="cards-list__create-ad">Создать объявление</router-link>
      <h1 class="cards-list__title">
        {{ title }}
      </h1>
      <div class="cards-list__container-sorts row d-flex justify-content-end mb-3">
        <div class="cards-list__sorts-price col-md-6 d-flex justify-content-between">
          Сортировка по цене
          <button class="cards-list__sorts-btn btn btn-primary" @click="sortByPriceUp">Возрастание</button>
          <button class="cards-list__sorts-btn btn btn-primary" @click="sortByPriceDown">Убывание</button>
        </div>
        <div class="cards-list__sorts-date col-md-6 d-flex justify-content-between">
          Сортировка по дате
          <button class="cards-list__sorts-btn btn btn-primary" @click="sortByDateUp">Возрастание</button>
          <button class="cards-list__sorts-btn btn btn-primary" @click="sortByDateDown">Убывание</button>
        </div>
      </div>
      <div class="cards-list__row row">
        <div class="cards-list__col col-md-6" v-for="item in paginatedCards" >
          <router-link :to="'/list/' + item.id" class="cards-list__link-card">
            <div class="cards-list__card  card" :id="item.id">
              <div class="card__image-container image-container">
                <img class="card__preview img-fluid rounded thumbnail-image" :src="item.photo[0]" alt="Фото">
              </div>
              <div class="card__product-container product-detail-container p-2">
                <div class="card__detail d-flex justify-content-between align-items-center">
                  <h5 class="card__name dress-name">{{ item.name }}</h5>
                  <div class="card__container-price d-flex flex-column mb-2">
                    <small class="card__price old-price text-right">{{ item.price }} руб</small>
                  </div>
                </div>
                <div class="card__container-description d-flex justify-content-between align-items-center">
                  <div class="card__description desc">{{ item.description }}</div>
                </div>
              </div>
            </div>
          </router-link>
        </div>

      </div>
      <div class="app__pagination pagination-list">
        <div class="pagination-list__page  page" v-for="page in pages" :key="page" @click="pageClick(page)" :class="{'page__selected': page === pageNumber}">{{ page }}</div>
      </div>

    </div>
</template>

<script>
export default {
  name: "CardList",
  data() {
    return {
      title: 'Список объявлений',
      cards: [],
      cardsPerPage: 10,
      pageNumber: 1,
    }
  },
  mounted() {
    //получаем данные с сервераы
    axios.get('/list').then( res => {
      const newData = res.data.map((el) => {
        return {
          created_at: el.created_at,
          description: el.description,
          id: el.id,
          name: el.name,
          photo: el.photo.split(';').filter((ph) => {
            if (ph !== '') {
              return ph;
            }
          }),
          price: el.price,
          update_at: el.update_at,
        }
      })
      this.cards = newData;
    })
  },
  methods: {
    //пагинация
    pageClick(page) {
      this.pageNumber = page;
    },
    //сортировки
    sortByPriceUp() {
      this.cards.sort((a, b) =>  (a.price > b.price) ? 1 : -1);
    },
    sortByPriceDown() {
      this.cards.sort((a, b) =>  (b.price > a.price) ? 1 : -1);
    },
    sortByDateUp() {
      this.cards.sort((a, b) =>  (a.created_at > b.created_at) ? 1 : -1);
    },
    sortByDateDown() {
      this.cards.sort((a, b) =>  (b.created_at > a.created_at) ? 1 : -1);
    }
  },
  computed: {
    //высчитываем страницы
    pages() {
      return Math.ceil(this.cards.length / 10);
    },
    //разбиваем данные на страницы
    paginatedCards() {
      let from = (this.pageNumber - 1) * this.cardsPerPage;
      let to = from + this.cardsPerPage;
      return this.cards.slice(from, to);
    }
  }
}


</script>

<style scoped>
.pagination-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 30px;
}
.page {
  margin-right: 10px;
  padding: 8px 12px;
  background: #aeaeae;
  color: #636b6f;
}

.page:hover {
  background: #0056b3;
  color: white;
  cursor: pointer;
}

.page__selected {
  background: #0056b3;
  color: white;
  cursor: pointer;
}

.cards-list__col {
  margin-bottom: 15px;
}
</style>
