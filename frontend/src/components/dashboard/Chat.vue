<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
import api from "../../services/api";
import { echo } from "../../echo";

const text = ref("");
const message = ref([]);
let channel = null;

async function sendMsg() {
  if (!text.value.trim()) return;

  try{
    await api.post("/send", {
      message: text.value,
    });

    text.value = "";
  } catch (err){
    console.error("Send failed:", err);
    alert(err?.response?.data?.message || "Send failed (check backend/API URL)");
  }
}

onMounted(() => {
  channel = echo.channel("chat");
  channel.listen(".message.sent", (e) => {
    message.value.push(e.message);
  });
});

onBeforeUnmount(() => {
  if (channel) {
    channel.stopListening(".message.sent");
    echo.leave("chat");
  }
});
</script>

<template>
  <div style="max-width:500px;margin:auto;padding:20px">

    <h2>Real-Time Chat</h2>

    <!-- Message List -->
    <div style="border:1px solid #ccc;height:300px;overflow:auto;padding:10px;margin-bottom:10px">
      <div v-for="(msg,index) in message" :key="index" style="margin-bottom:5px">
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
