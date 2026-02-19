import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

export const echo = new Echo({
  broadcaster: "reverb",
  key: "app-key",              // Laravel .env এর REVERB_APP_KEY এর সাথে match
  wsHost: "127.0.0.1",
  wsPort: 8080,                // Laravel .env এর REVERB_PORT এর সাথে match
  forceTLS: false,
  enabledTransports: ["ws"],
  disableStats: true,
});
