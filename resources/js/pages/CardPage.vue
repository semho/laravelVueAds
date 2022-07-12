<template>
  <div>
    <router-link to="/">Вернуться к списку</router-link>
    <h1>
      Объявление: {{ card.name }}
    </h1>
    <div class="first-img row">
      <img class="col-md-6" :src="card.photo" alt="Первое фото">
    </div>
    <div class="other-img row"  v-if="otherPhoto !== null">
      <img class="col-md-6" v-if="otherPhoto.photo_1" :src="otherPhoto.photo_1" alt="Второе фото">
      <img class="col-md-6" v-if="otherPhoto.photo_2" :src="otherPhoto.photo_2" alt="Третье фото">
    </div>
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
