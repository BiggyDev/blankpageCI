    <footer>
        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">About</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Sitemap</a>
                            <a href="#" class="item">Contact Us</a>
                            <a href="#" class="item">Religious Ceremonies</a>
                            <a href="#" class="item">Gazebo Plans</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Services</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Banana Pre-Order</a>
                            <a href="#" class="item">DNA FAQ</a>
                            <a href="#" class="item">How To Access</a>
                            <a href="#" class="item">Favorite X-Men</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <h4 class="ui inverted header">Footer Header</h4>
                        <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Semantic UI -->
    <script href="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('semantic/dist/semantic.min.js'); ?>"></script>
    <script src="<?= base_url('semantic/dist/components/visibility.js'); ?>"></script>
    <script src="<?= base_url('semantic/dist/components/sidebar.js'); ?>"></script>
    <script src="<?= base_url('semantic/dist/components/transition.js'); ?>"></script>

    <!-- Menu fondu -->
    <script>
        $(document)
            .ready(function() {

                // fix menu when passed
                $('.masthead')
                    .visibility({
                        once: false,
                        onBottomPassed: function() {
                            $('.fixed.menu').transition('fade in');
                        },
                        onBottomPassedReverse: function() {
                            $('.fixed.menu').transition('fade out');
                        }
                    })
                ;

                // create sidebar and attach to menu open
                $('.ui.sidebar')
                    .sidebar('attach events', '.toc.item')
                ;

            })
        ;
        $(document)
            .ready(function() {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier  : 'email',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your e-mail'
                                    },
                                    {
                                        type   : 'email',
                                        prompt : 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            password: {
                                identifier  : 'password',
                                rules: [
                                    {
                                        type   : 'empty',
                                        prompt : 'Please enter your password'
                                    },
                                    {
                                        type   : 'length[6]',
                                        prompt : 'Your password must be at least 6 characters'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
    </body>
</html>