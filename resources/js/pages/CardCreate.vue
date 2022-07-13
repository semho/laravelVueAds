<template>
  <div class="app__create-ad create-ad">
    <router-link to="/" class="create-add__back">Вернуться к списку</router-link>
    <h1 class="create-add__title">
      Создание объявления
    </h1>
    <form id="formCreate" class="create-add__form">
      <div class="create-add__form-row form-row">
        <p class="create-add__wrap-error" v-if="errors.length">
          <b class="create-add__title-error">Пожалуйста исправьте указанные ошибки:</b>
          <ul class="create-add__list-error">
            <li class="create-add__item-error" v-for="error in errors">{{ error }}</li>
          </ul>
        <p>

        <div class="create-add__form-group form-group col-md-8">
          <label class="create-add__label-input" for="inputName">Название объявления</label>
          <input v-model="name" name="name" type="text" class="create-add__input form-control" id="inputName" aria-describedby="name" placeholder="Введите название объявления">
          <small id="nameHelp" class="create-add__help form-text text-muted">Название не должно быть пустым и не более 200 символов</small>
        </div>
        <div class="create-add__form-group form-group col-md-4">
          <label class="create-add__label-input" for="inputPrice">Цена</label>
          <input v-model="price" name="price" type="text" class="create-add__input form-control" id="inputPrice" aria-describedby="price" placeholder="Введите цену товара">
          <small id="priceHelp" class="create-add__help form-text text-muted">Цена не может быть пустой</small>
        </div>
      </div>
      <div class="create-add__form-group form-group">
        <input type="file" ref="files" id="files" hidden="" multiple v-on:change="handleFileUploads()">
        <label for="files" class="create-add__label-file btn btn-success" >Загрузить фото</label>
        <small id="fileHelp" class="create-add__help form-text text-muted">Не более трех файлов</small>
      </div>

      <div class="create-add__form-group form-group">
        <label class="create-add__label-textarea small mb-1" for="description">Подробности объявления</label>
        <textarea v-model="description" class="create-add__textarea form-control mb-3" name="description" id="description"></textarea>
        <small id="descriptionHelp" class="create-add__help form-text text-muted">Описание не больше 1000 символов</small>
      </div>
      <button class="create-add__submit btn btn-primary" v-on:click="submitFiles()" onclick="return false">Создать</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "CardCreate",
  data() {
    return {
      files: '',
      errors: [],
      name: '',
      price: '',
      description: ''
    }
  },
  methods: {
    submitFiles() {
      //проверяем поля ввода
      this.validateFields();
      if (this.errors.length > 0) {
        return;
      }

      //формируем объект formdata
      let formData = new FormData();
      for( let i = 0; i < this.files.length; i++ ){
        let file = this.files[i];
        formData.append('files[' + i + ']', file);
      }
      formData.append('name', this.name);
      formData.append('description', this.description);
      formData.append('price', this.price);

      axios.post( '/card/create',
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
      ).then(function(res) {
        //если ошибка была, удаляем ее
        const findError = document.querySelectorAll('.alert-server');
        if (findError) {
          findError.forEach(el => el.remove());
        }
        console.log(res.data.last_insert_id);
        window.location.href = "/";
      })
      .catch(function(error){
        console.log('FAILURE!!: ' + error);
        //если ошибка
        if (error) {
          const div = document.createElement('div');
          div.classList.add('alert-server');
          div.innerText = 'Данные не корректны';
          //показываем пользователю
          document.getElementById('formCreate').append(div);
        }
      });
      this.files = [];
    },
    handleFileUploads() {
      this.files = this.$refs.files.files;
    },
    validateFields() {
      this.errors = [];
      if (!this.name) {
        this.errors.push('Требуется указать название.');
      } else if (this.name.length > 20) {
        this.errors.push('Название должно быть не более 200 символов.');
      }
      if (!this.price) {
        this.errors.push('Требуется указать цену товара.');
      }
      if (!Number.isInteger(Number(this.price))) {
        this.errors.push('Цена должны быть числом.');
      }
      if (!this.description) {
        this.errors.push('Требуется заполнить описание.');
      } else if (this.description.length > 1000) {
        this.errors.push('Описание не может быть длинее 1000 символов.');
      }
      if (this.files.length > 3) {
        this.errors.push('Загрузить можно не более 3 файлов.');
      }
    }
  }

}
</script>

<style scoped>
input[type="file"]{
  position: absolute;
  top: -500px;
}
div.file-listing{
  width: 200px;
}
span.remove-file{
  color: red;
  cursor: pointer;
  float: right;
}
</style>
