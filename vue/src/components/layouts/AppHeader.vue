<template>
  <header class="header_area">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <!-- Brand and toggle get grouped for better mobile display -->
        <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="navbar-brand logo_h">
          <img style="max-width:2rem" src="/logo.png" alt="Logo">
        </router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar" />
          <span class="icon-bar" />
          <span class="icon-bar" />
        </button>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="navbarSupportedContent" class="collapse navbar-collapse offset">
          <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">About us
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Accomodation
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Gallery
              </router-link>
            </li>
            <li class="nav-item submenu dropdown">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link dropdown-toggle" data-toggle="dropdown"
                role="button" aria-haspopup="true" aria-expanded="false">Blog</router-link>
              <ul class="dropdown-menu">
                <li class="nav-item">
                  <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Blog</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Blog
                    Details</router-link>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Elemests
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: ROUTE_NAME.MAIN_HOME }" class="nav-link">Contact
              </router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
</template>

<script lang="ts" setup>
import { ROUTE_NAME } from '@/router'
</script>

<style scoped>
.app-title {
  margin-left: 5px;
  padding-top: 10px;
}
</style>
