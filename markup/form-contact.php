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

function getErrors($name) {
    if (isset($GLOBALS['FORMERRORS'][$name]) && count($GLOBALS['FORMERRORS'][$name]) > 0) {
        $errors =  implode(' ', $GLOBALS['FORMERRORS'][$name]);
        return "<span class='error-label'>$errors</span>";
    }
    return '';
}

function getValue($name) {
    if (isset($_POST[$name])) {
        return $_POST[$name];
    }
    return '';
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
            <form action="#kontaktformular" method="post">
                <input type="hidden" name="prev_site" value="<?php echo $absolute_url;?>">
                <div class="input-wrapper half">
                    <input type="text" name="name" id="name" value="<?php echo getValue('name'); ?>" required>
                    <label for="name">Name</label>
                    <?php echo getErrors('name');?>
                </div>
                <div class="input-wrapper half">
                    <input type="email" name="email" id="email" value="<?php echo getValue('email'); ?>" required>
                    <label for="email">E-Mail</label>
                    <?php echo getErrors('email');?>
                </div>
                <div class="input-wrapper">
                    <textarea name="message" id="message" cols="5" rows="10" required><?php echo getValue('message'); ?></textarea>
                    <label for="message">Nachricht:</label>
                    <?php echo getErrors('message');?>
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