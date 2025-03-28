[?php

/**
 * <?php echo $this->getModuleName() ?> actions.
 *
 * @package    SMProject
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     Your name here
 */
class <?php echo $this->getGeneratedModuleName() ?>Actions extends <?php echo $this->getActionsBaseClass() ?>

{
<?php include dirname(__FILE__).'/../../parts/indexAction.php' ?>

<?php if (isset($this->params['with_show']) && $this->params['with_show']): ?>
<?php include dirname(__FILE__).'/../../parts/showAction.php' ?>

<?php endif; ?>
<?php include dirname(__FILE__).'/../../parts/newAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/createAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/editAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/updateAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/deleteAction.php' ?>

<?php include dirname(__FILE__).'/../../parts/processFormAction.php' ?>
}
