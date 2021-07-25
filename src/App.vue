<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <HelloWorld msg="Welcome to Your Vue.js App"/> -->
<div id="watch-example">
  <p>
    Ask a yes/no question:
    <input v-model="question" />
  </p>
  <p>{{ answer }}</p>
  <p>
    <input v-model="search"/>
  </p>
  <p> {{ searchTerm  }} </p>
</div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue'
import axios from 'axios'
import _ from 'lodash'
export default {
     name: 'App',
     components: {
    // HelloWorld
     },

     data() {
         return {
             question: '',
             answer: 'Questions usually contain a question mark. ;-)',
             search: '',
             searchTerm: '문자를 입력하세요.'
         }
     },
     watch: {
      // whenever question changes, this function will run
         question(newQuestion) {
             if (newQuestion.indexOf('?') > -1) {
                 this.getAnswer()
         }
      },
      search: function () {
          this.debounceSearch()
      }
     },
     created: function (){
      this.debounceSearch = _.debounce(this.getSearch, 500)
     },
     methods: {
         getSearch: function() {
             if(this.search.length === 0){
                 this.searchTerm = '문자를 입력하세요.'
                 return
             }
             this.searchTerm = this.search
         },
         getAnswer() {
             this.answer = 'Thinking...'
             axios
             .get('https://yesno.wtf/api')
             .then(response => {
                 this.answer = response.data.answer
             })
             .catch(error => {
                 this.answer = 'Error! Could not reach the API. ' + error
             })
         }
    }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
