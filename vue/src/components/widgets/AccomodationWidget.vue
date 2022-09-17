<template>
  <div class="accomodation_item text-center">
    <div class="hotel_img">
      <img :src="$props.room.image" :alt="$props.room.title">
      <a href="#" class="btn theme_btn button_hover">Reservar</a>
    </div>
    <a href="#">
      <h4 class="sec_h4">Habitacion {{ $props.room.type }}</h4>
    </a>
    <h5>${{ Number($props.room.price).toFixed(2) }}<small>/noche</small></h5>
  </div>
</template>

<script setup lang='ts'>
import { IRoom } from '@/types';

interface IProps {
  room: IRoom
}
const $props = defineProps<IProps>()
</script>
