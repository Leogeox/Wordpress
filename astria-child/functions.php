<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/** CSS child dépend du parent */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'astra-child-style',
        get_stylesheet_uri(),
        [ 'astra-theme-css' ],
        wp_get_theme()->get( 'Version' )
    );
}, 20 );

/** Kill tout le footer Astra puis injecter le tien */
add_action( 'wp', function () {
    // Supprime toutes les callbacks déjà ajoutées au hook astra_footer
    remove_all_actions( 'astra_footer' );
    remove_all_actions( 'astra_header' );

    // Ajoute TON footer
    add_action( 'astra_footer', 'astra_child_footer' );
    add_action( 'astra_header', 'astra_header_child' );

} );

// do_action('wp_footer', function () {
//      echo "<script>alert('Bienvenue sur mon Portfolio !');</script>";
// });

function astra_header_child() { ?>
    <header class="site-header">
        <div class="header-content dflex">
            <div class="logo">
                <?php the_custom_logo(); ?>
            </div>
            <nav>
                <ul class="nav">
                    <li>
                        <a href="/boutique">Accueil</a>
                    </li>
                    <li>
                        <a href="/contact">Contact</a>
                    </li>
                    <li>
                        <a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a>
                    </li>
                    <li>
                        <a href="https://email.com" target="_blank" rel="noopener">Email</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
<?php }

function astra_child_footer() { ?>
    <footer class="site-footer">
        <div class="footer-grid">
            <div class="footer-col">
                <div>
                    <?php the_custom_logo(); ?>
                </div>
                <br>
                <h4>À propos</h4>
                <p>Nous créons des portfolio rapides et accessibles qui vous ressemblent !</p>
            </div>

            <div class="footer-col">
                <h4>Liens</h4>
                <ul>
                    <li><a href="">Accueil</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Mentions légales</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Suivez-nous</h4>
                <ul>
                    <li> <a href="#" target="_blank" rel="noopener">Instagram</a> </li>
                    <li> <a href="#" target="_blank" rel="noopener">Twitter</a> </li>
                    <li> <a href="#" target="_blank" rel="noopener">Linkledin</a> </li>
                    <li> <a href="#" target="_blank" rel="noopener">Email</a> </li>
                </ul>
            </div>
        </div>
    </footer>
<?php }

add_action('wp_footer', function () {
    echo '<p class="position copyright">Copyright ©LéoPortfolio — 2025</p>';
});
