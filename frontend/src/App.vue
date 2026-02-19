<script setup>
import { onMounted, ref } from "vue";
import { echo } from "./echo.js";

const messages = ref([]);

echo.channel("chat").listen(".message.sent", (e) => {
    messages.value.push(e.message);
});

onMounted(() => {
  console.log("👂 Listening started");

  echo.connector.pusher.connection.bind("connected", () => {
    console.log("✅ WS Connected");
  });

  echo.connector.pusher.connection.bind("error", (err) => {
    console.log("❌ WS Error", err);
  });

  echo.channel("chat")
  .listen(".message.sent", (e) => {
    console.log("📩 Received event:", e);
  });
});
</script>

<template>
  <router-view />
</template>

<style>

</style>
