
        </main>

        <footer class="footer">
          <div class="footer-wrapper flex justify-between">
            <div class="footer-logo flex">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-iso.svg" alt="Atomo Logo">
            </div>
            <div class="footer-items flex vertical justify-center">
              <a href="">Blog</a>
              <a href="<?php echo esc_url( home_url( 'about-us' ) ); ?>"><?php _e( 'About us', 'atomo' ); ?><!-- Acerca de nosotros --></a>
              <a href="<?php echo esc_url( home_url( 'privacy-policy' ) ); ?>"><?php _e( 'Privacy Policy', 'atomo' ); ?><!-- Políticas de privacidad --></a>
              <a href="<?php echo esc_url( home_url( 'terms-of-use' ) ); ?>"><?php _e( 'Terms of Use', 'atomo' ); ?><!-- Términos de uso --></a>
            </div>
            <div class="footer-contact flex vertical justify-center align-end">
              <div class="footer-social flex vertical">
                <h4><?php _e( 'Follow us', 'atomo' ); ?></h4>
                <div class="social-container">
                  <a href="">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 19 19" style="enable-background:new 0 0 19 19;" xml:space="preserve">
                    <path d="M16.3,1.5H2.7c-0.6,0-1.2,0.6-1.2,1.2v13.5c0,0.7,0.6,1.3,1.2,1.3h6.5c0.2,0,0.3-0.1,0.3-0.3v-4.3
                      c0-0.2-0.1-0.3-0.3-0.3H8c-0.2,0-0.3-0.1-0.3-0.3V9.8c0-0.2,0.1-0.3,0.3-0.3h1.2c0.2,0,0.3-0.1,0.3-0.3V8c0-1.9,1.5-3.4,3.4-3.4h1.8
                      c0.2,0,0.3,0.1,0.3,0.3v2.5c0,0.2-0.1,0.3-0.3,0.3h-1.2c-0.5,0-0.9,0.4-0.9,0.9v0.6c0,0.2,0.1,0.3,0.3,0.3h1.8c0.1,0,0.2,0,0.2,0.1
                      C15,9.7,15,9.8,15,9.8l-0.3,2.5c0,0.2-0.2,0.3-0.3,0.3h-1.5c-0.2,0-0.3,0.1-0.3,0.3v4.3c0,0.2,0.1,0.3,0.3,0.3h3.4
                      c0.7,0,1.2-0.6,1.2-1.2V2.7C17.5,2.1,16.9,1.5,16.3,1.5"/>
                    </svg>
                  </a>
                  <a href="">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 19 19" style="enable-background:new 0 0 19 19;" xml:space="preserve">
                    <g>
                      <path d="M13.4,1.7H5.6c-2.2,0-3.9,1.7-3.9,3.9v7.8c0,2.2,1.7,3.9,3.9,3.9h7.8c2.2,0,3.9-1.7,3.9-3.9V5.6
                        C17.3,3.4,15.6,1.7,13.4,1.7z M16.1,13.4c0,1.5-1.2,2.7-2.7,2.7H5.6c-1.5,0-2.7-1.2-2.7-2.7V5.6c0-1.5,1.2-2.7,2.7-2.7h7.8
                        c1.5,0,2.7,1.2,2.7,2.7C16.1,5.6,16.1,13.4,16.1,13.4z"/>
                      <path d="M9.5,5.3c-2.3,0-4.2,1.9-4.2,4.2s1.9,4.2,4.2,4.2s4.2-1.9,4.2-4.2S11.8,5.3,9.5,5.3 M9.5,12.5
                        c-1.7,0-3-1.4-3-3s1.4-3,3-3s3,1.4,3,3S11.1,12.5,9.5,12.5"/>
                      <path d="M13.7,3.5c-0.3,0-0.6,0.3-0.6,0.6s0.3,0.6,0.6,0.6s0.6-0.3,0.6-0.6S14,3.5,13.7,3.5"/>
                    </g>
                    </svg>
                  </a>
                  <a href="">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                      viewBox="0 0 19 19" style="enable-background:new 0 0 19 19;" xml:space="preserve">

                    <path d="M18.4,4c-0.1-0.1-0.2-0.1-0.4-0.1c-0.1,0.1-0.5,0.2-0.8,0.3c0.3-0.4,0.6-0.9,0.8-1.3c0-0.1,0-0.3-0.1-0.3
                      c-0.1-0.1-0.2-0.1-0.3,0c-0.2,0.2-1.3,0.6-2,0.8c-0.8-0.7-1.7-1.1-2.7-1.1c-0.7,0-1.4,0.2-2.2,0.7C9.2,3.8,9,5.6,9.1,6.6
                      c-4-0.3-6.2-2.5-7-3.5C2.1,3.1,2,3,1.9,3C1.8,3,1.7,3.1,1.7,3.2C1.2,4,1,5,1.3,6C1.4,6.6,1.7,7.1,2,7.5C1.8,7.4,1.6,7.2,1.4,7.1
                      C1.3,7,1.2,7,1,7C0.9,7.1,0.9,7.2,0.9,7.3c0,1.7,1.2,2.9,2.2,3.5c-0.2,0-0.5-0.1-0.7-0.2c-0.1,0-0.2,0-0.3,0.1C2,10.8,2,11,2,11.1
                      c0.6,1.3,1.9,2.3,3.3,2.6c-1.2,0.8-2.9,1.1-4.5,0.9c-0.1,0-0.3,0.1-0.3,0.2c0,0.1,0,0.3,0.1,0.4c1.8,1,3.7,1.5,5.8,1.5h0
                      c2.9,0,5.7-1.3,7.7-3.5c1.8-2.1,2.8-4.7,2.6-7c0.5-0.3,1.3-1,1.7-1.8C18.5,4.3,18.5,4.1,18.4,4"/>
                    </svg>
                  </a>

                </div>
              </div>
              <div class="footer-email flex vertical align-end">
                <a href="mailto:contacto@revistaatomo.com">contacto@revistaatomo.com</a>
                <span>© 2018 Revista Átomo. Todos los derechos reservados</span>
              </div>
            </div>

          </div>
        </footer>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <?php wp_footer(); ?>
    </body>
</html>
