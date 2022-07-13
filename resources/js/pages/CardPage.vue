<template>
  <div class="app__card-detail card-detail">
    <router-link to="/" class="card-detail__back">Вернуться к списку</router-link>
    <h1 class="card-detail__title">
      Объявление: {{ card.name }}
    </h1>
    <div class="card-detail__container-first-img first-img row">
      <img class="card-detail-first-img col-md-6" :src="card.photo" alt="Первое фото">
    </div>
    <div class="card-detail__container-other other-img row"  v-if="otherPhoto !== null">
      <img class="card-detail__other col-md-6" v-if="otherPhoto.photo_1" :src="otherPhoto.photo_1" alt="Второе фото">
      <img class="card-detail__other col-md-6" v-if="otherPhoto.photo_2" :src="otherPhoto.photo_2" alt="Третье фото">
    </div>
    <p class="card-detail__description"> {{ card.description }}</p>
    <p class="card-detail__price"> {{ card.price }} руб.</p>
  </div>
</template>

<script>
export default {
  name: "CardPage",
  data() {
    return {
      card: {},
      otherPhoto: null
    }
  },
  mounted() {
    axios.get('/card/' + this.$route.params.id).then(res => {
      const card = res.data;
      const objPhotos = {}
      //массив с фото
      const arrPhotos = card.photo.replace(/;\s*$/, "").split(';');

      for (let i = 0; i < arrPhotos.length; i++) {
        //перекладываем в объект
          objPhotos[`photo_${i}`] = arrPhotos[i];
      }
      //назначаем главное фото
      card['photo'] = objPhotos.photo_0;
      //если есть еще добовляем в другой объект
      if (arrPhotos.length > 1) {
        delete objPhotos[Object.keys(objPhotos)[0]]
        this.otherPhoto = objPhotos;
      }
      this.card = card;
    });
    this.cardId = this.$route.params.id;
  },
}
</script>

<style scoped>

</style>
