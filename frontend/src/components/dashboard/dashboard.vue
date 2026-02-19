<template>
    <div class="min-h-screen bg-slate-100">
        <!-- Top Navbar (sticky) -->
        <header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between gap-3">
            <!-- Left -->
            <div class="flex items-center gap-3 min-w-0">
                <div
                class="h-10 w-10 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold shrink-0"
                >
                vC
                </div>

                <div class="min-w-0">
                <p class="text-sm font-semibold text-slate-900 truncate">
                    vChat
                </p>
                <p class="text-xs text-slate-500 truncate">
                    Manage Communication and Conversation
                </p>
                </div>
            </div>

            <!-- Search (md+) -->
            <div class="hidden md:block w-full max-w-md">
                <div class="relative">
                <input
                    type="text"
                    placeholder="Search products, orders..."
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 pl-10 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                />
                <svg
                    class="absolute left-3 top-2.5 h-5 w-5 text-slate-400"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                    d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    />
                </svg>
                </div>
            </div>

            <!-- Right (md+) -->
            <div class="hidden md:flex items-center gap-3 shrink-0">
                <div
                class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700"
                >
                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                Online
                </div>

                <button
                class="relative rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                aria-label="Notifications"
                >
                <svg class="h-5 w-5 text-slate-700" viewBox="0 0 24 24" fill="none">
                    <path
                    d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    />
                    <path
                    d="M9 17a3 3 0 006 0"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    />
                </svg>
                <span
                    class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center"
                >
                    3
                </span>
                </button>

                <button
                class="relative rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                aria-label="Cart"
                >
                <i class="fa-brands fa-opencart text-slate-700"></i>
                <span
                    class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center"
                >
                    7
                </span>
                </button>

                <div class="flex items-center gap-2 rounded-xl bg-slate-50 px-3 py-2">
                <div class="h-9 w-9 rounded-full bg-slate-200"></div>
                <div class="leading-tight">
                    <p class="text-sm font-semibold text-slate-900">Admin</p>
                    <p class="text-xs text-slate-500">Owner</p>
                </div>
                </div>
            </div>

            <!-- Mobile right: menu buttons -->
            <div class="md:hidden flex items-center gap-2">
                <!-- open sidebar -->
                <button
                @click="open = true"
                class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                aria-label="Open sidebar"
                >
                <svg class="h-5 w-5 text-slate-700" viewBox="0 0 24 24" fill="none">
                    <path
                    d="M4 6h16M4 12h16M4 18h16"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    />
                </svg>
                </button>

                <!-- mobile dropdown -->
                <details class="relative">
                <summary
                    class="list-none cursor-pointer rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                    aria-label="Open quick menu"
                >
                    <svg class="h-5 w-5 text-slate-700" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 6h.01M12 12h.01M12 18h.01"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                    </svg>
                </summary>

                <div
                    class="absolute right-0 mt-2 w-[92vw] max-w-sm rounded-2xl border border-slate-200 bg-white shadow-lg p-3 z-50"
                >
                    <div class="relative mb-3">
                    <input
                        type="text"
                        placeholder="Search..."
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 pl-10 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                    />
                    <svg
                        class="absolute left-3 top-2.5 h-5 w-5 text-slate-400"
                        viewBox="0 0 24 24"
                        fill="none"
                    >
                        <path
                        d="M21 21l-4.3-4.3m1.8-5.2a7 7 0 11-14 0 7 7 0 0114 0z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        />
                    </svg>
                    </div>

                    <div class="flex items-center justify-between gap-2">
                    <div
                        class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700"
                    >
                        <span class="h-2 w-2 rounded-full bg-green-500"></span>
                        Online
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                        class="relative rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                        aria-label="Notifications"
                        >
                        <svg class="h-5 w-5 text-slate-700" viewBox="0 0 24 24" fill="none">
                            <path
                            d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            />
                            <path
                            d="M9 17a3 3 0 006 0"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            />
                        </svg>
                        <span
                            class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center"
                        >
                            3
                        </span>
                        </button>

                        <button
                        class="relative rounded-xl border border-slate-200 bg-white p-2 hover:bg-slate-50"
                        aria-label="Cart"
                        >
                        <i class="fa-brands fa-opencart text-slate-700"></i>
                        <span
                            class="absolute -top-1 -right-1 h-4 w-4 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center"
                        >
                            7
                        </span>
                        </button>
                    </div>
                    </div>

                    <div class="mt-3 flex items-center gap-2 rounded-xl bg-slate-50 px-3 py-2">
                    <div class="h-9 w-9 rounded-full bg-slate-200"></div>
                    <div class="leading-tight">
                        <p class="text-sm font-semibold text-slate-900">Admin</p>
                        <p class="text-xs text-slate-500">Owner</p>
                    </div>
                    </div>
                </div>
                </details>
            </div>
            </div>
        </div>
        </header>

        <!-- Page -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                <!-- Overlay (mobile sidebar) -->
                <div
                    v-if="open"
                    class="lg:hidden fixed inset-0 z-40 bg-black/40"
                    @click="open = false"
                    ></div>

                <!-- Sidebar -->
                <aside
                    class="
                        lg:col-span-3
                        fixed lg:sticky
                        top-0 lg:top-20
                        left-0
                        h-full lg:h-[calc(100vh-6rem)]
                        w-80 max-w-[85vw] lg:w-auto
                        z-50 lg:z-0
                        transform transition-transform duration-200
                        -translate-x-full lg:translate-x-0
                    "
                    :class="open ? 'translate-x-0' : ''">
                <div class="h-full overflow-y-auto bg-white rounded-none lg:rounded-2xl border border-slate-200 shadow-sm p-4">
                    <div class="lg:hidden flex justify-end mb-2">
                    <button
                        @click="open = false"
                        class="rounded-xl border border-slate-200 px-3 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50"
                    >
                        ✕
                    </button>
                    </div>

                    <p class="text-xs font-semibold text-slate-500 mb-3">MAIN MENU</p>

                    <nav class="space-y-1">
                        <router-link to="/dashboard" class="nav-item" active-class="nav-active" @click="closeOnMobile">
                            <span class="icon"><i class="fa-solid fa-house-chimney"></i></span>
                            Dashboard
                        </router-link>

                        <router-link
                            to="/chat"
                            @click.prevent="closeOnMobile"
                            class="nav-item"
                        >
                            <span class="icon"><i class="fa-regular fa-comment-dots"></i></span>
                            Chat
                        </router-link>

                        <a
                            href="#"
                            @click.prevent="closeOnMobile"
                            class="nav-item"
                        >
                            <span class="icon"><i class="fa-solid fa-chart-column"></i></span>
                            Reports
                        </a>

                        <a
                            href="#"
                            @click.prevent="closeOnMobile"
                            class="nav-item"
                        >
                            <span class="icon"><i class="fa-solid fa-gear"></i></span>
                            Settings
                        </a>

                        <button
                            type="button"
                            @click="handleLogout"
                            class="nav-item w-full text-left"
                        >
                            <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                            Logout
                        </button>
                    </nav>

                    <div class="mt-4 border-t border-slate-200 pt-4">
                        <div class="rounded-2xl bg-slate-50 border border-slate-200 p-4">
                            <p class="text-sm font-semibold text-slate-900">Quick Tip</p>
                            <p class="text-xs text-slate-600 mt-1">
                            Keep low stock threshold updated to avoid out-of-stock.
                            </p>
                            <router-link
                            to="/"
                            class="mt-3 inline-flex w-full items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                            Add Product
                            </router-link>
                        </div>
                    </div>
                </div>
                </aside>

                <!-- Main -->
                <main class="lg:col-span-9 space-y-6">
                    <!-- Page header -->
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-slate-900">Dashboard Overview</h1>
                            <p class="text-sm text-slate-600">Track sales, orders, and inventory at a glance.</p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <button class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                            Export
                            </button>
                            <button class="rounded-xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-black">
                            Create Order
                            </button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                        <div class="card">
                            <p class="label">Today Sales</p>
                            <div class="mt-2 flex items-end justify-between">
                            <h2 class="value">৳ 12,450</h2>
                            <span class="badge badge-success">+12%</span>
                            </div>
                            <p class="hint">Compared to yesterday</p>
                        </div>

                        <div class="card">
                            <p class="label">Orders</p>
                            <div class="mt-2 flex items-end justify-between">
                            <h2 class="value">38</h2>
                            <span class="badge badge-info">+5</span>
                            </div>
                            <p class="hint">New orders today</p>
                        </div>

                        <div class="card">
                            <p class="label">Customers</p>
                            <div class="mt-2 flex items-end justify-between">
                            <h2 class="value">124</h2>
                            <span class="badge badge-purple">+9</span>
                            </div>
                            <p class="hint">Active this week</p>
                        </div>

                        <div class="card">
                            <p class="label">Low Stock</p>
                            <div class="mt-2 flex items-end justify-between">
                            <h2 class="value">7</h2>
                            <span class="badge badge-danger">Alert</span>
                            </div>
                            <p class="hint">Need restock soon</p>
                        </div>
                    </div>

                    <!-- Orders + Right panel -->
                    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
                        <!-- Recent Orders -->
                        <section class="xl:col-span-8 rounded-2xl bg-white border border-slate-200 shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-slate-200 flex items-center justify-between">
                                <h3 class="text-sm font-bold text-slate-900">Recent Orders</h3>
                                <a href="#" class="text-sm font-semibold text-blue-700 hover:underline">View all</a>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="min-w-full text-sm">
                                    <thead class="bg-slate-50 text-slate-600">
                                        <tr>
                                            <th class="text-left font-semibold px-4 py-3 whitespace-nowrap">Order</th>
                                            <th class="text-left font-semibold px-4 py-3 whitespace-nowrap">Customer</th>
                                            <th class="text-left font-semibold px-4 py-3 whitespace-nowrap">Amount</th>
                                            <th class="text-left font-semibold px-4 py-3 whitespace-nowrap">Status</th>
                                            <th class="text-right font-semibold px-4 py-3 whitespace-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-semibold text-slate-900 whitespace-nowrap">#INV-1021</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">Rahim</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">৳ 1,250</td>
                                            <td class="px-4 py-3">
                                            <span class="status status-paid">Paid</span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                            <a href="#" class="text-blue-700 font-semibold hover:underline">Details</a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-semibold text-slate-900 whitespace-nowrap">#INV-1020</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">Karim</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">৳ 980</td>
                                            <td class="px-4 py-3">
                                            <span class="status status-due">Due</span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                            <a href="#" class="text-blue-700 font-semibold hover:underline">Details</a>
                                            </td>
                                        </tr>

                                        <tr class="hover:bg-slate-50">
                                            <td class="px-4 py-3 font-semibold text-slate-900 whitespace-nowrap">#INV-1019</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">Sadia</td>
                                            <td class="px-4 py-3 text-slate-700 whitespace-nowrap">৳ 2,300</td>
                                            <td class="px-4 py-3">
                                            <span class="status status-processing">Processing</span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                            <a href="#" class="text-blue-700 font-semibold hover:underline">Details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <!-- Right Panel -->
                        <section class="xl:col-span-4 space-y-4">
                            <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-4">
                            <h3 class="text-sm font-bold text-slate-900">Quick Actions</h3>

                            <div class="mt-3 space-y-2">
                                <router-link
                                to="/"
                                class="btn btn-primary"
                                >
                                Add New Product
                                </router-link>

                                <button class="btn btn-dark" type="button">
                                Create Invoice
                                </button>

                                <button class="btn btn-outline" type="button">
                                View Report
                                </button>
                            </div>
                            </div>

                            <div class="rounded-2xl bg-white border border-slate-200 shadow-sm p-4">
                            <h3 class="text-sm font-bold text-slate-900">Low Stock Items</h3>

                            <div class="mt-3 space-y-3">
                                <div class="stock-row">
                                <div>
                                    <p class="stock-title">Paracetamol</p>
                                    <p class="stock-sub">Remaining: 4</p>
                                </div>
                                <span class="stock-badge">Restock</span>
                                </div>

                                <div class="stock-row">
                                <div>
                                    <p class="stock-title">Vitamin C</p>
                                    <p class="stock-sub">Remaining: 6</p>
                                </div>
                                <span class="stock-badge">Restock</span>
                                </div>

                                <div class="stock-row">
                                <div>
                                    <p class="stock-title">Hand Sanitizer</p>
                                    <p class="stock-sub">Remaining: 3</p>
                                </div>
                                <span class="stock-badge">Restock</span>
                                </div>
                            </div>
                            </div>
                        </section>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import api from "../../services/api";


