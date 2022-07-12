<template>
    <div>
      <router-link :to="'/card_create'">Создать объявление</router-link>
      <h1>
        {{ title }}
      </h1>
      <div class="row">
        <div class="col-md-6" v-for="item in pageOfItems" >
          <router-link :to="'/list/' + item.id">
            <div class="card" :id="item.id">
              <div class="image-container">
                <img class="img-fluid rounded thumbnail-image" :src="item.photo[0]" alt="Фото">
              </div>
              <div class="product-detail-container p-2">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="dress-name">{{ item.name }}</h5>
                  <div class="d-flex flex-column mb-2">
                    <small class="old-price text-right">{{ item.price }} руб</small>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="desc">{{ item.description }}</div>
                </div>
              </div>
            </div>
          </router-link>
        </div>

      </div>

      <div class="card-footer pb-0 pt-3">
        <jw-pagination :items="cards" @changePage="onChangePage"></jw-pagination>
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
      pageOfItems: [],
    }
  },
  mounted() {
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
    onChangePage(pageOfItems) {
      this.pageOfItems = pageOfItems;
    }
  }
}
</script>

<style scoped>

</style>
