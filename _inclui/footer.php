</main>
<?php
@require('./_config/config.php');
$sql = $pdo->prepare("SELECT * FROM desaparecidos WHERE status=0 LIMIT 4");
$sql -> execute();
//verificar se achou alguma coisa
if($sql -> rowCount() > 0){
    $desaparecidos = $sql->fetchAll();//pegando os dados
    require './_funcoes/idade.php';
}
?>
<footer class="page-footer">
    <div class="footer-layer">
        <div class="footer-content">
            <blockquote><p>Se a fase é ruim e são tantos problemas que não tem fim,
                    não se esqueça que ouviu de mim, <i style="color:rgb(212, 0, 231);">amigo estou aqui</i></p></blockquote>
            <h5 class="midia-text">Nos acompanhe nas mídias sociais</h5>
            <hr class="bold-line">
            <div class="midias">
                <div class=" midia midia-f">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="midia midia-t">
                    <i class="fab fa-twitter"></i>
                </div>
                <div class="midia midia-w">
                    <i class="fab fa-whatsapp"></i>
                </div>
            </div>
            <div class="contact">
                <h4>Faça-nos uma visita em um dos nossos espaços</h4>
                <div class="contact-box contact-rj">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</li>
                    </ul>
                </div>
                <div class="contact-box contact-sp">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</li>
                    </ul>
                </div>
                <div class="contact-box contact-mg">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</li>
                    </ul>
                </div>
                <div class="contact-box contact-sc">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</li>
                    </ul>
                </div>
                <div class="contact-box contact-ma">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</li>
                    </ul>
                </div>
                <div class="contact-box contact-pe">
                    <ul>
                        <li>Rio de Janeiro - Capital</li>
                        <li>Rua X, Riachuelo</li>
                        <li>tel: 0000-0000</i></li>
                    </ul>
                </div>
            </div>
            <div class="missing-kids-section">
                <div class="missing-kids-header">
                    <p>Nos ajude a reunir uma fámilia, caso reconheça alguma das crianças abaixo ligue imediatamente para o 190</p>
                </div>
                <div class="missing-kids-content">
                    <?php foreach ($desaparecidos as $desaparecido):?>
                        <div class="card card1">
                            <div class="card-missing-header">
                                <img src="<?php echo $desaparecido['foto']?>">
                                <span class="card-title">desaparecido: <?php echo $desaparecido['nome']?> <br>
                                    <span>
                                        <?php
                                        $data_nascimento = (string) $desaparecido['idade'];
                                        echo idade($data_nascimento).' Anos.';
                                        ?>
                                    </span>
                                </span>
                            </div>
                            <div class="card-missing-info">
                                <section>data do desaparecimento: <?php echo date('d/m/Y', strtotime($desaparecido['data_desaparecimento']))?></section>
                                <section>visto por último em: <?php echo $desaparecido['visto_por_ultimo']?></section>
                                <section>recompensa: R$<?php echo number_format($desaparecido['recompensa'], 2, ',', '.');?></section>
                            </div>
                        </div>
                    <?php endforeach;?>

                    <!--               <div class="card card2">-->
                    <!--                  <div class="card-missing-header">-->
                    <!--                     <img src="_ativos/_img/kid1.jpeg">-->
                    <!--                     <span class="card-title">desaparecido: João Santana</span>-->
                    <!--                  </div>-->
                    <!--                  <div class="card-missing-info">-->
                    <!--                     <section>data do desaparecimento: 08/09/2015</section>-->
                    <!--                     <section>visto por último em: 08/09/2015</section>-->
                    <!--                     <section>recompensa: R$500</section>-->
                    <!--                  </div>-->
                    <!--               </div>-->
                    <!--               <div class="card card3">-->
                    <!--                  <div class="card-missing-header">-->
                    <!--                     <img src="_ativos/_img/kid2.jpeg">-->
                    <!--                     <span class="card-title">desaparecido: João Santana</span>-->
                    <!--                  </div>-->
                    <!--                  <div class="card-missing-info">-->
                    <!--                     <section>data do desaparecimento: 08/09/2015</section>-->
                    <!--                     <section>visto por último em: 08/09/2015</section>-->
                    <!--                     <section>recompensa: R$500</section>-->
                    <!--                  </div>-->
                    <!--               </div>-->
                    <!--               <div class="card card4">-->
                    <!--                  <div class="card-missing-header">-->
                    <!--                     <img src="_ativos/_img/kid3.jpeg">-->
                    <!--                     <span class="card-title">desaparecido: João Santana</span>-->
                    <!--                  </div>-->
                    <!--                  <div class="card-missing-info">-->
                    <!--                     <section>data do desaparecimento: 08/09/2015</section>-->
                    <!--                     <section>visto por último em: 08/09/2015</section>-->
                    <!--                     <section>recompensa: R$500</section>-->
                    <!--                  </div>-->
                    <!--               </div>-->
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-bottom">
                © 2014 Amigo Estou Aqui
            </div>
        </div>
</footer>
</div>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="_ativos/_js/scripts.js"></script>
</body>
</html>