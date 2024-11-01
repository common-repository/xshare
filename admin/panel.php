<?php
/**
 * @package xshare
 * @author rainastudio
 * @version 1.0.0
 */
?>
<div class="xshare">
    <div class="rs-plugin header">
        <div class="wrapper">
            <div class="nav_logo">
                <img src="<?php echo xshare_img . 'logo.svg' ?>" alt="xShare">
                <h1 class="name">xShare</h1>
            </div>
            <div class="flex-button-g">
                <span class="button-group">
                    <a href="#" type="button" id="rs_plugin_save" class="xshare-button is-drops"><?php _e( 'Save Changes', 'xshare' ); ?></a
                    ><a href="?rs_plugin_reset=1" onclick="return confirm('Are you sure you want to reset?')" type="button" id="rs_plugin_reset" class="xshare-button is-drops"><?php _e( 'Reset Default', 'xshare' ); ?></a>
                </span>
            </div>
        </div>
    </div>
    <div class="rs_pligin body">
        <div class="wrapper">
            <h2><?php _e( 'xShare Option Settings', 'xshare' ); ?></h2>
            <p class="description"><?php _e( 'A tool to increase social shares and to show total shared counts for blog posts or page.', 'xshare' ); ?></p>
            <form method="post" action="options.php" class="xshare flex-with">
                <?php settings_fields( 'xshare_opitions_settings' ); ?>
                <?php do_settings_sections( 'xshare_opitions_settings' ); ?>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display After Post Title', 'xshare' ); ?></h3>
                                <p><?php _e( 'Enable the xShare social share buttons underneath post title on single post page.', 'xshare' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="xshare_a_title" id="xshare_a_title" value="1"<?php checked( 1, get_option( 'xshare_a_title' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Before Author Meta', 'xshare' ); ?></h3>
                                <p><?php _e( 'Enable the xShare social share buttons before about the author block and underneath article body on single post page.', 'xshare' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="xshare_b_ameta" id="xshare_b_ameta" value="1"<?php checked( 1, get_option( 'xshare_b_ameta' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Display Vertical Buttons', 'xshare' ); ?></h3>
                                <p><?php _e( 'Enable the xShare social share vertical buttons on single page.', 'xshare' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="switch">
                                    <input type="checkbox" name="xshare_v_button" id="xshare_v_button" value="1"<?php checked( 1, get_option( 'xshare_v_button' ) ); ?>>
                                    <span class="slider round"></span>
                                    <span class="guiclose"></span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'Twitter Username', 'xshare' ); ?></h3>
                                <p><?php _e( 'Add Twitter username to get tagged of sharing on Twitter.', 'xshare' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="input">
                                    <input type="text" name="xshare_twitter_name" class="regular-text" id="xshare_twitter_name" size="40" value="<?php echo esc_attr( get_option('xshare_twitter_name') ); ?>"/>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td class="description">
                                <h3><?php _e( 'SharedCount API Key', 'xshare' ); ?></h3>
                                <p><?php _e( 'Add API key for shared counts for blog posts or page. Get FREE API key <a href="https://www.sharedcount.com/" target="_blank">here</a>.', 'xshare' ); ?></p>
                            </td>
                            <td class="options">
                                <label class="input">
                                    <input type="text" name="xshare_api_key" class="regular-text" id="xshare_api_key" size="40" value="<?php echo esc_attr( get_option('xshare_api_key') ); ?>"/>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>
<style type='text/css'>
#wpcontent {
    padding-left: 0px;
}
</style>