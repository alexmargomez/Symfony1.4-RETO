<h1>Registro de Usuario</h1>

<form action="<?php echo url_for('@register') ?>" method="post">
    <table>
        <tbody>
            <?php echo $form ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Registrar" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>