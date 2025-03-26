<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('libro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /home/alexmar/Documentos/Projects/sfProject1.4/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /home/alexmar/Documentos/Projects/sfProject1.4/lib/util/sfToolkit.class.php on line 362
id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('libro/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'libro/delete?
Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /home/alexmar/Documentos/Projects/sfProject1.4/lib/util/sfToolkit.class.php on line 362

Deprecated: preg_replace(): The /e modifier is deprecated, use preg_replace_callback instead in /home/alexmar/Documentos/Projects/sfProject1.4/lib/util/sfToolkit.class.php on line 362
id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['titulo']->renderLabel() ?></th>
        <td>
          <?php echo $form['titulo']->renderError() ?>
          <?php echo $form['titulo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['autor']->renderLabel() ?></th>
        <td>
          <?php echo $form['autor']->renderError() ?>
          <?php echo $form['autor'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['prestado']->renderLabel() ?></th>
        <td>
          <?php echo $form['prestado']->renderError() ?>
          <?php echo $form['prestado'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
