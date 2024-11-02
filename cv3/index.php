<?php

require 'inc/functions.php';
createHeader("Stranka | Domov","Vitajte na Stranke");

// CONTENT
$posts = [
    new Post(
        "Lorem Ipsum",
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nulla.",
        "Jozef Fero",
        "img_1.jpg"),
    new Post(
        "Lorem Ipsum",
        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique consectetur mollitia enim atque at sunt ea! Repellat voluptates velit molestias aliquam quisquam corporis delectus ea sapiente doloribus similique qui, temporibus dolorum vero, nam nostrum quod labore, nesciunt enim consequuntur. Deserunt, vero error sunt facere eaque nisi est eligendi ullam dolorem voluptate officiis quaerat minus saepe aliquam! Minima quaerat inventore molestias aut veniam architecto magni quos iste? Modi temporibus, facere id totam ipsa beatae fugit aliquid repellendus esse autem nostrum at provident dolorum excepturi possimus, tempore libero rerum doloribus. Dolores aspernatur officiis sed? Vel commodi amet asperiores repellat, nisi deserunt hic.",
        "Jozef Fero",
        "img_1.jpg"
    )];

foreach ($posts as $post)
    $post -> displayPost();

createFooter();