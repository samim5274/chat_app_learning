<script setup>
import { onMounted } from "vue";
import { echo } from "./echo";

onMounted(() => {
  console.log("👂 Listening started");

  echo.channel("chat")
    .listen(".message.sent", (e) => {
      console.log("✅ Real-time received:", e.message);
    });
});

onMounted(() => {
  echo.connector.pusher.connection.bind("connected", () => {
    console.log("✅ WS Connected");
  });

  echo.connector.pusher.connection.bind("error", (err) => {
    console.log("❌ WS Error", err);
  });
})

</script>

<template>
  <div>Listening...</div>
</template>
