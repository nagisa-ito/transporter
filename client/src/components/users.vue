<template>
  <div>
    <h1>ユーザー一覧</h1>
    <div v-show="loading">
      <scaling-squares-spinner :animation-duration="1250" :size="40" :color="'#9c9c9c'" />
    </div>
    <ul v-show="!loading">
      <li v-for="user in users" :key="user.id">
      {{user.last_name}}
      </li>
    </ul>
  </div>
</template>

<script>
// look at (https://epic-spinners.epicmax.co/#/get-started)
import {ScalingSquaresSpinner} from 'epic-spinners'
export default {
  name: 'Users',
  data () {
    return {
      users: [],
      loading: true
    }
  },
  components: { ScalingSquaresSpinner },
  mounted () {
    this.Axios.get('http://localhost:3000/api/users')
      .then((res) => {
        this.users = res.data
        this.loading = false
      })
  }
}
</script>

<style>
</style>
