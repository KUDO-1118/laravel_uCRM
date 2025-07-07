<script setup>
import { getToday } from '@/commom';
import { onMounted, reactive } from 'vue';

onMounted(() => { //ページ読み込み後 即座に実行
  form.date = getToday()
})

const form = reactive({ date: null })
</script>

<template>
  日付<br>
  <input type="date" name="date" v-model="form.date">
</template>
