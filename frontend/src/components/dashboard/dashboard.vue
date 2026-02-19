<template>
    <!-- Dashboard (Tailwind only, No JS) -->
    <div class="min-h-screen bg-slate-100">

        <!-- Top Navbar -->
        <header class="bg-white border-b">
            <HeaderSection></HeaderSection>
        </header>

        <!-- Page -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            hello

            </div>
        </div>
    </div>

</template>

<script setup>
import { useRouter } from 'vue-router'
import api from '../../services/api'
import HeaderSection from './header.vue';

const router = useRouter()

</script>