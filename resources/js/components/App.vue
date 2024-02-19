
import { RouterView } from 'vue-router';
<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="https://storage.googleapis.com/thiio.thiiomedia.com/Page/4/thiio.png" width="100" height="25">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link exact-active-class="active" to="/home" class="nav-link active" aria-current="page">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/users" class="nav-link" >Users</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/contact" class="nav-link" >Contact Us</router-link>
        </li>
        </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
    </nav>
      <div>
        <router-view></router-view>
      </div>
  </main>
</template>




