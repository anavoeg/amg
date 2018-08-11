<?php
/**
 * Created by PhpStorm.
 * User: genesystem
 * Date: 11/08/2018
 * Time: 03:30
 */?>
<?php if(isset($sucessoEmail)):?>
    <blockquote>
        <?php echo $sucessoEmail ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($falhaEmail)):?>
    <blockquote>
        <?php echo $falhaEmail ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($arquivoUltrapassa)):?>
    <blockquote>
        <?php echo $arquivoUltrapassa ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($arquivoGrande)):?>
    <blockquote>
        <?php echo $arquivoGrande ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($arquivoInvalido)):?>
    <blockquote>
        <?php echo $arquivoInvalido ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($sucessoDesaparecido)):?>
    <blockquote>
        <?php echo $sucessoDesaparecido ;?>
    </blockquote>
<?php endif; ?>
<?php if(isset($falhaDesaparecido)):?>
    <blockquote>
        <?php echo $falhaDesaparecido ;?>
    </blockquote>
<?php endif; ?>

