<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Vue Project</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <link rel="icon" href="./assets/img/vueLogo.png" type="image/png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"/>
    <link href="./assets/style/style.css" rel="stylesheet"/>
</head>

<body>

<div id="app">
    <nav style="margin-top: -21px">
        <!--        <todo-item></todo-item>-->
        <div class="nav-container">
            <div id="logo">
                <router-link to="/">
                    <img src="./assets/img/wish-logo-800.png" alt="logo"/>
                </router-link>
            </div>

            <ul id="icons">
                <li>
                    <router-link to="/user-settings">
                        <i class="fas fa-user"></i>
                    </router-link>
                </li>
                <li>
                    <router-link to="/wish-list">
                        <i class="fas fa-heart"></i>
                        <span id="nav-not"></span>
                    </router-link>
                </li>
                <li>
                    <router-link to="/shopping-cart">
                        <i class="fas fa-shopping-cart"></i>
                    </router-link>
                </li>
            </ul>
        </div>

    </nav>
    <br>

    <router-view></router-view>
</div>


<script type="text/x-template" id="home">

    <div class="home-container">
        <h1>Articles</h1>

        <!--search display-->
        <input v-model="searchKey" id="search" type="search" placeholder="Rechercher..." autocomplete="off">

        <!--no result message-->
        <div v-if="filteredList.length == 0" class="no-result">
            <h3 style="color:red">Désolé</h3>
            <p style="color:darkred">Aucun résultat trouvé</p>
        </div>

        <!--list results-->
        <div v-if="searchKey && filteredList.length >= 1 ">{{ filteredList.length }} résultat<span
                    v-if="filteredList.length >= 2">s</span>

            <!--card-display-->
            <div class="card-cart-container">
                <div class="card-container">
                    <div v-for="product in filteredList" class="card">

                        <div class="img-container">
                            <img v-bind:src="product.img" alt="">
                        </div>
                        <div class="card-text">
                            <h3>{{ product.description}}</h3>
                            <span>{{ product.price }}€</span>
                        </div>
                        <div class="card-icons">
                            <div class="like-container">
                                <input type="checkbox" :value=product.id name="checkbox" v-bind:id="product.id"
                                       v-model="liked" @click="setLikeCookie()"/>
                                <label v-bind:for="product.id"><i class="fas fa-heart"></i></label>
                            </div>

                            <div class="add-to-cart">
                                <button v-on:click="addToCart(product)">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--cart display-->
                <div v-if="cart.length > 0" class="shopping-cart" id="shopping-cart">
                    <h2>Panier</h2>

                    <div class="item-group">
                        <div v-for="product, id in cart" v-bind:key="product.id" class="item">
                            <div class="img-container">
                                <img v-bind:src="product.img" alt="">
                            </div>

                            <div class="item-description">
                                <h4>{{ product.description }}</h4>
                                <p>{{ product.price }}€</p>
                            </div>

                            <div class="item-quantity">
                                <h6>quantité : {{ product.quantity }}</h6>

                                <div class="cart-icons">
                                    <button @click="cartPlusOne(product)">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button @click="cartMinusOne(product, id)">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <button @click="cartRemoveItem(id)">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="grand-total">
                            <div class="total">
                                <h2>Total</h2>
                                <h2>{{ cartTotalAmount }} €</h2>
                            </div>
                            <h6>Total articles : {{ itemTotalAmount }}</h6>
                        </div>

                    </div>


</script>


<script src="assets/js/jquery.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>-->
<!--    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>-->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://unpkg.com/vue-router@4"></script>
<script src="https://unpkg.com/vue-cookies@1.8.1/vue-cookies.js"></script>
<script src="./assets/js/vue.js" type="text/javascript"></script>
<script src="./assets/js/script.js"></script>


<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/4.1.5/vue-router.cjs.js"-->
<!--        integrity="sha512-hihdghOhvUKO3Tv3BEBKYvRDPJvNWZemo1EkKMb2PmB+bNrvoX6JUntgoTMJ/3mayxtCQ6J95V41Dvv4LeET8A=="-->
<!--        crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->


</body>
</html>
