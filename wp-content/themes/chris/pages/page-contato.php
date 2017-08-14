<?php
/**
 * Template name: Contato
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chris
 */

get_header();
while (have_posts()) :
    the_post();
?>

  <div id="primary" class="content-area contato " itemscope itemtype="http://schema.org/ContactPage">
    <div class="container">
      <main id="main" class="site-main row">
        <header class="row">
          <div class="col-sm-10 col-sm-offset-2">
            <h1>
              Deixa eu conhecer <br> a sua história, <br> <span>entre em</span> <br> <strong>contato.</strong>
            </h1>
          </div>
          <!-- col-sm-10 -->
        </header>
        <!-- row-->

        <section class="row" style="margin-top:280px;">
          <div class="col-sm-4">
            <?php the_field('texto'); ?> <br>
            <div class="contato__dados">
              <span><?php the_field('telefone_de_contato', 'option'); ?></span>
              <a style="font-size: 1.125em;" class="" href="mailto:<?php the_field('e-mail_de_contato', 'option'); ?>" data-rel="external"
                rel="external" title="Chris Bonfatti Photography E-mail">
                <?php the_field('e-mail_de_contato', 'option'); ?>
              </a>

              <a class="" href="<?php the_field('link_facebook', 'option'); ?>" title="Chris Bonfatti Photography Facebook" target="_blank"
                rel="nofollow">
                <?php the_field('texto_facebook', 'option'); ?>
              </a>

              <a class="" href="<?php the_field('link_instagram', 'option'); ?>" title="Chris Bonfatti Photography Instagram" target="_blank"
                rel="nofollow">
                <?php the_field('texto_instagram', 'option'); ?>
              </a>
            </div>
            <!-- contato__dados -->
          </div>
          <!-- col-sm-4 -->
          <div class="col-sm-5">
            <form class="contato__form" ng-app="app" name="formContato" ng-controller="ContatoController as contato" ng-submit="contato.Enviar()">
              <div class="form-group form-group-lg">
                <input type="text" class="form-control" name="nome"  ng-disabled="contato.enviado" placeholder="Nome" require ng-model="contato.nome">
              </div>
              <div class="form-group form-group-lg">
                <input type="email" class="form-control" name="email"  ng-disabled="contato.enviado" placeholder="E-mail" require ng-model="contato.email">
              </div>
              <div class="form-group form-group-lg">
                <input type="text" class="form-control" name="telefone"  ng-disabled="contato.enviado" placeholder="Telefone" require ng-model="contato.telefone">
              </div>
              <div class="form-group form-group-lg">
                <textarea class="form-control" rows="7" name="mensagem"  ng-disabled="contato.enviado" placeholder="Mensagem ( fale um pouco sobre o seu evento )" require
                  ng-model="contato.mensagem"></textarea>
              </div>
              <div class="form-group form-group-lg">
                <button type="submit" class="btn btn-primary btn-lg btn-block" ng-disabled="formContato.$invalid">
                  <span ng-hide="contato.enviando">
                    Enviar  
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                  </span>
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="font-size: 24px;" ng-show="contato.enviando"></i>
                </button>
              </div>
              <div class="form-group form-group-lg" ng-show="contato.enviado">
                <div class="alert alert-success" role="alert">Mensagem Enviada!</div>
              </div>
            </form>
          </div>
          <!-- col-sm-5 -->
        </section>
        <!-- row -->

      </main>
      <!-- #main -->
    </div>
    <!-- container -->
  </div>
  <!-- #primary -->

    <?php
    $image = get_field('imagem_de_fundo'); ?>

    <style>
      .contato {
        background: url('<?= $image['url']; ?>') no-repeat top center;
        background-size: cover;
      }
    </style>

    <script>
      (function () {
        'use strict';
        angular.module('app', []); // Startup
        angular
          .module('app')
          .controller('ContatoController', ContatoController);
        ContatoController.$inject = ['$http'];

        function ContatoController($http) {
          var vm      = this;

          vm.enviado  = false;
          vm.enviando = false;
          vm.email    = '';
          vm.mensagem = '';
          vm.nome     = '';
          vm.telefone = '';

          vm.Enviar = Enviar;

          function Enviar() {
            vm.enviando  = true;
            var envelope = {
              'email':    vm.email,
              'mensagem': vm.mensagem,
              'nome':     vm.nome,
              'telefone': vm.telefone
            };

            $http.post('<?= get_template_directory_uri(); ?>/mail.php',envelope).then(function(){
              vm.enviado  = true;
              vm.enviando  = false;
              vm.email    = '';
              vm.mensagem = '';
              vm.nome     = '';
              vm.telefone = '';
            });
          }
        }
      })();
    </script>
    <?php
endwhile;
get_footer();
