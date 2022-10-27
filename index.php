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
<!--<div id="bind-attribute">-->
<!--  <span v-bind:title="message">-->
<!--    Passez la souris sur moi pendant quelques secondes pour voir ma liaison dynamique-->
<!--    title!-->
<!--  </span>-->
<!--</div>-->
<!--<br><br>-->
<!--<div id="event-handling">-->
<!--    <p>{{ message }}</p>-->
<!--    <button v-on:click="reverseMessage">Inverser le message</button>-->
<!--</div>-->
<!--<br><br><br>-->
<!--<div id="counter">-->
<!--    Compteur: {{ compteur }}-->
<!--</div>-->
<!--<br><br><br>-->

<!--<div id="codeur">-->

<!--    <h3  style="text-align: center">{{ name }}</h3>-->
<!--</div>-->

<!--<br><br>-->
<!--<div id="two-way-binding">-->
<!--    <p>{{ message }}</p>-->
<!--    <input v-model="message" />-->
<!--</div>-->

<!--<br><br>-->
<!--<div id="conditional-rendering">-->
<!--    <span v-if="seen">Là vous me voyez</span>-->
<!--</div>-->

<!--<br><br>-->
<!--<div id="list-rendering">-->
<!--    <ol>-->
<!--        <li v-for="todo in todos" v-bind:key="todo.text">-->
<!--            {{ todo.text }}-->
<!--        </li>-->
<!--    </ol>-->
<!--</div>-->
<br>
<!--<div id="todo-list-app">-->
<!--    <ol>-->
<!--        &lt;!&ndash;-->
<!--          Maintenant nous fournissons à chaque todo-item l'objet todo qu'il représente-->
<!--          de manière à ce que son contenu puisse être dynamique. Nous avons également-->
<!--          besoin de fournir à chaque composant une « clé », mais nous expliquerons cela plus tard.-->
<!--        &ndash;&gt;-->
<!--        <li-->
<!--                v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"-->
<!--        >{{ item.id }} : {{ item.text }}</li>-->
<!--    </ol>-->
<!--</div>-->

<!--<div id="todo-list-app">-->
<!--    <ol>-->
<!--        &lt;!&ndash;-->
<!--          Maintenant nous fournissons à chaque todo-item l'objet todo qu'il représente-->
<!--          de manière à ce que son contenu puisse être dynamique. Nous avons également-->
<!--          besoin de fournir à chaque composant une « clé », mais nous expliquerons cela plus tard.-->
<!--        &ndash;&gt;-->
<!--        <todo-item-->
<!--                v-for="item in groceryList"-->
<!--                v-bind:todo="item"-->
<!--                v-bind:key="item.id"-->
<!--        ></todo-item>-->
<!--    </ol>-->
<!--</div>-->

<!--<div id="lecomposant">-->
<!--    <le-chiffre v-for="item in number" v-bind:chiffre="item" v-bind:key="item.id"></le-chiffre>-->
<!--</div>-->
<div id="app">
    <nav>
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
    <br><br><br><br>

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


        </div>

    </div>

                <!--cart display-->
                <!--div v-if="cart.length > 0" class="shopping-cart" id="shopping-cart">
                    <h2>Panier</h2>

                    <div class="item-group">
                        <div v-for="product in cart" class="item">

                            <div class="img-container">
                                <img v-bind:src="product.img" alt="">
                            </div>

                            <div class="item-description">
                                <h4>{{ product.description }}</h4>
                                <p>{{ product.price }}€</p>
                            </div>

                            <div class="item-quantity">
                                <h6>{{ product.quantity }}</h6>
                            </div>

                            <div class="cart-icons">
                                <button>
                                    <i class="fa fa-plus"></i>
                                </button>
                                <button>
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>

                        </div>
                    </div-->


</script>

<!-- home template component -->
<!--<script type="text/x-template" id="home">-->
<!--        <div class="home-container">-->
<!--            <h1>Articles</h1>-->

<!--&lt;!&ndash;            &lt;!&ndash; search display &ndash;&gt;&ndash;&gt;-->
<!--&lt;!&ndash;            <input v-model="searchKey" id="search" type="search" placeholder="Rechercher..." autocomplete="off">&ndash;&gt;-->
<!--&lt;!&ndash;            <span v-if="searchKey && filteredList.length >= 1 ">&ndash;&gt;-->
<!--&lt;!&ndash;              {{filteredList.length}} resultat<span v-if="filteredList.length >= 2">s</span>&ndash;&gt;-->
<!--&lt;!&ndash;            </span>&ndash;&gt;-->

           <!--cards display>
