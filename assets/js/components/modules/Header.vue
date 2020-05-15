<template>
    <div>
        <b-navbar toggleable="xl" type="dark" variant="dark" :class="{ 'navbarSmall': !showNavbar, 'navbarBig': showNavbar }">
            <b-navbar-brand to="/home">Ewa Haaglanden</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">
                    <b-navbar-nav>
                        <b-nav-item to="/partners">Partners</b-nav-item>
                        <b-nav-item to="/nieuwsberichten">Nieuwsberichten</b-nav-item>
                        <b-nav-item to="/informatie">Informatie</b-nav-item>
                        <b-nav-item to="/contact">Contact</b-nav-item>
                    </b-navbar-nav>
<!--                    <b-nav-item-dropdown right>-->
<!--                        &lt;!&ndash; Using 'button-content' slot &ndash;&gt;-->
<!--                        <template v-slot:button-content>-->
<!--                            <em>User</em>-->
<!--                        </template>-->
<!--                        <b-dropdown-item href="#">Profile</b-dropdown-item>-->
<!--                        <b-dropdown-item href="#">Sign Out</b-dropdown-item>-->
<!--                    </b-nav-item-dropdown>-->
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
    export default {
        name: "Header",
        data () {
            return {
                showNavbar: true,
                lastScrollPosition: 0
            }
        },
        mounted () {
            window.addEventListener('scroll', this.onScroll)
        },beforeDestroy () {
            window.removeEventListener('scroll', this.onScroll)
        },
        methods: {
            onScroll () {
                const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop
                if (currentScrollPosition < 0) {
                    return
                }
                // Stop executing this function if the difference between
                // current scroll position and last scroll position is less than some offset
                if (Math.abs(currentScrollPosition - this.lastScrollPosition) < 80) {
                    return
                }
                this.showNavbar = currentScrollPosition < this.lastScrollPosition
                this.lastScrollPosition = currentScrollPosition
            }
        }
    }
</script>

<style scoped>
    .navbar {
        z-index: 1;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
    }

    .navbar.navbarBig {
        transition: 400ms;
        height: 8vh;
    }

    .navbar.navbarSmall {
        transition: 400ms;
        height: 6vh;
    }

    #nav-collapse {
        background-color: #343A40;
    }
</style>