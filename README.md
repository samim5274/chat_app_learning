💬 Real-Time Chat Application

A real-time chat application built with Laravel 11, Vue 3, Vite, Laravel Reverb (WebSocket), and MySQL.

This project demonstrates authentication, private messaging, real-time broadcasting, and modern frontend architecture.

🚀 Features

🔐 User Authentication (Login / Register)

👥 User List

💬 One-to-One Private Chat

⚡ Real-Time Messaging (WebSocket)

🟢 Online Status (Presence Channel)

🔒 Protected Routes (JWT / Sanctum)

🎨 Modern UI (Vue 3 + Tailwind CSS)

🛠 Tech Stack
🔹 Backend

Laravel 11

Laravel Reverb (WebSocket Server)

MySQL

Sanctum Authentication

🔹 Frontend

Vue.js 3

Vite

Tailwind CSS

Axios

📂 Project Structure
ChatApp/
│
├── backend/   → Laravel API + Broadcasting
├── frontend/  → Vue 3 SPA
└── README.md

⚙️ Installation Guide
🔹 1️⃣ Backend Setup (Laravel)
cd backend
composer install
cp .env.example .env
php artisan key:generate

🔹 Configure Database (.env)
DB_DATABASE=chat_app
DB_USERNAME=root
DB_PASSWORD=your_password

🔹 Run Migration
php artisan migrate

🔹 Install Sanctum
php artisan install:api

🔹 2️⃣ Setup Laravel Reverb (WebSocket)
Add in .env
REVERB_APP_ID=your_id
REVERB_APP_KEY=your_key
REVERB_APP_SECRET=your_secret

Run Reverb Server
php artisan reverb:start

Run Laravel Server
php artisan serve

🔹 3️⃣ Frontend Setup (Vue)
cd frontend
npm install

Create .env inside frontend
VITE_API_BASE_URL=http://localhost:8000/api
VITE_REVERB_KEY=your_key
VITE_REVERB_HOST=127.0.0.1
VITE_REVERB_PORT=8080

Run Frontend
npm run dev


Frontend runs at:

http://localhost:5173

🔌 Real-Time Flow

User sends message

Laravel Event triggers

Reverb broadcasts event

Vue listens via Echo

Message updates instantly

📡 Broadcasting Example
Event
class MessageSent implements ShouldBroadcastNow
{
    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'message.sent';
    }
}

🔐 API Routes
Method	Endpoint	Description
POST	/login	User login
POST	/register	User register
GET	/chat/users	Get users
POST	/chat/send	Send message
🧠 Learning Purpose

This project is built for:

Understanding Laravel Broadcasting

Learning WebSocket Implementation

Vue + Laravel Fullstack Architecture

Real-time Application Development

📦 Future Improvements

✅ Group Chat

✅ File Sharing

✅ Typing Indicator

✅ Message Seen Status

✅ Notification System

👨‍💻 Author

Samim Hossain
Full Stack Developer (Laravel + Vue)

📄 License

This project is open-source and available under the MIT License.