<div class="card-cart-container">
    <div class="card-container">
        <div v-for="product in filteredList" class="card">
            <div v-for="product in products" class="card"-->

                <!--                        <div class="img-container">-->
                <!--                            <img v-bind:src='product.img'/>-->
                <!--                        </div>-->

                <!--                        <div class="card-text">-->
                <!--                            <h3>{{ product.description }}</h3>-->
                <!--                            <span>{{ product.price }}€</span>-->
                <!--                        </div>-->
                <!--                    </div>-->


                <!--                    <div class="card-icons">-->
                <!--                            <div class="like-container">-->
                <!--                                <input-->
                <!--                                        type="checkbox"-->
                <!--                                        :value=product.id-->
                <!--                                        name="checkbox"-->
                <!--                                        v-bind:id="product.id"-->
                <!--                                        v-model="liked"-->
                <!--                                        @click="setLikeCookie()"-->
                <!--                                />-->
                <!--                                <label v-bind:for="product.id">-->
                <!--                                    <i class="fas fa-heart"></i>-->
                <!--                                </label>-->
                <!--                            </div>-->

                <!--                            <div class="add-to-cart">-->
                <!--                                <button v-on:click="addToCart(product)">-->
                <!--                                    <i class="fas fa-shopping-cart"></i>-->
                <!--                                </button>-->
                <!--                            </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->

                <!--                    &lt;!&ndash; no result message &ndash;&gt;-->
                <!--&lt;!&ndash;                    <div v-if="filteredList.length == []" class="no-result">&ndash;&gt;-->
                <!--&lt;!&ndash;                        <h3>Désolé</h3>&ndash;&gt;-->
                <!--&lt;!&ndash;                        <p>Aucun résultat trouvé</p>&ndash;&gt;-->
                <!--&lt;!&ndash;                    </div>&ndash;&gt;-->
                <!--                &lt;!&ndash; {{liked}} &ndash;&gt;-->

                <!--                &lt;!&ndash; cart display &ndash;&gt;-->
                <!--&lt;!&ndash;                <transition name="cart-anim">&ndash;&gt;-->
                <!--&lt;!&ndash;                    <div v-if="cart.length > 0" class="shopping-cart" id="shopping-cart">&ndash;&gt;-->
                <!--&lt;!&ndash;                        <h2>Panier</h2>&ndash;&gt;-->

                <!--&lt;!&ndash;                        <transition-group name="item-anim" tag="div" class="item-group">&ndash;&gt;-->
                <!--&lt;!&ndash;                            <div v-for="product, id in cart" class="item" v-bind:key="product.id">&ndash;&gt;-->

                <!--&lt;!&ndash;                                <div class="img-container">&ndash;&gt;-->
                <!--&lt;!&ndash;                                    <img v-bind:src='product.img'/>&ndash;&gt;-->
                <!--&lt;!&ndash;                                </div>&ndash;&gt;-->

                <!--&lt;!&ndash;                                <div class="item-description">&ndash;&gt;-->
                <!--&lt;!&ndash;                                    <h4>{{ product.description }}</h4>&ndash;&gt;-->
                <!--&lt;!&ndash;                                    <p>{{ product.price }}€</p>&ndash;&gt;-->
                <!--&lt;!&ndash;                                </div>&ndash;&gt;-->

                <!--&lt;!&ndash;                                <div class="item-quantity">&ndash;&gt;-->
                <!--&lt;!&ndash;                                    <h6>quantité : {{ product.quantity }}</h6>&ndash;&gt;-->

                <!--&lt;!&ndash;                                    <div class="cart-icons">&ndash;&gt;-->
                <!--&lt;!&ndash;                                        <button v-on:click="cartPlusOne(product)">&ndash;&gt;-->
                <!--&lt;!&ndash;                                            <i class="fa fa-plus"></i>&ndash;&gt;-->
                <!--&lt;!&ndash;                                        </button>&ndash;&gt;-->
                <!--&lt;!&ndash;                                        <button v-on:click="cartMinusOne(product, id)">&ndash;&gt;-->
                <!--&lt;!&ndash;                                            <i class="fa fa-minus"></i>&ndash;&gt;-->
                <!--&lt;!&ndash;                                        </button>&ndash;&gt;-->
                <!--&lt;!&ndash;                                        <button @click="cartRemoveItem(id)">&ndash;&gt;-->
                <!--&lt;!&ndash;                                            <i class="fa fa-trash"></i>&ndash;&gt;-->
                <!--&lt;!&ndash;                                        </button>&ndash;&gt;-->
                <!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                            </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                        </transition-group>&ndash;&gt;-->

                <!--&lt;!&ndash;                        <div class="grand-total">&ndash;&gt;-->
                <!--&lt;!&ndash;                            <div class="total">&ndash;&gt;-->
                <!--&lt;!&ndash;                                <h2>Total</h2>&ndash;&gt;-->
                <!--&lt;!&ndash;                                <h2>{{ cartTotalAmount }} €</h2>&ndash;&gt;-->
                <!--&lt;!&ndash;                            </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                            <h6>Total articles : {{ itemTotalAmount }}</h6>&ndash;&gt;-->
                <!--&lt;!&ndash;                        </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                        <div class="order-button">&ndash;&gt;-->
                <!--&lt;!&ndash;                            <button>Commander</button>&ndash;&gt;-->
                <!--&lt;!&ndash;                        </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                    </div>&ndash;&gt;-->
                <!--&lt;!&ndash;                </transition>&ndash;&gt;-->
                <!--                </div>-->
                <!--</script>-->

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


                <!--<script>-->

                <!--   //  const Compteur = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              compteur: 0-->
                <!--   //          }-->
                <!--   //      },-->
                <!--   //      mounted() {-->
                <!--   //          setInterval(() => {-->
                <!--   //              this.compteur++-->
                <!--   //          }, 1000)-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(Compteur).mount('#counter')-->
                <!--   //-->
                <!--   //  const b = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              message: 'Vous avez chargez cette page le ' + new Date().toLocaleString()-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(b).mount('#bind-attribute');-->
                <!--   //-->
                <!--   //  const EventHandling = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              message: 'Hello Vue.js!'-->
                <!--   //          }-->
                <!--   //      },-->
                <!--   //      methods: {-->
                <!--   //          reverseMessage() {-->
                <!--   //              this.message = this.message-->
                <!--   //                  .split('')-->
                <!--   //                  .reverse()-->
                <!--   //                  .join('')-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(EventHandling).mount('#event-handling')-->
                <!--   //-->
                <!--   //  const TwoWayBinding = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              message: 'Hello Vue!'-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(TwoWayBinding).mount('#two-way-binding')-->
                <!--   //-->
                <!--   //  const ConditionalRendering = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              seen: 0-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(ConditionalRendering).mount('#conditional-rendering')-->
                <!--   //-->
                <!--   //  const ListRendering = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              todos: [-->
                <!--   //                  { text: 'Apprendre Python' },-->
                <!--   //                  { text: 'Apprendre Vue' },-->
                <!--   //                  { text: 'Créer quelque chose de génial' }-->
                <!--   //              ]-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //  Vue.createApp(ListRendering).mount('#list-rendering')-->
                <!--   //-->
                <!--   //  // Créer une application Vue-->
                <!--   //  //const app = Vue.createApp(codeur)-->
                <!--   //-->
                <!--   //  const TodoList = {-->
                <!--   //      data() {-->
                <!--   //          return {-->
                <!--   //              groceryList: [-->
                <!--   //                  { id: 0, text: 'Légumes' },-->
                <!--   //                  { id: 1, text: 'Fromage' },-->
                <!--   //                  { id: 2, text: 'Tout ce que les humains sont censés manger' }-->
                <!--   //              ]-->
                <!--   //          }-->
                <!--   //      }-->
                <!--   //  }-->
                <!--   //-->
                <!--   //-->
                <!--   //  Vue.createApp(TodoList).mount("#todo-list-app")-->
                <!--   //-->
                <!--   //-->
                <!--   // const app = Vue.createApp(TodoList)-->
                <!--   //-->
                <!--   // app.component('todo-item', {-->
                <!--   //     props: ['todo'],-->
                <!--   //     template: `<li>{{ todo.text }}</li>`-->
                <!--   // })-->
                <!--   //-->
                <!--   // app.mount('#todo-list-app')-->


                <!--   const TodoList = {-->
                <!--       data() {-->
                <!--           return {-->
                <!--               groceryList: [-->
                <!--                   { id: 0, text: 'Légumes' },-->
                <!--                   { id: 1, text: 'Fromage' },-->
                <!--                   { id: 2, text: 'Tout ce que les humains sont censés manger' }-->
                <!--               ]-->
                <!--           }-->
                <!--       }-->
                <!--   }-->

                <!--   const app = Vue.createApp(TodoList)-->

                <!--   app.component('todo-item', {-->
                <!--       props: ['todo'],-->
                <!--       template: `<li>{{ todo.text }}</li>`-->
                <!--   })-->

                <!--   app.mount('#todo-list-app')-->


                <!--   const Composant = {-->
                <!--       data(){-->
                <!--           return {-->
                <!--               number : [-->
                <!--                   45,-->
                <!--                   55,-->
                <!--                   83,-->
                <!--                   74-->
                <!--               ]-->
                <!--           }-->
                <!--       }-->
                <!--   }-->
                <!--   const compo = Vue.createApp(Composant)-->

                <!--   compo.component('le-chiffre',{-->
                <!--       props:['chiffre'],-->
                <!--       template: `<h5>{{ chiffre }}</h5>`-->
                <!--   })-->

                <!--   compo.mount('#lecomposant')-->


                <!--    // Définir un nouveau composant appelé todo-item-->
                <!--    // app2.component('todo-item', {-->
                <!--    //     props: ['todo'],-->
                <!--    //     template: `<li>{{ todo.text }}</li>`-->
                <!--    // })-->
                <!--    //-->
                <!--    // // Monter l'application Vue-->
                <!--    // app2.mount("#app")-->


                <!--    // app.component('todo-item', {-->
                <!--    //     props: ['todo'],-->
                <!--    //     template: `<li>{{ todo.text }}</li>`-->
                <!--    // })-->
                <!--    //-->
                <!--    // app.mount('#todo-list-app')-->

                <!--   const app2 = Vue.createApp({-->
                <!--       data() {-->
                <!--           return { count: 4 }-->
                <!--       }-->
                <!--   })-->

                <!--   const vm = app2.mount('#app')-->

                <!--   console.log(vm.count)-->


                <!--</script>-->

</body>
</html>
