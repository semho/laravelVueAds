<template>
  <div class="row">
    <div class="col-md-4" v-for="card in cards" >
      <router-link :to="'/card/' + card.id">
        <div class="card" :id="card.id">
          <div class="image-container">
            <img class="img-fluid rounded thumbnail-image" :src="card.photo" alt="Фото">
          </div>
          <div class="product-detail-container p-2">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="dress-name">{{ card.name }}</h5>
              <div class="d-flex flex-column mb-2">
                <small class="old-price text-right">{{ card.price }} руб</small>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="desc">{{ card.description }}</div>
            </div>
          </div>
        </div>
      </router-link>
    </div>

  </div>
</template>

<script>
export default {
  props: ['cards'],
  name: "Card"
}
</script>

<style scoped>

</style>
