<h1>Login</h1>

<?php if ($sf_user->hasFlash('error')): ?>
    <div class="error"><?php echo $sf_user->getFlash('error') ?></div>
<?php endif; ?>

<form action="<?php echo url_for('@login') ?>" method="post">
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Login" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>