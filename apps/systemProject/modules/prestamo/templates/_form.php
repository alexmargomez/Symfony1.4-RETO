<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('prestamo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data"' ?> class="form-horizontal">
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <div class="form-group">
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>

    <div class="mb-3">
      <?php echo $form['libro_id']->renderLabel(null, array('class' => 'form-label')) ?>
      <?php echo $form['libro_id']->render(array('class' => 'form-control')) ?>
      <?php echo $form['libro_id']->renderError() ?>
    </div>

    <div class="mb-3">
      <?php echo $form['estudiante_id']->renderLabel(null, array('class' => 'form-label')) ?>
      <?php echo $form['estudiante_id']->render(array('class' => 'form-control')) ?>
      <?php echo $form['estudiante_id']->renderError() ?>
    </div>

    <div class="form-group row">
      <?php echo $form['fecha_devolucion']->renderLabel(null, array('class' => 'col-sm-2 col-form-label')) ?>
      <div class="col-sm-10">
          <?php echo $form['fecha_devolucion']->render(array('class' => ' datepicker')) ?>
          <?php echo $form['fecha_devolucion']->renderError() ?>
      </div>
    </div>
    
  </div>

  <div class="form-group">
    <a href="<?php echo url_for('prestamo/index') ?>" class="btn btn-secondary">Ir atrás</a>
    <?php if (!$form->getObject()->isNew()): ?>
      <?php echo link_to('Eliminar', 'prestamo/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
    <?php endif; ?>
    <input type="submit" value="Guardar" class="btn btn-primary" />
  </div>
</form>