const router = useRouter();
const open = ref(false);

function closeOnMobile() {
  if (window.innerWidth < 1024) open.value = false;
}

function handleLogout() {
  closeOnMobile();
  // তোমার logout logic এখানে বসাও
  localStorage.removeItem("token");
  localStorage.removeItem("user");
  router.push("/login");
}
</script>

<style scoped>
/* Reusable tiny utilities (keeps template clean) */
.nav-item {
  display: flex;
  align-items: center;
  gap: 0.75rem;
  border-radius: 0.75rem;
  padding: 0.6rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 600;
  color: rgb(51 65 85);
}
.nav-item:hover {
  background: rgb(248 250 252);
}
.nav-active {
  background: rgb(239 246 255);
  color: rgb(29 78 216);
}
.icon {
  height: 2.25rem;
  width: 2.25rem;
  border-radius: 0.75rem;
  background: rgb(241 245 249);
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

/* Cards */
.card {
  border-radius: 1rem;
  background: white;
  border: 1px solid rgb(226 232 240);
  box-shadow: 0 1px 2px rgba(15, 23, 42, 0.06);
  padding: 1rem;
}
.label {
  font-size: 0.75rem;
  font-weight: 700;
  color: rgb(100 116 139);
}
.value {
  font-size: 1.5rem;
  font-weight: 800;
  color: rgb(15 23 42);
}
.hint {
  margin-top: 0.5rem;
  font-size: 0.75rem;
  color: rgb(100 116 139);
}

/* Badges */
.badge {
  font-size: 0.75rem;
  font-weight: 700;
  padding: 0.25rem 0.5rem;
  border-radius: 0.6rem;
  border: 1px solid;
}
.badge-success {
  color: rgb(21 128 61);
  background: rgb(240 253 244);
  border-color: rgb(220 252 231);
}
.badge-info {
  color: rgb(29 78 216);
  background: rgb(239 246 255);
  border-color: rgb(219 234 254);
}
.badge-purple {
  color: rgb(88 28 135);
  background: rgb(250 245 255);
  border-color: rgb(233 213 255);
}
.badge-danger {
  color: rgb(185 28 28);
  background: rgb(254 242 242);
  border-color: rgb(254 226 226);
}

/* Status pills */
.status {
  display: inline-flex;
  align-items: center;
  border-radius: 999px;
  border: 1px solid;
  padding: 0.25rem 0.6rem;
  font-size: 0.75rem;
  font-weight: 700;
}
.status-paid {
  color: rgb(21 128 61);
  background: rgb(240 253 244);
  border-color: rgb(220 252 231);
}
.status-due {
  color: rgb(161 98 7);
  background: rgb(254 252 232);
  border-color: rgb(254 240 138);
}
.status-processing {
  color: rgb(29 78 216);
  background: rgb(239 246 255);
  border-color: rgb(219 234 254);
}

/* Buttons */
.btn {
  width: 100%;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 0.9rem;
  padding: 0.6rem 1rem;
  font-size: 0.875rem;
  font-weight: 800;
  transition: 0.15s;
}
.btn-primary {
  background: rgb(37 99 235);
  color: white;
}
.btn-primary:hover {
  background: rgb(29 78 216);
}
.btn-dark {
  background: rgb(15 23 42);
  color: white;
}
.btn-dark:hover {
  background: rgb(0 0 0);
}
.btn-outline {
  background: white;
  border: 1px solid rgb(226 232 240);
  color: rgb(51 65 85);
}
.btn-outline:hover {
  background: rgb(248 250 252);
}

/* Low stock */
.stock-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.stock-title {
  font-size: 0.875rem;
  font-weight: 800;
  color: rgb(15 23 42);
}
.stock-sub {
  font-size: 0.75rem;
  color: rgb(100 116 139);
}
.stock-badge {
  font-size: 0.75rem;
  font-weight: 800;
  color: rgb(185 28 28);
  background: rgb(254 242 242);
  border: 1px solid rgb(254 226 226);
  padding: 0.25rem 0.6rem;
  border-radius: 0.6rem;
}
</style>