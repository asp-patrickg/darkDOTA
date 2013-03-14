<!DOCTYPE html>
<html>
    <?php
    echo View::factory('includes/head');
    ?>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div id="body_box">
            <?php
            /**
             * The header file contains the logo and the navigation.
             */
            echo View::factory("includes/header");
            ?>
            <div id="content_box">
                <div id="main_content_box">
                    <div class="advertisement_box">
                        <?php echo View::factory("includes/advertisement"); ?>
                    </div>
                    <div>
                        <div id="social_plugins">
                            <div id="facebook_like_box">
                                <?php echo View::factory("includes/facebook_like"); ?>
                            </div>
                            <div id="twitter_box">
                                <?php echo View::factory("includes/twitter"); ?>
                            </div>
                        </div>
                    </div>
                    <div id="actual_content">
                        <?php
                        /**
                         * This is where you will put the body of the page. (text, pictures, forms, videos, etc.)
                         */
                        echo View::factory("sub/".$post['sub']);
                        ?>
                    </div>
                    <div class="advertisement_box">
                        <?php echo View::factory("includes/advertisement"); ?>
                    </div>
                </div>
                <div id="side_box">
                    <?php
                    /**
                     * This is where your sidebar is located. Profile, analytics, advertisements, etc.
                     */
                    echo View::factory("includes/feedjit");
                    ?>
                </div>
            </div>
            <?php
            /**
             * The footer file contains anything you like to have at the footer.
             * Copyright, Terms of Service, Privacy, etc.
             */
            echo View::factory("includes/footer");
            ?>
        </div>
    </body>
</html>