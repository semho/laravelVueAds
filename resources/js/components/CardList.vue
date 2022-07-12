<template>
    <div>
      <router-link :to="'/card_create'">Создать объявление</router-link>
      <h1>
        {{ title }}
      </h1>
      <list :cards="cards"></list>
    </div>
</template>

<script>
import Cards from './Card.vue'

export default {
  name: "CardList",
  components: {
    list: Cards,
  },
  data() {
    return {
      title: 'Список объявлений',
      cards: [],
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
}
</script>

<style scoped>

</style>
