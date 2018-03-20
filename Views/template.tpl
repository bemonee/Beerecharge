<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Beerecharge -> {block name="title"}{/block}</title>
    {include file='cssincludes.tpl'}
    {block name="cssadicional"}{/block}
  </head>
  <body class="{block name="mainclass"}{/block}">
      <div class="container-fluid">
        {block name="body"}{/block}
      </div>
      {if isset($alerta)}
        <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Error</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-times fa-5x mb-3 animated rotateIn"></i>
                            <h6 class="">{$alerta}</h6>
                            {if isset($alerta_errores)}
                                {foreach $alerta_errores as $error}
                                    <small>{$error}</small><br>
                                {/foreach}
                            {/if}
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Entendido</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
      {/if}
      {include file='jsincludes.tpl'}
      {block name="jsadicional"}
        {if isset($alerta)}
            <script>
            $(document).ready(function(){
                $('#centralModalDanger').modal();
            });
            </script>
        {/if}
      {/block}
  </body>
</html>