<footer id="site-footer" role="contentinfo" class="header-footer-group">

    <div class="section-inner">

        <div class="footer-credits">

            <p class="footer-copyright">&copy;
                <?php
                echo date_i18n(
                    /* translators: Copyright date format, see https://secure.php.net/date */
                    _x('Y', 'copyright date format', 'daeristwo')
                );
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo bloginfo('name'); ?></a>
            </p><!-- .footer-copyright -->


        </div><!-- .footer-credits -->

    </div><!-- .section-inner -->

</footer><!-- #site-footer -->

<?php wp_footer(); ?>

</body>

</html>