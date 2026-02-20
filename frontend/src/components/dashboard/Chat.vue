<script setup>
import { onMounted, ref } from "vue";
import api from "../../services/api";
import { getEcho, refreshEcho } from "../../echo";

const users = ref([]);
const activeUser = ref(null);

const conversationId = ref(null);
const messages = ref([]);
const body = ref("");

let channel = null;
let currentId = null;

async function fetchUsers() {
  try {
    const res = await api.get("/chat/users");
    users.value = res.data.data || [];
  } catch (err) {
    console.log("fetchUsers error:", err?.response?.status, err?.response?.data || err);
  }
}

async function openChat(user) {
  activeUser.value = user;

  const c = await api.post("/chat/conversations/private", { user_id: user.id });
  conversationId.value = c.data.data.id;

  const m = await api.get(`/chat/conversations/${conversationId.value}/messages`);
  messages.value = m.data.data;

  startListening(conversationId.value);
}

function startListening(id) {
  const token = localStorage.getItem("token");
  refreshEcho(token);
  const echo = getEcho();
  // leave previous conversation channel
  if (channel && currentId) {
    channel.stopListening(".message.sent");
    echo.leave(`conversation.${currentId}`);
  }

  currentId = id;

  channel = echo
    .private(`conversation.${id}`)
    .listen(".message.sent", (e) => {
      if (messages.value.some((x) => x.id === e.message.id)) return;
      console.log("📩 realtime:", e);
      messages.value.push(e.message);
    });
}

async function sendMessage() {
  if (!conversationId.value || !body.value.trim()) return;

  const res = await api.post(
    `/chat/conversations/${conversationId.value}/messages`,
    { body: body.value }
  );

  messages.value.push(res.data.data);
  body.value = "";
}

onMounted(fetchUsers);

</script>
<template>
  <div class="grid grid-cols-12 h-screen">
    <!-- Left: user list -->
    <div class="col-span-4 border-r p-4 overflow-y-auto">
      <h2 class="font-bold mb-3">Users</h2>
      <div
        v-for="u in users"
        :key="u.id"
        class="p-3 rounded cursor-pointer hover:bg-gray-100"
        @click="openChat(u)"
      >
        <div class="font-semibold">{{ u.name }}</div>
        <div class="text-xs text-gray-500">{{ u.email }}</div>
      </div>
    </div>

    <!-- Right: chat -->
    <div class="col-span-8 flex flex-col">
      <div class="border-b p-4 font-bold">
        {{ activeUser ? activeUser.name : "Select a user" }}
      </div>

      <div class="flex-1 p-4 overflow-y-auto space-y-2">
        <div v-for="(m, i) in messages" :key="i" class="p-2 rounded bg-gray-100">
          <div class="text-xs text-gray-600">{{ m.sender?.name }}</div>
          <div>{{ m.body }}</div>
        </div>
      </div>

      <div class="border-t p-4 flex gap-2">
        <input
          v-model="body"
          class="border rounded w-full p-2"
          placeholder="Type message..."
          @keyup.enter="sendMessage"
        />
        <button class="bg-blue-600 text-white px-4 rounded" @click="sendMessage">
          Send
        </button>
      </div>
    </div>
  </div>
</template>