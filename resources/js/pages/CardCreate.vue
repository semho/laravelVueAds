<template>
  <div>
    <router-link to="/">Вернуться к списку</router-link>
    <h1>
      Создание объявления
    </h1>
    <form id="formCreate">
      <div class="form-row">
        <p v-if="errors.length">
          <b>Пожалуйста исправьте указанные ошибки:</b>
          <ul>
            <li v-for="error in errors">{{ error }}</li>
          </ul>
        <p>

        <div class="form-group col-md-8">
          <label for="inputName">Название объявления</label>
          <input v-model="name" name="name" type="text" class="form-control" id="inputName" aria-describedby="name" placeholder="Введите название объявления">
          <small id="nameHelp" class="form-text text-muted">Название не должно быть пустым и не более 200 символов</small>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPrice">Цена</label>
          <input v-model="price" name="price" type="text" class="form-control" id="inputPrice" aria-describedby="price" placeholder="Введите цену товара">
          <small id="priceHelp" class="form-text text-muted">Цена не может быть пустой</small>
        </div>
      </div>
      <div class="form-group">
        <input type="file" ref="files" id="files" hidden="" multiple v-on:change="handleFileUploads()">
        <label for="files" class="btn btn-success" >Загрузить фото</label>
        <small id="fileHelp" class="form-text text-muted">Не более трех файлов</small>
      </div>

      <div class="form-group">
        <label class="small mb-1" for="description">Подробности объявления</label>
        <textarea v-model="description" class="form-control mb-3" name="description" id="description"></textarea>
        <small id="descriptionHelp" class="form-text text-muted">Описание не больше 1000 символов</small>
      </div>
      <button class="btn btn-primary" v-on:click="submitFiles()" onclick="return false">Создать</button>
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
        //если есть приходит ответ
        if (res.status == 200) {
          //если в ответе ошибка
          if (res.data.error) {
            const div = document.createElement('div');
            div.classList.add('alert-server');
            div.innerText = res.data.error;
            //показываем пользователю
            document.getElementById('formCreate').append(div);
          } else {
            //если ошибка была, удаляем ее
            const findError = document.querySelectorAll('.alert-server');
            if (findError) {
              findError.forEach(el => el.remove());
            }
            console.log(res.data.last_insert_id);
            window.location.href = "/";
          }
        } else {
          console.log('FAILURE!!');
        }
      })
      .catch(function(){
        console.log('FAILURE!!');
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
      if (!this.description) {
        this.errors.push('Требуется заполнить описание.');
      } else if (this.description.length > 1000) {
        this.errors.push('Описание не может быть длинее 1000 символов.');
      }
      if (!this.files.length) {
        this.errors.push('Загрузите фото.');
      } else if (this.files.length > 3) {
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
