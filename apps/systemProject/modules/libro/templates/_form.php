<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('libro/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data"' ?> class="form-horizontal">
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <div class="form-group">
    <?php echo $form->renderHiddenFields(false) ?>
    <?php echo $form->renderGlobalErrors() ?>

    <div class="mb-3">
      <?php echo $form['titulo']->renderLabel(null, array('class' => 'form-label')) ?>
      <?php echo $form['titulo']->render(array('class' => 'form-control')) ?>
      <?php echo $form['titulo']->renderError() ?>
    </div>

    <div class="mb-3">
      <?php echo $form['autor']->renderLabel(null, array('class' => 'form-label')) ?>
      <?php echo $form['autor']->render(array('class' => 'form-control')) ?>
      <?php echo $form['autor']->renderError() ?>
    </div>

  </div>

  <div class="form-group">
    <a href="<?php echo url_for('libro/index') ?>" class="btn btn-secondary">Ir atras</a>
    <?php if (!$form->getObject()->isNew()): ?>
      <?php echo link_to('Eliminar', 'libro/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?', 'class' => 'btn btn-danger')) ?>
    <?php endif; ?>
    <input type="submit" value="Guardar" class="btn btn-primary" />
  </div>
</form>