<template>
    <div>
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
      console.log(res);
      this.cards = res.data;
    })
  },
}
</script>

<style scoped>

</style>
