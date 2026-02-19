import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

console.log("VITE KEY:", import.meta.env.VITE_REVERB_APP_KEY);

export const echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY, // MUST NOT be undefined
    wsHost: import.meta.env.VITE_REVERB_HOST || "127.0.0.1",
    wsPort: Number(import.meta.env.VITE_REVERB_PORT || 8080),
    forceTLS: false,
    enabledTransports: ["ws"],
});
