<div id="header_box">
    <div id="header_logo">
        <?php
        /**
         * The company logo should be put here.
         */
        echo "<a href=\"" . URL::base() . "\"><img src=\"" . URL::base() . Helpers_Util::getLogoLink() . "\" alt=\"dokgu\" /></a>\n";
        ?>
    </div>
    <div id="header_content">
        <?php
        /**
         * Content of the header should be put here. Navigation, Menu, etc.
         */
        ?>
        <div id="navigation_box">
            <div id="menu_box">
                <ul>
                    <li><a href="<?php echo URL::base(); ?>">Home</a></li>
                    <li><a href="http://dokgu.synergize.co/">Blog</a></li>
                    <li><a href="https://play.google.com/store/apps/developer?id=dokgu">Android</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>