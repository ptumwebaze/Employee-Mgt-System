<html><body>
<?
require_once ("recaptchalib.php");

// get a key at http://mailhide.recaptcha.net/apikey
$mailhide_pubkey = '6Ldpqz0cAAAAALAKDVXoTdQzmll5tYhvezvu5C9q';
$mailhide_privkey = '6Ldpqz0cAAAAALzpvBatBEMl87fJl0z8TZ4BZw8y';

?>

The Mailhide version of example@example.com is
<? echo recaptcha_mailhide_html ($mailhide_pubkey, $mailhide_privkey, "example@example.com"); ?>. <br>

The url for the email is:
<? echo recaptcha_mailhide_url ($mailhide_pubkey, $mailhide_privkey, "example@example.com"); ?> <br>

</body></html>
