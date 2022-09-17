<template>
  <section class="accomodation_area section_gap">
    <div class="container">
      <div class="section_title text-center">
        <h2 class="title_color">
          Nuestras Habitaciones
        </h2>
        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
      </div>
      <div class="row mb_30">
        <div class="col-lg-3 col-sm-6" v-for="i in 4">
          <accomodation-widget :room="room" />
        </div>
      </div>
    </div>
  </section>
</template>


<script lang="ts" setup>
import AccomodationWidget from '@/components/widgets/AccomodationWidget.vue';
import { IRoom } from '@/types';

const room: IRoom = {
  image: 'image/room1.jpg',
  price: 200,
  title: 'Habitacion',
  type: 'Sencilla',
}
</script>
