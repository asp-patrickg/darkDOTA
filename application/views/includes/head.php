    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo Helpers_Strings::getString("APP_NAME");?></title>
        <?php
        /**
         * You can replace your favicon by replacing the favicon.ico file in the 'resources' folder.
         * Be sure to name the new file as 'favicon.ico'.
         */
        echo HTML::style('resources/favicon-darkdota.ico', array('rel' => 'shortcut icon', 'type' => ''))."\n";
        echo HTML::style('styles/home.css')."\n";
        echo HTML::style('lightbox/css/lightbox.css')."\n";
        echo HTML::script('lightbox/js/jquery-1.7.2.min.js')."\n";
        echo HTML::script('lightbox/js/lightbox.js')."\n";
        ?>
    </head>