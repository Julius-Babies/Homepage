<template>
  <div class="about">
      <Header color="black"></Header>
      <div id="services">
          <ServiceCard name="Guacamole" :icon_url="require('@/assets/guacamole.png')" url="https://julius.familie-babies.de/guacamole" />
          <ServiceCard name="phpMyAdmin" :icon_url="require('@/assets/pma.png')" url="https://julius.familie-babies.de/phpmyadmin" />
          <ServiceCard name="Bitwarden" :icon_url="require('@/assets/bitwarden.png')" url="https://julius.familie-babies.de/bitwarden" />
      </div>
  </div>
</template>

<style scoped>
#services {
    margin: 15pt;
}
</style>
<script setup>
import Header from "@/components/Header.vue";
import ServiceCard from "@/components/ServiceCard.vue";
</script>
