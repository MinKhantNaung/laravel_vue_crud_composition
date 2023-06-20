<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
    <div>
        <header>
        <div class="wrapper">
          <nav class="my-3 d-flex justify-content-center">
            <RouterLink to="/" class="btn btn-sm btn-info border border-2"><i class="fa-solid fa-house"></i></RouterLink>
            <RouterLink to="/jobs" class="btn btn-sm btn-info border border-2 ms-2"><i class="fa-solid fa-magnifying-glass-plus"></i></RouterLink>
          </nav>
        </div>
      </header>

      <RouterView />
    </div>
</template>