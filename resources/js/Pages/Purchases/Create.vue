<script setup>
import { getToday } from '@/commom';
import { onMounted, reactive } from 'vue';

const props = defineProps({ 'customers': Array })

onMounted(() => { //ページ読み込み後 即座に実行
  form.date = getToday()
})

const form = reactive({
  date: null,
  customer_id: null
 })

</script>

<template>
  日付<br>
  <input type="date" name="date" v-model="form.date"><br>
  会員名<br>
  <select name="customer" v-model="form.customer_id">
    <option v-for="customer in customers" :value="customer_id" :key="customer.id">
      {{ customer.id }} : {{ customer.name }}
    </option>
  </select>
</template>
