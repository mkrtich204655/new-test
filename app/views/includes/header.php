<?php
include_once __DIR__.'../../layouts/app.php';
?>
<div class="menu d-flex">
    <h3 class="mx-2">Your TV</h3>
    <span class="search_span my-auto ml-3">
        <label for="searchByName">Series Name  <img src="../../../public/img/search.svg" alt="search"></label>
        <input type="text" id="searchByName" >
    </span>

    <span class="search_span my-auto ml-3">
        <label for="searchByName">Date</label>
        <input type="date"  id="searchByDate">
    </span>
</div>
