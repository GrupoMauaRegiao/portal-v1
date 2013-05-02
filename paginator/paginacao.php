<div class="paginador">
  <?php
    for ($i = 1; $i < $page; $i += 1) {
      if ($i >= $page - 10) {
  ?>
        <a title="P&aacute;gina <?php echo $i; ?>" href="?page=<?php echo $i; ?>">
          <div class="paginas">
            <?php echo $i; ?>
          </div>
        </a>
      <?php }
    } ?>

    <div title="Voc&ecirc; est&aacute; aqui" class="pagina-atual">
      <?php echo $page; ?>
    </div>

    <?php for ($i = $page + 1; $i <= $tp; $i += 1) {
      if ($i <= $page + 10) { ?>
        <a title="P&aacute;gina <?php echo $i; ?>" href="?page=<?php echo $i; ?>">
          <div class="paginas">
            <?php echo $i; ?>
          </div>
        </a>
      <?php }
    }
  ?>
</div>