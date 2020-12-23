<?
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    http_response_code(403);
    die('Direct access not allowed');
    exit();
};
?>
<!-- footer part -->
<footer class="bg-dark py-2 fixed-bottom">
    <div class="container text-center text-white">
        <span class="d-block">Exercice PHP/PDO/BDD - inspiration design : webboy.fr - &copy; <?=date('Y')?></span>
        <span class="d-block">Crédit images :
            <a href="https://fr.freepik.com/photos/personnes" title="freepik" target="_blank">
                Personnes photo créé par drobotdean - fr.freepik.com
            </a> /
            <a href="https://pixabay.com/photos/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1245776"
                title="pixabay" target="_blank">
                Free-Photos - pixabay.com
            </a>
        </span>
    </div>
</footer>
</body>

</html>