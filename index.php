<?php
/**
 * Created by PhpStorm.
 * User: hayk
 * Date: 22/02/2017
 * Time: 13:04
 */

$title = 'Lotto';
require_once('view/head.phtml');

require_once('core/Lotto.php');
$lotto = new Lotto(10);
require_once('view/index.phtml');

require_once('view/footer.tpl');
