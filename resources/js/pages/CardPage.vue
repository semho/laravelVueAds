<template>
  <div>
    <h1>
      Объявление: {{ card.name }}
    </h1>
    <img :src="card.photo" alt="Первое фото">
    <p> {{ card.description }}</p>
    <p> {{ card.price }} руб.</p>
  </div>
</template>

<script>
export default {
  name: "CardPage",
  data() {
    return {
      card: {},
    }
  },
  mounted() {
    axios.get('/card/' + this.$route.params.id).then(res => {
      this.card = res.data;
    });
    this.cardId = this.$route.params.id;
  },
}
</script>

<style scoped>

</style>
