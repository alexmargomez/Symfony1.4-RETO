<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('prestamo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?
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
          &nbsp;<a href="<?php echo url_for('prestamo/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'prestamo/delete?
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
        <th><?php echo $form['libro_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['libro_id']->renderError() ?>
          <?php echo $form['libro_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estudiante_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['estudiante_id']->renderError() ?>
          <?php echo $form['estudiante_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_prestamo']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_prestamo']->renderError() ?>
          <?php echo $form['fecha_prestamo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_devolucion']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_devolucion']->renderError() ?>
          <?php echo $form['fecha_devolucion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['devuelto']->renderLabel() ?></th>
        <td>
          <?php echo $form['devuelto']->renderError() ?>
          <?php echo $form['devuelto'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
