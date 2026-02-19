<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { echo } from "../../echo";

const text = ref("");
const messages = ref([]);

async function sendMsg() {
  if (!text.value.trim()) return;

  await axios.post("http://localhost:8000/api/send", {
    message: text.value,
  });

  text.value = "";
}

onMounted(() => {
  echo.channel("chat")
    .listen(".message.sent", (e) => {
      console.log("Received:", e.message);
      messages.value.push(e.message);
    });
});
</script>

<template>
  <div style="max-width:500px;margin:auto;padding:20px">

    <h2>Real-Time Chat</h2>

    <!-- Message List -->
    <div style="border:1px solid #ccc;height:300px;overflow:auto;padding:10px;margin-bottom:10px">
      <div v-for="(msg,index) in messages" :key="index" style="margin-bottom:5px">
        {{ msg }}
      </div>
    </div>

    <!-- Input -->
    <div style="display:flex;gap:10px">
      <input 
        v-model="text"
        placeholder="Type message..."
        style="flex:1;padding:8px"
      />
      <button @click="sendMsg" style="padding:8px 15px">
        Send
      </button>
    </div>

  </div>
</template>
