import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Pusher = Pusher;

let echo = null;

function buildEcho(token) {
    const API_ROOT = (import.meta.env.VITE_API_BASE_URL || "http://127.0.0.1:8000/api")
        .replace(/\/api\/?$/, "");

    return new Echo({
        broadcaster: "reverb",
        key: import.meta.env.VITE_REVERB_APP_KEY,
        wsHost: import.meta.env.VITE_REVERB_HOST || "127.0.0.1",
        wsPort: Number(import.meta.env.VITE_REVERB_PORT || 8080),
        wssPort: Number(import.meta.env.VITE_REVERB_PORT || 8080),
        forceTLS: false,
        enabledTransports: ["ws", "wss"],

        authEndpoint: `${API_ROOT}/broadcasting/auth`,
        auth: {
        headers: {
            Accept: "application/json",
            ...(token ? { Authorization: `Bearer ${token}` } : {}),
        },
        },
    });
}

export function getEcho() {
  if (!echo) {
    echo = buildEcho(localStorage.getItem("token"));
  }
  return echo;
}

// call this after login (or whenever token updated)
export function refreshEcho(token) {
  if (echo) {
    try { echo.disconnect(); } catch (e) {}
  }
  echo = buildEcho(token);
  return echo;
}
