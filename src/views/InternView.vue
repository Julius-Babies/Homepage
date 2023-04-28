<template>
    <Header color="black"></Header>
    <div id="content">
      <div>
          <ServiceCard name="Guacamole" :icon_url="require('@/assets/guacamole.png')" url="https://julius.familie-babies.de/guacamole" />
          <ServiceCard name="phpMyAdmin" :icon_url="require('@/assets/pma.png')" url="https://julius.familie-babies.de/phpmyadmin" />
          <ServiceCard name="Bitwarden" :icon_url="require('@/assets/bitwarden.png')" url="https://julius.familie-babies.de/bitwarden" />
      </div>
  </div>
  <table>
      <tr>
          <th>Port</th>
          <th>Service</th>
      </tr>
      <tr>
          <td>8001</td>
          <td>Guacamole</td>
      </tr>
      <tr>
          <td>8002</td>
          <td>phpMyAdmin</td>
      </tr>
      <tr>
          <td>8003</td>
          <td>Wordpress</td>
      </tr>
      <tr>
          <td>8004</td>
          <td>-</td>
      </tr>
      <tr>
          <td>8005</td>
          <td>Bitwarden</td>
      </tr>
  </table>
</template>

<style scoped>
#content div {
    margin: 15px;
}
</style>
<script setup>
import Header from "@/components/Header.vue";
import ServiceCard from "@/components/ServiceCard.vue";
</script>
