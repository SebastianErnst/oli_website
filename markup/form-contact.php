<?php
function url_origin( $s, $use_forwarded_host = false )
{
    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
    $port     = $s['SERVER_PORT'];
    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url( $s, $use_forwarded_host = false )
{
    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}

$absolute_url = full_url( $_SERVER );

?>
<section class="additional-content section-dark" id="kontaktformular">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>Kontaktformular</h2>
            <p class="keymessage">
                Gerne kannst du mir auch eine E-Mail schreiben.
            </p>
            <form action="./mail" method="post">
                <input type="hidden" name="prev_site" value="<?php echo $absolute_url;?>">
                <div class="input-wrapper half">
                    <input type="text" name="name" id="name">
                    <label for="name">Vorname</label>
                </div>
                <div class="input-wrapper half">
                    <input type="text" name="surname" id="surname">
                    <label for="name">Nachname</label>
                </div>
                <div class="input-wrapper half">
                    <input type="email" name="email" id="email">
                    <label for="email">E-Mail</label>
                </div>
                <div class="input-wrapper">
                    <textarea name="message" id="message" cols="5" rows="10"></textarea>
                    <label for="message">Nachricht:</label>
                </div>
                <div class="button-wrapper">
                    <button type="submit">
                        <span>Senden</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>